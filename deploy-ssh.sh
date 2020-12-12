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
	git clone "$(git config --get remote.origin.url)" "$BASEDIR/tmp" 2> /dev/null
echo "[  OK  ]"

echo "Downloading .env file from target server..."
	set +e
	scp -P "$SSH_PORT" "$USER@$SSH_HOST:$TARGET_DIRECTORY/.env" "$BASEDIR/tmp/.env" > /dev/null
	RETCODE="$?"
	set -e
	if [ "$RETCODE" -ne 0 ]; then
		echo "[ WARN ] ----------------------------------------------------------------------"
		echo "[ WARN ] Unable to retrieve .env file for root, using .env.example in 2 seconds"
		echo "[ WARN ] ----------------------------------------------------------------------"
		sleep 2
		cp "$BASEDIR/tmp/.env.example" "$BASEDIR/tmp/.env"
	fi
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
		echo "Compressing _archive_..."
			tar cf - _archive_ | gzip -9 > _archive_.tar.gz
		echo "  [  OK  ]"
	cd ..
echo "[  OK  ]"

echo "Uploading..."
	scp -P "$SSH_PORT" "$BASEDIR/tmp/_archive_.tar.gz" "$USER@$SSH_HOST:/tmp/_archive_.tar.gz"
echo "[  OK  ]"

echo "Running remote script..."
	cat "$BASEDIR/env.sh" "$BASEDIR/deploy-remote.sh" | ssh "$USER@$SSH_HOST" -p "$SSH_PORT" '/bin/sh'
echo "[  OK  ]"

echo "Cleaning up..."
	rm "$BASEDIR/tmp/_archive_.tar.gz"
echo "[  OK  ]"

echo "ALL DONE"
