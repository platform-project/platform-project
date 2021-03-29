#!/bin/bash
USER=`whoami`
# configuration settings

CACHE_DEB_PATH="/var/cache/apt/archives"
LOCAL_DEB_PATH="/var/www/platform/sandbox/repository/software/distro/ubuntu/13.04/apt" 
MOUNT_DEV_PATH="/media/$USER/xhdd-210/platform"
PLATFORM_PATH="/var/www/platform"
REMOTE_DEB_PATH="/sandbox/repository/software/distro/ubuntu/13.04/apt" #"/sandbox/repository/software/distro/ubuntu/deb"
REMOTE_LOGIN="user@domain.com"
sudo -k

sudo mkdir -p $PLATFORM_PATH && sudo mount --bind $MOUNT_DEV_PATH $PLATFORM_PATH