#!/bin/bash
PLATFORM_PATH="/var/www/platform"
INTELLIJ_TMP="/tmp/intellij"
INTELLIJ_BIN="IntelliJIDEALicenseServer_linux_amd64"
INTELLIJ_LOCAL_BIN="IntelliJIDEALicenseServer_linux_amd64?dl=0"
INTELLIJ_REMOTE_BIN="https://www.dropbox.com/s/8vd9b98d7vqs9nb/IntelliJIDEALicenseServer_linux_amd64?dl=0"
INTELLIJ_EXEC="$INTELLIJ_TMP/IntelliJIDEALicenseServer_linux_amd64"
sudo -k
start(){
    echo "Running IntelliJ IDEA License Server..."
}

info(){
    sudo uname -r > /dev/null 2>&1
    echo "Listening on 0.0.0.0:1017..."
    echo "You can use http://127.0.0.1:1017 as license server"
    echo "Press Ctrl-C to quit."
}

binary_file(){
    sudo uname -r > /dev/null 2>&1
    mkdir -p $INTELLIJ_TMP
    cd $INTELLIJ_TMP && wget $INTELLIJ_REMOTE_BIN -o $INTELLIJ_BIN && mv $INTELLIJ_LOCAL_BIN $INTELLIJ_BIN && chmod a+x $INTELLIJ_BIN
}

execute(){
    sudo $INTELLIJ_EXEC > /dev/null 2>&1
}

start && info
if [ ! -f $INTELLIJ_EXEC ];
then 
    binary_file
fi
execute
