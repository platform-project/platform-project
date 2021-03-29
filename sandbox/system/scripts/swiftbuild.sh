#!/bin/bash
BUILD_PATH=/sandbox/workspace/builds
PREBUILD_PATH=/sandbox/workspace/.prebuilds
SWIFT_RELEASE=swift-4.0.2-RELEASE-ubuntu16.10
SWIFT_RELEASE_URI=https://swift.org/builds/swift-4.0.2-release/ubuntu1610/swift-4.0.2-RELEASE/swift-4.0.2-RELEASE-ubuntu16.10.tar.gz
sudo -k

setup_swift(){
    mkdir -p $BUILD_PATH/swift
    mkdir -p $PREBUILD_PATH
    cd $PREBUILD_PATH && wget $SWIFT_RELEASE_URI
    tar -zxf $SWIFT_RELEASE.tar.gz
    mv $SWIFT_RELEASE $BUILD_PATH/swift/    
}

install_dependencies(){
    sudo apt-get install libstdc++6 clang libicu-dev
    sudo add-apt-repository ppa:ubuntu-toolchain-r/test 
    sudo apt-get update
    sudo apt-get upgrade
    sudo apt-get dist-upgrade
}

create_bash_entry(){
    # TODO: check that ~/.bashrc file exists 
    echo "export SWIFT_HOME=\"$BUILD_PATH/swift\" # Add SWIFT_HOME
export PATH=\"\$PATH:\$SWIFT_HOME/usr/bin\" # Add swift to PATH
" >> ~/.bashrc
}

create_zsh_entry(){
    # TODO: check that ~/.zshrc file exists 
    echo "export SWIFT_HOME=\"$BUILD_PATH/swift\" # Add SWIFT_HOME
export PATH=\"\$PATH:\$SWIFT_HOME/usr/bin\" # Add swift to PATH
" >> ~/.zshrc
}

setup_swift && install_dependencies
create_bash_entry        #uncomment to use bash
#create_zsh_entry        #uncomment to use zsh