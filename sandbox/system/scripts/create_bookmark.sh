#!/bin/bash
BOOKMARK_PATH="/var/www/platform/sandbox/workspace/bookmarks"
PLATFORM_SYSTEM_APPLICATIONS_PATH="/var/www/platform/sandbox/system/applications"
script=$0
bookmark=$1
url=$2

#echo $bookmark " v " $url 

sudo -k
fix_permissions(){
  sudo chmod 0755 -R .
}

generate_content_php()
{
    if [ -z $bookmark ] && [ -z $url ]
    then
        echo ""
        echo "Please specify a bookmark name and url"
        echo "USAGE:"
        echo ""
        echo "$script $bookmark $url"
    else 
        touch $BOOKMARK_PATH/$bookmark/index.php
        echo "<?php
/**
 * $bookmark
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

redirect_to('$url');
?>" > $BOOKMARK_PATH/$bookmark/index.php
    fi 
}

generate_content_html()
{
    if [ -z $bookmark ] && [ -z $url ]
    then
        echo ""
        echo "Please specify a bookmark name and url"
        echo "USAGE:"
        echo ""
        echo "$@"
    else 
        touch $BOOKMARK_PATH/$bookmark/index.html
        echo "<html>
<head>
  <title>$bookmark</title>
  <script>
  window.location.href = \"$url\";
  </script>
</head>
<body>
</body>
</html>" > $BOOKMARK_PATH/$bookmark/index.html
        
    fi
} 

create_bookmark()
{
    if [ -z $bookmark ] && [ -z $url ]
    then
        echo ""
        echo "Please specify a bookmark name and url"
        echo "USAGE:"
        echo ""
        echo "$script $bookmark $url"
    else  
        if [ ! -d "$BOOKMARK_PATH" ]
        then
        mkdir -p $BOOKMARK_PATH
        fi

        if [ ! -d "$BOOKMARK_PATH/$bookmark" ]
        then
        echo ""
        echo "Creating bookmark $bookmark..."
        mkdir -p $BOOKMARK_PATH/$bookmark 
        touch $BOOKMARK_PATH/$bookmark/README.md && echo "#README" > $BOOKMARK_PATH/$bookmark/README.md 
        touch $BOOKMARK_PATH/$bookmark/TODO.md && echo "#TODO" > $BOOKMARK_PATH/$bookmark/TODO.md 
        cd $BOOKMARK_PATH && fix_permissions && cd ~
        generate_content_php
        generate_content_html
        echo ""
        echo "Creating bookmark in '$BOOKMARK_PATH/$bookmark'..."
        echo ""
        ln -s $BOOKMARK_PATH/$bookmark $PLATFORM_SYSTEM_APPLICATIONS_PATH/
        echo ""
        echo "Bookmark created."
        echo ""
        echo ""
        echo "Quick note"
        echo "----------"
        echo "Start by adding content to '$BOOKMARK_PATH/$bookmark/README.md'..."
        echo ""
        echo "If wish to rename the bookmark, then Edit or Rename '$bookmark' to whatever you want."
        echo ""
        echo ""
        echo "Enjoy!"
        else 
            echo ""
            echo "Bookmark '$bookmark' already exists"
        fi
    fi
} 

create_bookmark