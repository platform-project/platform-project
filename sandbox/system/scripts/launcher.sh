#!/bin/bash
LAUNCHER_APP_PATH="/var/www/platform/sandbox/system/applications/launcher"
LAUNCHER_APP_USER=`whoami`

load_nvm(){
  export NVM_DIR="/home/$LAUNCHER_APP_USER/.nvm"
[ -s "$NVM_DIR/nvm.sh" ] && \. "$NVM_DIR/nvm.sh" && nvm use "v8.1.3" > /dev/null 2>&1
}

launch_app(){
  cd $LAUNCHER_APP_PATH && electron . > /dev/null 2>&1
}

load_nvm && launch_app
