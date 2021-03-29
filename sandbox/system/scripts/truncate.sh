#!/bin/bash

echo "command: $1 $2"

if [ "$1" != "scripts" ]
then
  dd if=/dev/null of="$1"
else
  dd if=/dev/null of="$2"
fi
