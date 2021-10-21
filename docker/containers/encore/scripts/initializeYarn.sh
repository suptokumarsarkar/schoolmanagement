#!/usr/bin/env sh

if [ ! -f .initializedYarn ]; then
    echo "Initializing container"
    cd suite
    yarn
    yarn encore dev

    cd ../..
    touch .initializedYarn
fi
