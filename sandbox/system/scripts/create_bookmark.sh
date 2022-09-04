#!/bin/bash
BOOKMARK_PATH="/var/www/platform/sandbox/workspace/bookmarks/"
PLATFORM_SYSTEM_APPLICATIONS_PATH="/var/www/platform/sandbox/system/applications/"

sudo -k
fix_permissions(){
  sudo chmod 0755 -R .
}

generate_content_php()
{
    if [ -z $1 ] && [ -z $2 ]
    then
        echo "<?php
/**
 * $1
 * Bookmark link to URL
 *
 * @version     $Id: index.php 40 2011-02-09 14:10:00Z biyi $
 * @package     Platform
 * @category    Bookmarks
 * @author      Biyi Akinpelu
 * @link        mailto:biyi@entilda.com
 * @copyright   Copyright (C) 2011 Entilda IT Solutions. All rights reserved.
 * @license     GNU/GPL, see LICENSE.php
 * Platform is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.php for copyright notices and details.
 */

// initilizing platform for self-contained objects
platform_launch_initialize();

redirect_to('$2');
?>" > BOOKMARK_PATH/$1/index.php
    else 
        echo ""
        echo "Please specify a bookmark name and url"
        echo ""
        echo "USAGE:"
        echo ""
        echo "$0 $1 $2"
    fi 
}

generate_content_html()
{
    if [ -z $1 ] && [ -z $2 ]
    then
        echo "<html>
<head>
  <title>$1</title>
  <script>
  window.location.href = \"$2\";
  </script>
</head>
<body>
</body>
</html>" > BOOKMARK_PATH/$1/index.html
    else 
        echo ""
        echo "Please specify a bookmark name and url"
        echo ""
        echo "USAGE:"
        echo ""
        echo "$0 $1 $2"
    fi
} 

create_bookmark()
{
    if [ -z $1 ] && [ -z $2 ]
    then
        if [ ! -d "$BOOKMARK_PATH" ]
        then
        mkdir -p $BOOKMARK_PATH
        fi

        if [ ! -d "$BOOKMARK_PATH/$1" ]
        then
        echo ""
        echo "Creating bookmark $1..."
        mkdir -p $BOOKMARK_PATH/$1 
        touch $BOOKMARK_PATH/$1/README.md && echo "#README" > $BOOKMARK_PATH/$1/README.md 
        touch $BOOKMARK_PATH/$1/TODO.md && echo "#TODO" > $BOOKMARK_PATH/$1/TODO.md 
        cd $BOOKMARK_PATH/$1 && fix_permissions
        echo ""
        echo "Creating bookmark in '$BOOKMARK_PATH/$1'..."
        echo ""
        generate_content_php
        generate_content_html
        ln -s $BOOKMARK_PATH/$1 $PLATFORM_SYSTEM_APPLICATIONS_PATH/$1
        echo ""
        echo "Bookmark created."
        echo ""
        echo ""
        echo "Quick note"
        echo "----------"
        echo "Start by adding content to '$BOOKMARK_PATH/$1/README.md'..."
        echo ""
        echo "If wish to rename the bookmark, then Edit or Rename '$1' to whatever you want."
        echo ""
        echo ""
        echo "Enjoy!"
        else 
            echo ""
            echo "Bookmark '$1' already exists"
        fi
    else  
        echo ""
        echo "Please specify a bookmark name and url"
        echo ""
        echo "USAGE:"
        echo ""
        echo "$0 $1 $2"
    fi
} 

create_bookmark