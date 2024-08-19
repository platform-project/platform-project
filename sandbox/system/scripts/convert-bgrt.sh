#!/bin/sh -e
# convert-bgrt.sh - convert UEFI BGRT image

BGRT_DIR=/sys/firmware/acpi/bgrt

if [ ! -d $BGRT_DIR ]; then
	echo "BGRT not found" >&2
	exit 1
fi

if [ $# -lt 2 ]; then
	echo "usage: `basename $0` size file" >&2
	exit 1
fi

X=`cat $BGRT_DIR/xoffset`
Y=`cat $BGRT_DIR/yoffset`

convert -background black -extent $1-$X-$Y $BGRT_DIR/image $2
exit 0