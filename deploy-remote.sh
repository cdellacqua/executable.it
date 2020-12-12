#!/bin/sh

set -e

cd /tmp
echo "Extracting archive..."
	tar xf _archive_.tar.gz
echo "[  OK  ]"
cd _archive_

echo "Adjusting permissions..."
	chown -R "$USER" *
	chgrp -R "$GROUP" *
	chmod 750 -R *
	find . -type d -exec chmod g+s {} \;
echo "[  OK  ]"

echo "Stopping Node process..."
	sudo systemctl stop "$SYSTEMD_SERVICE"
echo "[  OK  ]"

echo "Cleaning up old version..."
	find . -maxdepth 1 -exec sh -c '
		if ! [ "$1" = "." ]; then
			rm -rf "$2/$1"
		fi
	' sh {} "$TARGET_DIRECTORY" \;
echo "[  OK  ]"

echo "Moving new version..."
	mv * "$TARGET_DIRECTORY"
echo "[  OK  ]"

echo "Restarting Node process..."
	sudo systemctl start "$SYSTEMD_SERVICE"
echo "[  OK  ]"

echo "Cleaning up /tmp..."
	rm -rf /tmp/_archive_
	rm /tmp/_archive_.tar.gz
echo "[  OK  ]"
