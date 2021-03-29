#!/bin/bash
# Script Name: Selenium
# Author: The Platform Authors <platfom@entilda.com>
# Base System: Platform
# Build Name: nojitsu
# Build Initial: 0.01 build 20120430
# Copyright: The Platform Authors 2011 - 2015
# License: GNU Public Licence
# Scripting Engine: Shell Script
# Version Initial: 2012-04-30
# Version: 0.04 build 20150416 nojitsu
# Website: http://platform.entilda.com/about
COMMAND_PARAM=$1
SELENIUM_PATH=/var/www/domain.com/tests/selenium
SELENIUM_SERVER_HOST="127.0.0.1"
SELENIUM_SERVER_PATH=${SELENIUM_PATH}/builds/server
SELENIUM_DRIVER_PATH=${SELENIUM_PATH}/builds/driver
SELENIUM_LOGS_PATH=${SELENIUM_PATH}/logs


export DISPLAY=:0.0

# startup fresh java instances

if [ "$COMMAND_PARAM" = "" ]; then
 echo "Usage: "
 echo "     {command} [start|stop]"
fi

if [ "$COMMAND_PARAM" = "start" ]; then
  echo "Starting Selenium server instance..."
  # start up the server
  java -jar ${SELENIUM_SERVER_PATH}/selenium-server-standalone-2.35.0.jar -role hub > ${SELENIUM_LOGS_PATH}/selenium-server.log &
  sleep 30

  echo "Starting Selenium client instance..."
  # start up the client
  java -jar ${SELENIUM_SERVER_PATH}/selenium-server-standalone-2.35.0.jar -role node -hub http://${SELENIUM_SERVER_HOST}:4444/grid/register -port 5555 > ${SELENIUM_LOGS_PATH}/selenium-client.log &
  sleep 30
fi

if [ "$COMMAND_PARAM" = "stop" ]; then
  killall java  # TODO: kill more specific process
  echo "Stopping instances of Selenium server and client..."
fi

