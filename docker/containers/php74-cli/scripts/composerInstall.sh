#!/usr/bin/env sh

if [ ! -f .initializedComposer ]; then
    echo "Initializing container"
    cd suite
    composer install

    cd ../..
    touch .initializedComposer
fi
