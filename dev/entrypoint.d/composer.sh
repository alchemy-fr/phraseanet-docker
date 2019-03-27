#!/bin/bash

if [ ! -d "$HOME/.composer" ]; then
    cp -r "/bootstrap/.composer" "$HOME/.composer"
fi
