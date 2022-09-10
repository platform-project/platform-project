#!/bin/bash
APP_NAME="Platform"
APP_ICON="/var/www/platform/sites/icons/application-128x128.png"
title=$1
message=$2 

notify(){
  notify-send -t 10000 -a ${APP_NAME} --icon=${APP_ICON} "$title" "$message"
}

notify_latest(){
  notify-send -t 10000 -a ${APP_NAME} --icon=${APP_ICON} 'Platform' 'This is currently the latest build.'
}

notify_thanks(){
  notify-send -t 10000 -a ${APP_NAME} --icon=${APP_ICON} 'Platform' 'Thank you for your support'
}

notify_update(){
  notify-send -t 10000 -a ${APP_NAME} --icon=${APP_ICON} 'Platform' 'An update is currently available.'
}


case $PARAM in
  latest|--latest)
  notify_latest
  ;;

  thanks|--thanks)
  notify_thanks
  ;;

  update|--update)
  notify_update
  ;;

esac


notify