#!/bin/sh
# ----------------------------------- #
# iPod Touch & iPhone
# mounting / unmounting script
# by: Mario Limonciello, November 2007
# ----------------------------------- #

usage()
{
    echo " This package is useful for issuing an unmount and unmount commands in "
    echo " and application such as Amarok.  It gets around problems that are normally "
    echo " encountered with things such as ArtworkDB mmap problems and annoyances "
    echo " with having to type commands in order to just sync your iPod. "
    echo "*************************************************************************"
    echo " It is *HIGHLY* recommended that you set up public/private "
    echo " SSH keys before you use this script "
    echo "*************************************************************************"
}

#Load configurable items
. /etc/default/ipod-convenience

#Check our permissions and directory structure
if [ ! -d "$MOUNTPOINT" ]; then
    mkdir -p $MOUNTPOINT
    if [ ! -d "$MOUNTPOINT" ]; then
        echo "We tried to make your directory $MOUNTPOINT, but couldn't.  Please make it yourself and try again."
        exit 1
    fi
fi
if touch $MOUNTPOINT/test 2>&1 > /dev/null; then
    rm $MOUNTPOINT/test
else
    echo "Unable to write to $MOUNTPOINT.  Please adjust permissions and try again."
    exit 2
fi

#Make sure we have sshfs installed
if ! which sshfs 2>&1 > /dev/null; then
    echo "We don't have sshfs installed.  Please install and try again."
    exit 3
fi

#Make sure we are in the fuse group
if ! groups | grep fuse 2>&1 > /dev/null; then
    echo "Please add yourself to the fuse group, logout/in and try again."
    exit 4
fi

#Check that we can ping the ipod
if ! ping $IPADDRESS -c 1 2>&1 > /dev/null; then
    echo "iPod is not responding to pings at $IPADDRESS."
    echo "Please set the environment variable IGNOREPING if you want to ignore this."
    if [ -z "$IGNOREPING" ]; then
        exit 5
    fi
fi

if [ `basename $0` = "iphone-mount" ] || [ `basename $0` = "ipod-touch-mount" ]; then

    #Mount our Music Directory
    sshfs root@$IPADDRESS:/var/mobile/Media $MOUNTPOINT/ -o workaround=rename -o nonempty

    mkdir -p $MOUNTPOINT/iTunes_Control/Music

    #Check that we have iPhone/iPod touch symbolic links in place
    if [ ! -e $MOUNTPOINT/iPod_Control ]; then
        ln -s iTunes_Control $MOUNTPOINT/iPod_Control
    fi
    if [ ! -e $MOUNTPOINT/iTunes ]; then
        ln -s . $MOUNTPOINT/iTunes
    fi

    #Check if we have a FirewireGUID
    if [ ! -e $MOUNTPOINT/iTunes_Control/Device/SysInfo ] || ! grep FirewireGuid $MOUNTPOINT/iTunes_Control/Device/SysInfo 2>&1 > /dev/null; then
        echo "You don't have a Firewire GUID, so we will create one"

        #Find the iPod/iPhone.  Note, this only works by finding the first device
        #Made by Apple
        BUS=`lsusb | grep 05ac | awk '{print $2}'`
        DEVICE=`lsusb | grep 05ac | awk '{print $4}' | sed s/://`
        GUID="0x`lsusb -s $BUS:$DEVICE -v | grep iSerial | awk '{ print $3 }' | cut -c 1-16`"

        #Make the directory and file
        mkdir -p $MOUNTPOINT/iTunes_Control/Device
        echo "FirewireGuid: $GUID" >> $MOUNTPOINT/iTunes_Control/Device/SysInfo
    fi


elif [ `basename $0` = "iphone-umount" ] || [ `basename $0` = "ipod-touch-umount" ]; then
    fusermount -u $MOUNTPOINT
    PROCESS=`ssh root@$IPADDRESS ps x | grep MobileMusicPlayer | grep -v grep | awk '{print $1}'`
    if [ ! -z "$PROCESS" ]; then
        ssh root@$IPADDRESS  kill $PROCESS
    fi
else
    usage
fi
