#!/bin/sh

set -e

BASEDIR="$(cd $(dirname "$0") && pwd)"

cd "$BASEDIR"

. "$BASEDIR/env.sh"

if [ -d "$BASEDIR/tmp" ]; then
	echo "Deleting old tmp..."
		rm -rf "$BASEDIR/tmp"
	echo "[  OK  ]"
fi

echo "Cloning main branch HEAD into tmp..."
	git clone --depth=1 "$(git config --get remote.origin.url)" "$BASEDIR/tmp" 2> /dev/null
	rm -rf "$BASEDIR/tmp/.git"
echo "[  OK  ]"

echo "Building..."
	cd tmp
		npm ci > /dev/null
		npm run build > /dev/null
	cd ..
echo "[  OK  ]"

echo "Compressing..."
	cd tmp
		mkdir -p "_archive_"

		if ! [ -f ".buildinclude" ]; then
			echo "[ WARN ] .buildinclude missing"
		else
			cat ".buildinclude" | while read BUILDINCLUDE; do
				if ! [ -d "$BUILDINCLUDE" ] && ! [ -f "$BUILDINCLUDE" ]; then
					echo "[ WARN ] $BUILDINCLUDE not found, skipping"
				else
					DIR="$(dirname "$BUILDINCLUDE")"
					mkdir -p "_archive_/$DIR"
					cp -R "$BUILDINCLUDE" "_archive_/$DIR"
				fi
			done
		fi
		echo "  Setting up permissions..."
			chmod -R "$PERMISSIONS" _archive_
		echo "  [  OK  ]"
		echo "Compressing _archive_..."
			tar cf - _archive_ | gzip -9 > _archive_.tar.gz
		echo "  [  OK  ]"
	cd ..
echo "[  OK  ]"

echo "Uploading..."
	scp -P "$SSH_PORT" "$BASEDIR/tmp/_archive_.tar.gz" "$TARGET_USER@$SSH_HOST:/tmp/_archive_.tar.gz"
echo "[  OK  ]"

echo "Running remote script..."
	cat "$BASEDIR/env.sh" "$BASEDIR/deploy-remote.sh" | ssh "$TARGET_USER@$SSH_HOST" -p "$SSH_PORT" '/bin/sh'
echo "[  OK  ]"

echo "Cleaning up..."
	rm "$BASEDIR/tmp/_archive_.tar.gz"
echo "[  OK  ]"

echo "ALL DONE"
