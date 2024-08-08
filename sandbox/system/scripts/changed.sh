#!/bin/sh
echo "Listing *.$1 files that changed recently: "
echo ""
find . -type f -name "*.$1" -newermt $(date +%Y-%m-%d)