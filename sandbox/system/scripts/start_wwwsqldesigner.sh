#!/bin/bash
WWWSQLDESIGNER_HOME="/sandbox/workspace/applications/"
HOST="localhost"
PORT="3333"
sudo -k
echo "Starting WWW SQL Designer on port ${PORT}"
cd $WWWSQLDESIGNER_HOME && php -S ${HOST}:${PORT}
echo ""
echo "started."
echo ""