#!/bin/bash
DOMAIN=$1
CACHE_PATH="/mirrors"

nohup httrack --clean --continue "http://$DOMAIN/" -O "$CACHE_PATH/$DOMAIN" "+*$DOMAIN/*" -v /dev/null 2>&1 
