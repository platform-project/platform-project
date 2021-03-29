#!/bin/bash
export GREP_COLOR='1;32'; cat /dev/urandom | hexdump -C | grep --color=auto "ca fe"