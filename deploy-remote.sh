#!/bin/sh

set -e

cd /tmp
echo "Extracting archive..."
	tar xf _archive_.tar.gz
echo "[  OK  ]"
cd _archive_

echo "Adjusting permissions..."
	find . -maxdepth 1 -mindepth 1 -type d -exec sh -c '
		chown -R "$2" "$1"
		chgrp -R "$3" "$1"
		chmod 750 -R "$1"
	' sh {} $USER $GROUP \;
	find . -maxdepth 1 -mindepth 1 -type d -exec chmod g+s -R {} \;
echo "[  OK  ]"

echo "Stopping Node process..."
	sudo systemctl stop "$SYSTEMD_SERVICE"
echo "[  OK  ]"

echo "Cleaning up old version..."
	find . -maxdepth 1 -mindepth 1 -exec sh -c '
		rm -rf "$2/$1"
	' sh {} "$TARGET_DIRECTORY" \;
echo "[  OK  ]"

echo "Moving new version..."
	find . -maxdepth 1 -mindepth 1 -exec mv {} "$TARGET_DIRECTORY" \;
echo "[  OK  ]"

echo "Restarting Node process..."
	sudo systemctl start "$SYSTEMD_SERVICE"
echo "[  OK  ]"

echo "Cleaning up /tmp..."
	rm -rf /tmp/_archive_
	rm /tmp/_archive_.tar.gz
echo "[  OK  ]"
