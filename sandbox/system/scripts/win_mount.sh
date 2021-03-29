#!/bin/bash
MOUNT_LOCATION=$1
MOUNT_DEVICE=$2
MOUNT_USER=$3
MOUNT_PASS=""

mkdir -p /mnt/$MOUNT_DEVICE
mount.cifs //$MOUNT_LOCATION/$MOUNT_DEVICE /mnt/$MOUNT_DEVICE -o user=$MOUNT_USER,pass=$MOUNT_PASS

echo ""
echo "Command Summary:"
echo "mount.cifs //$MOUNT_LOCATION/$MOUNT_DEVICE /mnt/$MOUNT_DEVICE -o username=$MOUNT_USER"
