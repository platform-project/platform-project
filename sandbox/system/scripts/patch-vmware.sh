#!/bin/bash
VMWARE_VERSION=`vmware-installer -l |grep workstat|awk '{print $2}' |awk 'BEGIN {FS="."}{print "workstation-"$1"."$2"."$3}'`
echo $VMWARE_VERSION
TMP_FOLDER=/tmp/patch-vmware
rm -fdr $TMP_FOLDER
mkdir -p $TMP_FOLDER
cd $TMP_FOLDER
git clone https://github.com/mkubecek/vmware-host-modules.git
cd $TMP_FOLDER/vmware-host-modules
git checkout $VMWARE_VERSION
git fetch
make
sudo make install
sudo rm /usr/lib/vmware/lib/libz.so.1/libz.so.1
sudo ln -s /lib/x86_64-linux-gnu/libz.so.1 
/usr/lib/vmware/lib/libz.so.1/libz.so.1
sudo /etc/init.d/vmware restart
