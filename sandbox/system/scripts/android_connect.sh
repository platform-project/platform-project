#!/bin/bash
ANDROID_PATH=/sandbox/workspace/builds/android
ANDROID_SDK_PATH=$ANDROID_PATH/sdk
ANDROID_SDK_PLATFORM_TOOLS_PATH=$ANDROID_SDK_PATH/platform-tools
ANDROID_SDK_TOOLS_PATH=$ANDROID_SDK_PATH/tools

connect(){
  $ANDROID_SDK_PLATFORM_TOOLS_PATH/adb kill-server
  $ANDROID_SDK_PLATFORM_TOOLS_PATH/adb start-server
  $ANDROID_SDK_TOOLS_PATH/emulator -list-avds	
  $ANDROID_SDK_TOOLS_PATH/emulator @$1 > /dev/null
}

connect $1
