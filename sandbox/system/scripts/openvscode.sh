#!/bin/bash
PLATFORM_WORKSPACE_PATH="/platform/sandbox/workspace/"
PLATFORM_BUILDS_PATH="/platform/sandbox/workspace/builds/"
PLATFORM_OPENVSCODE_PATH="${PLATFORM_BUILDS_PATH}/openvscode/"
PLATFORM_OPENVSCODE_EXEC="${PLATFORM_OPENVSCODE_PATH}/bin/openvscode-server"
PARAM=$1

init()
{
    cd $PLATFORM_WORKSPACE_PATH
    mkdir -p $PLATFORM_BUILDS_PATH > /dev/null 2>&1
}

install()
{
    cd $PLATFORM_BUILDS_PATH
    wget https://github.com/gitpod-io/openvscode-server/releases/download/openvscode-server-v1.92.1/openvscode-server-v1.92.1-linux-x64.tar.gz 
    tar -zxf openvscode-server-v1.92.1-linux-x64.tar.gz
    mv openvscode-server-v1.92.1-linux-x64 openvscode
    rm -f openvscode-server-v1.92.1-linux-x64.tar.gz
}

run()
{
    cd $OPENVSCODE_PATH 
    $PLATFORM_OPENVSCODE_EXEC --port 8883 --without-connection-token  
}


case $PARAM in
  install|--install)
  echo "installing openvscode..."
  echo ""
  init
  install
  echo ""
  echo ""
  echo "installation completed."
  ;;

  run|--run)
  echo "running openvscode..."
  echo ""
  run
  ;;

esac
