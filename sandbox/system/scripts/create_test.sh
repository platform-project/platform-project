#!/bin/bash
USER=`whoami`
REVISION="{REVISIION}"
DATETIME=`date +%Y-%m-%d_%Hh%Mm%Ss`
YEAR=`date +%Y` 
TEST_PATH="/var/www/platform/sandbox/workspace/tests"
sudo -k
fix_permissions(){
  sudo chmod 0755 -R .
}
if [ "$1" = "" ]
then
  echo ""
  echo "Please specify a project name"
  echo ""
  else 
    if [ ! -d "$TEST_PATH" ]
    then
      mkdir -p $TEST_PATH
    fi

    if [ ! -d "$1" ]
    then
      echo ""
      echo "Creating test $1..."
      mkdir -p $TEST_PATH/$1 
      touch $TEST_PATH/$1/index.php && echo "<?php
    /**
    * $1 test
    * Test case:   This is a $1 test file
    *
    * @version     $Id: index.php $REVISION $DATETIME $USER $
    * @package     Platform
    * @category    Tests
    * @author      Platform
    * @link        mailto:platform@entilda.com
    * @copyright   Copyright (C) 2011 - $YEAR The Platform Authors. All rights reserved.
    * @license     GNU Public Licence, see LICENSE.md
    * Platform is free software. This version may have been modified pursuant
    * to the GNU General Public License, and as distributed it includes or
    * is derivative of works licensed under the GNU General Public License or
    * other free or open source software licenses.
    * See COPYRIGHT.md for copyright notices and details.
    */

    // initilizing platform for self-contained objects
    platform_launch_initialize();" > $TEST_PATH/$1/index.php 
      touch $TEST_PATH/$1/COPYRIGHT.md && echo "#COPYRIGHT" > $TEST_PATH/$1/COPYRIGHT.md 
      touch $TEST_PATH/$1/LICENSE.md && echo "#LICENSE" > $TEST_PATH/$1/LICENSE.md 
      touch $TEST_PATH/$1/README.md && echo "#README" > $TEST_PATH/$1/README.md 
      touch $TEST_PATH/$1/TODO.md && echo "#TODO" > $TEST_PATH/$1/TODO.md 
      cd $TEST_PATH/$1 && fix_permissions
      echo ""
      echo "Creating test in '$TEST_PATH/$1'..."
      echo ""
      echo ""
      echo "Test created."
      echo ""
      echo ""
      echo "Quick note"
      echo "----------"
      echo "Start by adding content to '$TEST_PATH/$1/README.md'..."
      echo ""
      echo "Do you have things to do? If 'yes', then start by editing your TODO list"
      echo ""
      echo "See $TEST_PATH/$1/TODO.md"
      echo ""
      echo ""
      echo "Enjoy!"
    else 
      echo ""
      echo "Test '$1' already exists"
    fi
fi