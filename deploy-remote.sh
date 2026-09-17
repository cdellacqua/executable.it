#!/bin/sh

set -e

cd /tmp
echo "Extracting archive..."
	tar xf _archive_.tar.gz
echo "[  OK  ]"
cd _archive_

echo "Cleaning up old version..."
	find . -maxdepth 1 -mindepth 1 -exec sh -c '
		rm -rf "$2/$1"
	' sh {} "$TARGET_DIRECTORY" \;
echo "[  OK  ]"

echo "Moving new version..."
	find . -maxdepth 1 -mindepth 1 -exec mv {} "$TARGET_DIRECTORY" \;
echo "[  OK  ]"

echo "Cleaning up /tmp..."
	rm -rf /tmp/_archive_
	rm /tmp/_archive_.tar.gz
echo "[  OK  ]"
