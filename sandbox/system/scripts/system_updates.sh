#!/bin/bash
USER=`whoami`
DISTRO_VERSION="builds/14.04-beta"
CACHE_DEB_PATH="/var/cache/apt/archives"
LOCAL_DEB_PATH="/var/www/platform/sandbox/repository/software/distro/ubuntu/$DISTRO_VERSION/sources/x64" 
MOUNT_DEV_PATH="/media/$USER/vhdd-350/platform"
PLATFORM_PATH="/var/www/platform"
REMOTE_DEB_PATH="/sandbox/repository/software/distro/ubuntu/$DISTRO_VERSION/sources/x64" #"/sandbox/repository/software/distro/ubuntu/deb"
REMOTE_LOGIN="user@domain.com"

start(){
  system_mount
  system_setup
  platform_install
}

system_mount(){
  echo "system mount..."
  sudo -k
  sudo mkdir -p $PLATFORM_PATH 
  sudo mount --bind $MOUNT_DEV_PATH $PLATFORM_PATH
}

system_setup(){
  echo "system setup..."
  # with internet uncomment below 2 lines
  #system_install_lite
  #system_install_full
  
  # without internet uncomment system_install_local
  system_install_local
  
}

system_install(){
  echo "system install..."
  sudo apt-get update --fix-missing && sudo apt-get install -f --fix-missing --force-yes -y 
}

system_install_lite(){
  echo "system install lite..."
  system_install
}

system_install_full(){
  echo "system install full..."
  system_install
  system_install_required
  #system_install_remote
  system_upgrade
}

system_upgrade(){
  echo "system upgrade..."
  sudo apt-get dist-upgrade --force-yes -y 
}

system_install_required(){
  echo "system install required..."
  sudo add-apt-repository "deb http://archive.ubuntu.com/ubuntu $(lsb_release -sc) main universe restricted multiverse"
  sudo apt-get update --fix-missing && sudo apt-get install ubuntu-restricted-extras --force-yes -y
}

system_install_local(){
  echo "system install local..."
  cd $LOCAL_DEB_PATH && sudo dpkg -i *.deb
}

system_install_remote(){
  echo "system install remote..."
  rsync -chavzP --stats $LOCAL_DEB_PATH/* $REMOTE_LOGIN:$REMOTE_DEB_PATH
}

platform_install(){
  echo "platform install..."
  cd $PLATFORM_PATH 
  sudo chmod 0777 ./platform 
  ./platform install
}

sudo -k
start
