#!/bin/bash
DOMAIN=$1
CACHE_PATH="/mirrors"

nohop /usr/bin/wget --mirror -p --convert-links -P "$CACHE_PATH/" "$DOMAIN" > /dev/null 2>&1
