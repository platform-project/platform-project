#!/bin/sh
PROXY_SERVER_ADDR='172.16.0.22'
PROXY_SERVER_PORT='3142'
echo 'echo "Acquire::http::Proxy \"http://$PROXY_SERVER_ADDR:$PROXY_SERVER_PORT\";" > /etc/apt/apt.conf.d/01proxy' | sudo sh;