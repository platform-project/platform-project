#!/bin/sh
LOCATION=$1
LOG_FILE="/sandbox/system/logs/large-files.log"
find $LOCATION -type f -size +100000k -exec ls -lh {} \; | awk '{ print $8 ": " $5 }' > $LOG_FILE
#find . -xdev -printf '%s %p\n' | sort -nr | head -20
#du -xak . | sort -n | tail -50
#ls -lhR | grep 'G '
#find <path> -size +10000k -print0 | xargs -0 ls -l
