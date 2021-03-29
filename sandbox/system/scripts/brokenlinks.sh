#!/bin/bash

WORKSPACE="/sandbox/workspace/.trash/"
SITES=("www.domain1.com" "www.domain2.com" "www.domain3.com" "www.domain4.com" "www.domain5.com" "www.domain6.com" "www.domain7.com" "wwww.domain8.com" "www.domain9.com" "www.domain10.com")
TIMESTAMP=$(date "+%Y%m%d_%H%M%S")
cd $WORKSPACE
for URL in "${SITES[@]}"
do
    echo "create $URL""_""$TIMESTAMP.txt"
    linkchecker $site_url > "$URL""_""$TIMESTAMP.txt"
    echo "create $URL""_""$TIMESTAMP""_""broken.txt"
    grep -B3 "^Result.*404" "$URL""_""$TIMESTAMP.txt" > "$URL""_""$TIMESTAMP""_""broken.txt"
    echo "$URL done."
done
