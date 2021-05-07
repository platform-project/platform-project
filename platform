#!/bin/bash
# App Name: Platform Core Engine
# Author: The Platform Authors <platform@entilda.com>
# Base System: Platform
# Build Name: nojitsu
# Build Initial: 0.00 build 20210328
# Copyright: The Platform Authors 2011 - 2021
# License: GNU Public Licence
# Scripting Engine: Shell Script
# Version Initial: 2011-03-28
# Version: 0.00 build 20110328 nojitsu
# Website: http://platform.entilda.com
APP_NAME="Platform"
APP_UID="platform"
APP_CMD="$APP_UID"
APP_REVISION="0.0"
APP_UA="$APP_NAME/$APP_REVISION"
APP_DATETIME=`date +%Y.%m.%d.%Hh%Mm%Ss`         # Datestamp e.g 2002.09.21.0h0m0s
APP_DATE=`date +%Y.%m.%d`                       # Datestamp e.g 2002.09.21
APP_DOW=`date +%A`                              # Day of the week e.g. Monday
APP_DNOW=`date +%u`                             # Day number of the week 1 to 7 where 1 represents Monday
APP_DOM=`date +%d`                              # Date of the Month e.g. 27
APP_M=`date +%B`                                # Month e.g January
APP_W=`date +%V`                                # Week Number e.g 37
APP_Y=`date +%Y`                                # Year e.g 2010
APP_STATUS="Latest build"
APP_BUILD_NAME="nojitsu"
APP_VERSION="$APP_REVISION build $APP_DATETIME $APP_BUILD_NAME"
APP_CODENAME="Genie Ejekajo"
APP_PACKAGES_URI="http://platform.entilda.com/sandbox/system/packages/system.list"
APP_SNAPSHOT_URI="http://platform.entilda.com/snapshots/platform.pva"
APP_COMPOSER_URI="https://getcomposer.org/installer"

HOSTNODE="127.0.0.2   $APP_UID"
HOSTNAME=`hostname --fqdn`
HOSTTEST=`cat "/etc/hosts" | awk '/platform/' | awk '{print $2}'`
OS_KERNEL=`uname -vps`
SYS_USER=`whoami`

APACHE_USER="www-data"
APACHE_GROUP="www-data"
CUR_PATH=`pwd`

COMMAND="[find]|[debug]|[help]|[version]|[info|status]|
                 [build|install|extract]|[remove|purge|uninstall]|
                 [compress|clone|snapshot|image]|[update]|[download]|
                 [clean]|[generate]|[restore]|[reload]|[sync]|
                 [clean-repository]|[clean-system-repository]|
                 [backup-repository]|[backup-system-repository]|
                 [install-dep|install-dependencies]|[list-dependencies]|
                 [list-application-dependencies]|[list-default-dependencies]|
                 [list-os-dependencies]|[list-package-dependencies]|
                 [list-platform-dependencies]|[list-system-dependencies]|
                 [desktop-icon]|[machine-up]|[server-up]|[scripts]|[execute|run]|
                 [create-project]|[create-test]|[check-updates]"

PARAMETERS="[--find]|[--debug]|[--help]|[--version]|[--info|--status]|
                 [--build|--install|--extract]|[--remove|--purge|--uninstall]|
                 [--compress|--clone|--snapshot|--image]|[--update]|[--download]|
                 [--clean]|[--generate]|[--restore]|[--reload]|[--sync]|
                 [--clean-repository]|[--clean-system-repository]|
                 [--backup-repository]|[--backup-system-repository]|
                 [--install-dep|--install-dependencies]|[--list-dependencies]|
                 [--list-application-dependencies]|[--list-default-dependencies]|
                 [--list-os-dependencies]|[--list-package-dependencies]|
                 [--list-platform-dependencies]|[--list-system-dependencies]|
                 [--desktop-icon]|[--machine-up]|[--server-up]|[--scripts]|[--execute|--run]|
                 [--create-project]|[--create-test][--check-updates]"

PARAM=$1

APP_PATH="/var/www/$APP_UID"
APP_LOGS="$APP_PATH/sandbox/system/logs"
OS_REPOSITORY_PATH="/var/cache/apt/archives/"

GIT_SSL_VERIFY="export GIT_SSL_NO_VERIFY=1"
#GIT_SSL_VERIFY="git config --global http.sslverify false"
GIT_REPOSITORY="https://github.com/platform-project/platform-project"

# status gauage
GIT_STATUS=`git branch -v | grep -E 'ahead|behind' | sed -r 's/[ *]\s(\S*).*(\[(ahead|behind).+?\]).*/\1 \2/g'`

# managing dependencies
APP_DEPENDENCIES="$APP_PATH/sandbox/system/packages/application.list"
DEF_DEPENDENCIES="$APP_PATH/sandbox/system/packages/default.list"
PKG_DEPENDENCIES="$APP_PATH/sandbox/system/packages/package.list"
PLT_DEPENDENCIES="$APP_PATH/sandbox/system/packages/platform.list"
SYS_DEPENDENCIES="$APP_PATH/sandbox/system/packages/system.list"
OS_DEPENDENCIES="$APP_PATH/sandbox/system/packages/os.list"

PLATFORM_HOME="$APP_PATH"
PLATFORM_USER="$SYS_USER"
PLATFORM_DOMAIN="platform.entilda.com"
PLATFORM_ALIVE=`ping -c 1 "$PLATFORM_DOMAIN" | awk '/1 packets transmitted, 1 received, 0% packet loss/' | awk '{print $1 $2 $3 $4 $5 $6 $7 $8 $9 $10}'`
PLATFORM_ALIAS="/bin/pl"
PLATFORM_BIN="/bin/platform"
PLATFORM_CLI_URI="http://$PLATFORM_DOMAIN/platform"
PLATFORM_USER_HOME="/home/$PLATFORM_USER"
PLATFORM_TMP_HOME="$PLATFORM_USER_HOME/.$APP_UID"
PLATFORM_SYNC_HOME="$PLATFORM_TMP_HOME/sync"
PLATFORM_UONE_HOME="$PLATFORM_USER_HOME/Uploads"
PLATFORM_UONE_PLATFORM="$PLATFORM_UONE_HOME/$APP_UID"
PLATFORM_UONE_SNAPSHOTS="$PLATFORM_UONE_PLATFORM/snapshots"
PLATFORM_SNAPSHOTS_HOME="$PLATFORM_HOME/snapshots"
PLATFORM_SANDBOX_PATH="$PLATFORM_HOME/sandbox"
PLATFORM_FRAMEWORK_PATH="$PLATFORM_SANDBOX_PATH/framework"
PLATFORM_REPOSITORY_PATH="$PLATFORM_SANDBOX_PATH/repository"
PLATFORM_SYSTEM_PATH="$PLATFORM_SANDBOX_PATH/system"
PLATFORM_WORKSPACE_PATH="$PLATFORM_SANDBOX_PATH/workspace"
PLATFORM_PACKAGES_PATH="$PLATFORM_SYSTEM_PATH/packages"
PLATFORM_PROJECTS_PATH="$PLATFORM_WORKSPACE_PATH/projects"
PLATFORM_TESTS_PATH="$PLATFORM_WORKSPACE_PATH/tests"

platform_authenticate(){
  sudo -k
  #echo "Enter your password"
}
platform_authenticate

platform_check_status()
{
  echo "Checking system status..."
  echo ""
  git fetch origin > /dev/null
  if [[ $GIT_STATUS = *"0.0 [ahead"* || $GIT_STATUS = *"0.0 [behind"* ]]; 
  then
    echo "Updates are available"
  else
    echo "No update available"
  fi
}

platform_status()
{
  echo ""
  echo "App Name: $APP_NAME"
  echo "Version: $APP_VERSION"
  echo "Codename: $APP_CODENAME"
  echo "Virtual System: $APP_NAME Core"
  echo "Hostname: $HOSTNAME"
  echo "Operating System: $OS_KERNEL"
  echo "Author: The Platform Authors <platform@entilda.com>"
  echo "Copyright: The Platform Authors 2011 - $APP_Y"
  echo "License: MIT License"
  echo "Website: http://platform.entilda.com (maintenance)"
  echo ""
}

platform_usage()
{
  echo "$APP_NAME v$APP_VERSION"
  echo "usage: "
  echo "$APP_CMD OPTIONS $COMMAND input_file output_file"
  echo ""
  echo "$APP_CMD OPTIONS $PARAMETERS input_file output_file"
  echo ""
}

platform_help(){
  echo "show the help screen"
  echo "  $APP_CMD help [--help]"
  echo ""
  echo "show the current platform version"
  echo "  $APP_CMD version [--version]"
  echo ""
  echo "install platform "
  echo "  $APP_CMD install [--install]"
  echo ""
  echo "uninstall platform"
  echo "  $APP_CMD uninstall [--uninstall]"
  echo ""
  echo "extract platform virtual archive (.pva)"
  echo "  $APP_CMD extract [--extract] <pva_file>"
  echo ""
  echo "compress platform virtual archive (.pva)"
  echo "  $APP_CMD compress [--compress] <pva_file> <path_to_compress>"
  echo ""
  echo "restore platform install state"
  echo "  $APP_CMD restore [--restore] "
  echo "or to restore a remote resource"
  echo "  $APP_CMD restore [--restore] <remote_resource>"
  echo ""
  echo "reload platform state (e.g. for fixing platform global scope or fixing  platform system permissions)"
  echo "  $APP_CMD reload [--reload] "
  echo ""
  echo "debug platform files in current working directory"
  echo "  $APP_CMD debug"
  echo ""
  echo "install platform dependencies"
  echo "  $APP_CMD install-dep <application> <project_name>"
  echo ""
  echo "  e.g: "
  echo "  $APP_CMD install-dep laravel foo"
  echo ""
  echo "clean repository"
  echo "  $APP_CMD clean-repository <repository_path>"
  echo ""
  echo "clean system repository"
  echo "  $APP_CMD clean-system-repository"
  echo ""
  echo "backup repository"
  echo "  $APP_CMD backup-repository <repository_path> <backup_path>"
  echo ""
  echo "backup system repository"
  echo "  $APP_CMD backup-system-repository <backup_path>"
  echo ""
  echo "create platform project"
  echo "  $APP_CMD create-project <project_name>"
  echo ""
  echo "create platform test"
  echo "  $APP_CMD create-test <test_name>"
  echo ""
}

platform_version()
{
  echo $APP_VERSION
}

platform_copy(){
  cp -ar $2 $3
}

platform_rc()
{
  if [ ! -e "$PLATFORM_BIN" ]
  then
    if [ "$PLATFORM_ALIVE" != "" ]
    then
      # Breathe, I am alive!
      echo "Connecting to $PLATFORM_DOMAIN..."
      sudo -k && cd && /usr/bin/wget --continue --user-agent="$APP_UA" $PLATFORM_CLI_URI && sudo chmod 0777 /home/$PLATFORM_USER/platform && sudo mv /home/$PLATFORM_USER/platform $PLATFORM_BIN && sudo ln -s $PLATFORM_BIN $PLATFORM_ALIAS
      echo "Binary installed: $PLATFORM_BIN"
    fi
  fi
}

platform_sync_rc()
{
  platform_authenticate
  if [ ! -d "$PLATFORM_TMP_HOME" ]
  then
    mkdir -p $PLATFORM_TMP_HOME
  fi

  if [ ! -d "$PLATFORM_UONE_HOME" ]
  then
    mkdir -p $PLATFORM_UONE_HOME
  fi

  if [ -e "$PLATFORM_USER_HOME/.bashrc" ]
  then
    cp -var $PLATFORM_USER_HOME/.bashrc $PLATFORM_UONE_HOME/ > /dev/null 2>&1
  fi
}

platform_sync()
{
  platform_sync_rc
  if [ "$PLATFORM_ALIVE" != "" ]
  then
    if [ ! -d "$PLATFORM_SYNC_HOME" ]
    then
      mkdir -p $PLATFORM_SYNC_HOME
    fi
    cd $PLATFORM_SYNC_HOME && git clone $GIT_REPOSITORY $APP_UID && $0 compress $PLATFORM_SYNC_HOME/$APP_UID.pva $PLATFORM_SYNC_HOME/$APP_UID

    if [ ! -d "$PLATFORM_UONE_PLATFORM" ]
    then
      mkdir -p $PLATFORM_UONE_PLATFORM
    fi

    if [ ! -d "$PLATFORM_UONE_SNAPSHOTS" ]
    then
      mkdir -p $PLATFORM_UONE_SNAPSHOTS
    fi
    cp -var $PLATFORM_SYNC_HOME/$APP_UID.pva $PLATFORM_UONE_SNAPSHOTS > /dev/null 2>&1
    cp -var $PLATFORM_SYNC_HOME/$APP_UID.pva $PLATFORM_SNAPSHOTS_HOME > /dev/null 2>&1
  fi
  rm -rf $PLATFORM_TMP_HOME
}

platform_core_update()
{
  cd $APP_PATH && git pull
}

platform_reload_cli()
{
  sudo chmod 0777 $APP_PATH/platform && sudo cp -var $APP_PATH/platform /bin > /dev/null 2>&1
  sudo ln -s /bin/platform /bin/pl > /dev/null 2>&1
}

platform_reload_apache2()
{
  # configuring apache2
  if [ ! -e "$APP_PATH/sandbox/system/logs/platform-error.log" ]
  then
    touch $APP_PATH/sandbox/system/logs/platform-error.log
  fi
  sudo service apache2 restart > /dev/null 2>&1
}

platform_fix_permissions(){

  # fixing permissions
  sudo chmod 0755 $APP_PATH/ -R > /dev/null 2>&1

  sudo chmod 0777 $APP_PATH/sandbox/system/applications/browser/assets/js/jquery-1.4.2.min.js > /dev/null 2>&1
  sudo chmod 0777 $APP_PATH/sandbox/system/applications/browser/assets/js/jquery.min.js > /dev/null 2>&1
  sudo chmod 0777 $APP_PATH/sandbox/system/applications/browser/assets/css/jquery.jgrowl.css > /dev/null 2>&1
  sudo chmod 0777 $APP_PATH/sandbox/system/applications/browser/assets/js/jquery.jgrowl.js > /dev/null 2>&1

  sudo chmod 0777 $APP_PATH/sandbox/system/languages/javascript/frameworks/jquery/src/jquery-1.4.2.min.js > /dev/null 2>&1
  sudo chmod 0777 $APP_PATH/sandbox/system/languages/javascript/frameworks/jquery/plugins/jgrowl/jquery.jgrowl.css > /dev/null 2>&1
  sudo chmod 0777 $APP_PATH/sandbox/system/languages/javascript/frameworks/jquery/plugins/jgrowl/jquery.jgrowl.js > /dev/null 2>&1
  sudo chmod 0777 $APP_PATH/sandbox/system/applications/browser/cache.html > /dev/null 2>&1
  sudo chmod 0777 $APP_PATH/sandbox/system/caches/ -R > /dev/null 2>&1

  # fixing ownerships
  sudo chown -R $SYS_USER:$APACHE_GROUP $APP_PATH > /dev/null 2>&1
}

platform_generate_cpp_header()
{
  echo "/**
 * This is a cpp header file
 * @version     \$Id: platform.h $APP_REVISION $APP_DATETIME $SYS_USER \$
 * @package     Platform
 * @category    Header
 * @author      The Platform Authors
 * @link        mailto:platform@entilda.com
 * @copyright   Copyright (C) 2011 - $APP_Y The Platform Authors. All rights reserved.
 * @license     GNU Public Licence, see LICENSE.md
 * Platform is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.md for copyright notices and details.
 */

#ifndef PLATFORM_H
#define PLATFORM_H

class Platform
{
    public:
        Platform();
        virtual ~Platform();
    protected:
    private:
};

#endif // PLATFORM_H
"
}

platform_generate_cpp()
{
  echo "/**
 * This is a cpp file
 * @version     \$Id: platform.cpp $APP_REVISION $APP_DATETIME $SYS_USER \$
 * @package     Platform
 * @category    CPP
 * @author      The Platform Authors
 * @link        mailto:platform@entilda.com
 * @copyright   Copyright (C) 2011 - $APP_Y The Platform Authors. All rights reserved.
 * @license     GNU Public Licence, see LICENSE.md
 * Platform is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.md for copyright notices and details.
 */

#include \"platform.h\"

Platform::Platform()
{
    // constructor
}

Platform::~Platform()
{
    //destructor
}
"
}

platform_generate_main_cpp()
{
  echo "/**
 * This is the main cpp file
 * @version     \$Id: main.cpp $APP_REVISION $APP_DATETIME $SYS_USER \$
 * @package     Platform
 * @category    CPP
 * @author      The Platform Authors
 * @link        mailto:platform@entilda.com
 * @copyright   Copyright (C) 2011 - $APP_Y The Platform Authors. All rights reserved.
 * @license     GNU Public Licence, see LICENSE.md
 * Platform is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.md for copyright notices and details.
 */

#include \"platform.h\"
#include <iostream>

int main()
{
  std::cout << \"Hello, World!\";
}
"
}

platform_generate_cbp()
{
  echo "<?xml version=\"1.0\" encoding=\"UTF-8\" standalone=\"yes\" ?>
<CodeBlocks_project_file>
  <FileVersion major=\"1\" minor=\"6\" />
  <Project>
    <Option title=\"platform\" />
    <Option pch_mode=\"2\" />
    <Option compiler=\"gcc\" />
    <Build>
      <Target title=\"Debug\">
        <Option output=\"bin/Debug/platform\" prefix_auto=\"1\" extension_auto=\"1\" />
        <Option object_output=\"obj/Debug/\" />
        <Option type=\"1\" />
        <Option compiler=\"gcc\" />
        <Compiler>
          <Add option=\"-g\" />
          <Add directory=\"include\" />
        </Compiler>
      </Target>
      <Target title=\"Release\">
        <Option output=\"bin/Release/platform\" prefix_auto=\"1\" extension_auto=\"1\" />
        <Option object_output=\"obj/Release/\" />
        <Option type=\"1\" />
        <Option compiler=\"gcc\" />
        <Compiler>
          <Add option=\"-O2\" />
          <Add directory=\"include\" />
        </Compiler>
        <Linker>
          <Add option=\"-s\" />
        </Linker>
      </Target>
    </Build>
    <Compiler>
      <Add option=\"-Wall\" />
    </Compiler>
    <Unit filename=\"include/platform.h\" />
    <Unit filename=\"src/main.cpp\" />
    <Unit filename=\"src/platform.cpp\" />
    <Extensions>
      <code_completion />
      <debugger />
    </Extensions>
  </Project>
</CodeBlocks_project_file>
"
}

platform_generate_projects_index()
{
  echo "<?php
/**
 * $2 project
 * project case:   This is a $2 project index file
 *
 * @version     \$Id: index.php $APP_REVISION $APP_DATETIME $SYS_USER \$
 * @package     Platform
 * @category    Tests
 * @author      Platform
 * @link        mailto:platform@entilda.com
 * @copyright   Copyright (C) 2011 - $APP_Y The Platform Authors. All rights reserved.
 * @license     GNU Public Licence, see LICENSE.md
 * Platform is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.md for copyright notices and details.
 */

// initilizing platform for self-contained objects
platform_launch_initialize();

echo \"Hello World!\";"
}

platform_generate_php()
{
  echo "<?php
/**
 * This is a php file
 * @version     \$Id: index.php $APP_REVISION $APP_DATETIME $SYS_USER \$
 * @package     Platform
 * @category    PHP
 * @author      The Platform Authors
 * @link        mailto:platform@entilda.com
 * @copyright   Copyright (C) 2011 - $APP_Y The Platform Authors. All rights reserved.
 * @license     GNU Public Licence, see LICENSE.md
 * Platform is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.md for copyright notices and details.
 */
platform_launch_initialize();

echo \"Hello World!\";"
}

platform_generate_tests_index()
{
echo "<?php
/**
 * <test_name> test
 * Test case:   This is a <test_name> test file
 *
 * @version     \$Id: index.php $APP_REVISION $APP_DATETIME $SYS_USER \$
 * @package     Platform
 * @category    Tests
 * @author      Platform
 * @link        mailto:platform@entilda.com
 * @copyright   Copyright (C) 2011 - $APP_Y The Platform Authors. All rights reserved.
 * @license     GNU Public Licence, see LICENSE.md
 * Platform is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.md for copyright notices and details.
 */

// initilizing platform for self-contained objects
platform_launch_initialize();
?>
<!DOCTYPE html>
<html lang=\"en\">
  <head>
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"initial-scale=1.0, user-scalable=no\" />
    <meta name=\"description\" content=\"Platform Application Prototype for Test &lt;test:name&gt;\">
    <meta name=\"author\" content=\"Plaform\">
    <title>Platform Application Prototype for Test &lt;test:name&gt;</title>
    <link rel=\"stylesheet\" type=\"text/css\" href=\"http://fonts.googleapis.com/css?family=Ubuntu:400,500,700,regular,bold&subset=Latin\" />
    <link rel=\"stylesheet\" type=\"text/css\" href=\"assets/css/app.css\" />
    <script src="https://unpkg.com/vue"></script>
    <?php js_add_jquery(); ?>
  </head>
  <body>
    <div class=\"content\">
      <p>&nbsp;</p>
    </div>
    <footer>
      <div id=\"app\">
        <span class=\"logo image\" style=\"background: transparent url('<?php echo image_data_uri(\"assets/images/icons/application.png\", \"png\"); ?>') no-repeat;\"></span>
        <span class=\"logo text\">Platform Application Prototype for Test &lt;test:name&gt;</span>
      </div>
    </footer>
    <?php js_add('assets/js/app.js'); ?>
  </body>
</html>"
}

platform_prompt(){
  read -r -p "Are you sure? [y/N] " response
  if [[ $response =~ ^([yY][eE][sS]|[yY])$ ]]
  then
      do_something
  else
      do_something_else
  fi
}

platform_clone(){
  echo $2
  if [ "$2" = "" ]
  then
    if [ ! -d "$APP_PATH" ]
    then
      sudo /usr/bin/git clone -b master $GIT_REPOSITORY $APP_PATH > /dev/null 2>&1
    else
      cd $APP_PATH && /usr/bin/git checkout master > /dev/null 2>&1
      /usr/bin/git pull origin master > /dev/null 2>&1
    fi
  fi

  if [ "$2" != "" ]
  then
    sudo /usr/bin/git clone $2
  fi
}

platform_destroy(){
  sudo rm -f /mirrors
  sudo rm -f /networks
  sudo rm -f /sandbox
  sudo rm -f /servers
  sudo rm -f /sites
  sudo rm -f /tests

  sudo rm -rf $APP_PATH > /dev/null 2>&1
  sudo rm -f /bin/$APP_UID > /dev/null 2>&1

  sudo rm -rf /home/$SYS_USER/Desktop/platform.desktop
  sudo rm -rf /home/$SYS_USER/Desktop/platform-browser.desktop
  sudo rm -rf /usr/share/applications/platform.desktop
  sudo rm -rf /usr/share/applications/platform-browser.desktop

  sudo rm -f /etc/apache2/sites-enabled/$APP_UID > /dev/null 2>&1
  sudo service apache2 restart > /dev/null 2>&1
}

platform_uninstall(){
  if [ ! -e "$PLATFORM_USER_HOME/system.list" ]
  then
    /usr/bin/wget --user-agent="$APP_UA" $APP_PACKAGES_URI -O $PLATFORM_USER_HOME/system.list > /dev/null 2>&1
  fi

  while read i;
  do
    SYS_DEPENDENCIES="$SYS_DEPENDENCIES $i";
  done < $PLATFORM_USER_HOME/system.list

  echo ""
  echo "This command will uninstall platform and remove system dependencies "
  #echo "including the following packages: "
  #cat $SYS_DEPENDENCIES | while read package
  #do
  #  echo "$package"
  #done
  echo ""

  read -r -p "Are you sure? [y/N] " response
  if [[ $response =~ ^([yY][eE][sS]|[yY])$ ]]
  then
    echo "removing platform..."
    platform_destroy
    echo ""
    echo "removing system dependencies..."
    sudo apt-get remove $SYS_DEPENDENCIES --force-yes -y > /dev/null 2>&1
    echo ""
    echo ""
    echo "platform uninstalled."
  fi
}

platform_list_application_dependencies()
{
  cat $APP_DEPENDENCIES
}

platform_list_default_dependencies()
{
  cat $DEF_DEPENDENCIES
}

platform_list_os_dependencies()
{
  cat $OS_DEPENDENCIES
}

platform_list_package_dependencies()
{
  cat $PKG_DEPENDENCIES
}

platform_list_platform_dependencies()
{
  cat $PLT_DEPENDENCIES
}

platform_list_system_dependencies()
{
  cat $SYS_DEPENDENCIES
}

platform_install_packages(){
  if [ ! -e "$PLATFORM_USER_HOME/system.list" ]
  then
    echo "downloading packages ..."
    /usr/bin/wget --user-agent="$APP_UA" $APP_PACKAGES_URI -O $PLATFORM_USER_HOME/system.list > /dev/null 2>&1
  fi

  while read i;
  do
    SYS_DEPENDENCIES="$SYS_DEPENDENCIES $i";
  done < $PLATFORM_USER_HOME/system.list
  sudo add-apt-repository "deb http://archive.ubuntu.com/ubuntu $(lsb_release -sc) main universe restricted multiverse"
  sudo apt-get update --fix-missing > /dev/null 2>&1
  sudo apt-get build-dep nodejs
  sudo apt-get install $SYS_DEPENDENCIES --force-yes -y > /dev/null 2>&1
  platform_install_recommended
  if [ -e "$PLATFORM_USER_HOME/system.list" ]
  then
    rm -f $PLATFORM_USER_HOME/system.list
  fi

}

platform_install_recommended()
{
  echo "installing packages..."
  #TODO: install recommended packages
  /usr/bin/curl -s "https://get.sdkman.io" | bash
  echo "installing node..."
  /usr/bin/curl https://raw.github.com/creationix/nvm/master/install.sh | sh

  # run the following in your terminal
  . ~/.nvm/nvm.sh                  #
  nvm install v8.1.3               # latest node as at time of writing
  echo "installing cordova..."
  npm install -g cordova           # adds cordova support and go to http://cordova.apache.org
  echo "installing phonegap..."
  npm install -g phonegap          # adds phonegap support and go to http://phonegap.com
  echo "installing ios-deploy..."
  npm install -g ios-deploy        # adds phonegap's ios-deploy tool 
  echo "installing ionic..."
  npm install -g ionic             # adds phonegap support and go to http://ionicframework.com
  echo "installing grunt..."
  npm install -g grunt grunt-cli   # adds grunt support and go to http://gruntjs.com
  echo "installing gulp..."
  npm install -g gulp gulp-cli     # adds gulp support and go to https://gulpjs.com 
  echo "installing bower..."
  npm install -g bower             # adds bower support and go to http://bower.io
  echo "installing react..."
  npm install -g react             # adds react support and go to https://reactjs.org
  echo "installing ava..."
  npm install -g ava               # adds ava support and go to https://ava.li
  echo "installing xo..."
  npm install -g xo                # adds xo support and go to https://ava.li
  echo "installing polymer..."
  npm install -g polymer           # adds polymer support and go to https://elements.polymer-project.org/
  echo "installing yeoman..."
  npm install -g yo                # adds yeoman support and go to http://yeoman.io
  echo "installing webpack..."     
  npm install -g webpack --save-dev	# adds webpack support and go to https://webpack.js.org
  echo "installing vue-cli..."
  npm install -g vue-cli           # adds vue support and go to https://vuejs.org
  echo "installing itms-services..."
  npm install -g itms-services     # adds itms-services support

  # running bower commands         #
  echo "installing bootstrap..."
  bower install -g bootstrap       # adds bootstrap support and go to http://getbootstrap.com
  # heroku support
  wget -qO- https://toolbelt.heroku.com/install-ubuntu.sh | sh

  # Possible third-parties
  # Meteor - https://www.meteor.com
  # React Native - https://facebook.github.io/react-native/
  # Ionic - https://ionic.io
  #

  # generators (yeoman, backbone)
  echo "installing generators..."
  npm install -g yeoman-generator
  npm install -g generator
  npm install -g generator-aspnet                     # usage: yo aspnet
  npm install -g generator-aspnetcore                 # usage: yo aspnetcore
  npm install -g generator-backbone                   # usage: yo backbone
  npm install -g generator-electron                   # usage: yo ember
  npm install -g generator-ember                      # usage: yo ember
  npm install -g generator-jquery-boilerplate         # usage: yo jquery-boilerplate
  npm install -g generator-modern-web-dev             # usage: yo modern-web-dev
  npm install -g generator-mobile-boilerplate         # usage: yo mobile-boilerplate
  npm install -g generator-micro-service              # usage: yo micro-service
  npm install -g generator-docker                     # usage: yo docker
}

platform_system_install(){
  platform_install_packages
  echo ""
  echo ""
  echo "installed system dependencies."
}

platform_composer_install(){
  echo "installing composer ..."
  $APP_PATH/$APP_CMD download composer
  sudo mv $CUR_PATH/composer /usr/bin
  echo ""
  echo ""
  echo "composer installed."
}

platform_init_configuration()
{
  if [ -e "/home/$SYS_USER" ]
  then

    if [ ! -e "/home/$SYS_USER/.bash_aliases" ]
    then
      touch /home/$SYS_USER/.bash_aliases
    fi
    echo "alias pl='$APP_PATH/$APP_CMD'" > /home/$SYS_USER/.bash_aliases
    echo "alias platform='$APP_PATH/$APP_CMD'" > /home/$SYS_USER/.bash_aliases

    source /home/$SYS_USER/.bash_aliases
  fi
  echo ""
  echo ""
  echo "configuring hosts and vhosts files..."
  if [ ! -e "/etc/hosts" ]
  then
    sudo touch /etc/hosts
  fi

  if [ -e "/etc/hosts" ]
  then
    if [ "$HOSTTEST" = "$APP_UID" ]
    then
      echo ""
      echo ""
      echo "host entry already exists..."
    fi

    if [ "$HOSTTEST" != "$APP_UID" ]
    then
      sudo sed -i '$ a\127.0.0.2 platform' /etc/hosts
    fi
  fi

  if [ -e "/etc/apache2/sites-enabled/$APP_UID" ]
  then
    echo ""
    echo ""
    echo "vhost file already exists..."
  fi

  if [ ! -e "/etc/apache2/sites-enabled/$APP_UID" ]
  then
    sudo touch /etc/apache2/sites-enabled/$APP_UID
    sudo chmod 0777 /etc/apache2/sites-enabled/$APP_UID
    platform_print_vhost > /etc/apache2/sites-enabled/$APP_UID
  fi
  echo ""
  echo ""
  echo "hosts and vhosts files configured."
  platform_fix_permissions
  echo ""
  echo ""
  echo "updating filesystem permissions."
  echo ""
  echo ""
  echo "creating symbolic links..."
  sudo ln -s $APP_PATH/                             /platform > /dev/null 2>&1
  sudo ln -s $APP_PATH/mirrors/                     /mirrors > /dev/null 2>&1
  sudo ln -s $APP_PATH/networks/                    /networks > /dev/null 2>&1
  sudo ln -s $APP_PATH/sandbox/                     /sandbox > /dev/null 2>&1
  sudo ln -s $APP_PATH/servers/                     /servers > /dev/null 2>&1
  sudo ln -s $APP_PATH/sites/                       /sites > /dev/null 2>&1
  sudo ln -s $APP_PATH/sandbox/workspace/tests/     /tests > /dev/null 2>&1

  # preventing looping symbolic linking
  sudo rm -f $APP_PATH/mirrors/mirrors
  sudo rm -f $APP_PATH/networks/networks
  sudo rm -f $APP_PATH/sandbox/sandbox
  sudo rm -f $APP_PATH/servers/servers
  sudo rm -f $APP_PATH/sites/sites
  sudo rm -f $APP_PATH/tests/tests

  platform_reload_apache2

  # creating a desktop icon
  platform_desktop_icons
}

platform_desktop_icons()
{
  if [ -d "/home/$SYS_USER/Desktop" ]
  then
    # create platform cli desktop icon
    sudo touch /home/$SYS_USER/Desktop/platform.desktop
    sudo chmod 0777 /home/$SYS_USER/Desktop/platform.desktop
    platform_print_platform_desktop_icon > /home/$SYS_USER/Desktop/platform.desktop
    sudo cp /home/$SYS_USER/Desktop/platform.desktop /usr/share/applications/

    # create platform browser desktop icon
    sudo touch /home/$SYS_USER/Desktop/platform-browser.desktop
    sudo chmod 0777 /home/$SYS_USER/Desktop/platform-browser.desktop
    platform_print_browser_desktop_icon > /home/$SYS_USER/Desktop/platform-browser.desktop
    sudo cp /home/$SYS_USER/Desktop/platform-browser.desktop /usr/share/applications/

    # create platform launcher desktop icon
    sudo touch /home/$SYS_USER/Desktop/platform-launcher.desktop
    sudo chmod 0777 /home/$SYS_USER/Desktop/platform-launcher.desktop
    platform_print_launcher_desktop_icon > /home/$SYS_USER/Desktop/platform-launcher.desktop
    sudo cp /home/$SYS_USER/Desktop/platform-launcher.desktop /usr/share/applications/
  fi
}

platform_print_platform_desktop_icon()
{
echo "#!/usr/bin/env xdg-open
[Desktop Entry]
Version=1.0
Terminal=false
Type=Application
Name=Platform
Comment=Platform CLI is a command-line interface to the Platform Browser
Exec=/usr/bin/gnome-terminal --title=Platform --geometry=100x25+200+150
Icon=$APP_PATH/sites/icons/platform-cli-128x128.png
StartupWMClass=platform
"
}

platform_print_browser_desktop_icon()
{
echo "#!/usr/bin/env xdg-open
[Desktop Entry]
Version=1.0
Terminal=false
Type=Application
Name=Platform Browser
Comment=Web Browser
Exec=/usr/bin/chromium-browser --incognito --app=http://platform/
Icon=$APP_PATH/sites/icons/platform-browser-128x128.png
StartupWMClass=platform"
}

platform_print_launcher_desktop_icon()
{
echo "#!/usr/bin/env xdg-open
[Desktop Entry]
Version=1.0
Terminal=false
Type=Application
Name=Platform Launcher
Comment=Platform Launcher
Exec=$APP_PATH/sandbox/system/scripts/launcher.sh
Icon=$APP_PATH/sites/icons/platform-launcher-512x512.png
StartupWMClass=launcher"
}

platform_print_vhost()
{
echo "<VirtualHost *:80>
ServerAdmin webmaster@localhost
ServerName $APP_UID
#ServerAlias $APP_UID.your-domain.com
DocumentRoot $APP_PATH
php_value auto_prepend_file /var/www/platform/sandbox/system/init.php
<Directory $APP_PATH/>
  Options Indexes FollowSymLinks MultiViews
  AllowOverride None
  Order allow,deny
  allow from all
</Directory>

ErrorLog ${APP_LOGS}/platform-error.log

# Possible values include: debug, info, notice, warn, error, crit,
# alert, emerg.
LogLevel warn

CustomLog ${APP_LOGS}/platform-access.log combined
</VirtualHost>"
}

case $PARAM in
  install|--install)
  echo "installing platform..."
  echo ""
  platform_system_install
  platform_clone
  platform_composer_install
  platform_init_configuration
  echo ""
  echo ""
  echo "installation completed."
  ;;

  install-dependencies|--install-dependencies|install-dep|--install-dep)
  echo "installing platform application $2 ..."
  echo ""
  if [ "$2" = "laravel" ]
  then
    /usr/bin/wget --continue "http://$2.com/$2.phar"
    /usr/bin/composer create-project "$2/$2 $3" --prefer-dist
  elif [ "$2" = "butterfly" ]
  then
    sudo /usr/bin/pip install butterfly
  else
    /usr/bin/composer install "$2"
  fi
  echo ""
  echo ""
  echo "$2 installed."
  ;;

  list-dependencies|--list-dependencies)
  echo "listing dependencies ..."
  echo ""
  echo "   application dependencies"
  echo ""
  platform_list_application_dependencies
  echo ""
  echo "   default dependencies"
  echo ""
  platform_list_default_dependencies
  echo ""
  echo "   os dependencies"
  echo ""
  platform_list_os_dependencies
  echo ""
  echo "   package dependencies"
  echo ""
  platform_list_package_dependencies
  echo ""
  echo "   platform dependencies"
  echo ""
  platform_list_platform_dependencies
  echo ""
  echo "   system dependencies"
  echo ""
  platform_list_system_dependencies
  echo ""
  echo ""
  echo "dependencies listed."
  ;;

  list-application-dependencies|--list-application-dependencies)
  echo "listing application dependencies ..."
  echo ""
  platform_list_application_dependencies
  echo ""
  echo ""
  echo "dependencies listed."
  ;;

  list-default-dependencies|--list-default-dependencies)
  echo "listing default dependencies ..."
  echo ""
  platform_list_default_dependencies
  echo ""
  echo ""
  echo "dependencies listed."
  ;;

  list-os-dependencies|--list-os-dependencies)
  echo "listing os dependencies ..."
  echo ""
  platform_list_os_dependencies
  echo ""
  echo ""
  echo "dependencies listed."
  ;;

  list-package-dependencies|--list-package-dependencies)
  echo "listing package dependencies ..."
  echo ""
  platform_list_package_dependencies
  echo ""
  echo ""
  echo "dependencies listed."
  ;;

  list-platform-dependencies|--list-platform-dependencies)
  echo "listing platform dependencies ..."
  echo ""
  platform_list_platform_dependencies
  echo ""
  echo ""
  echo "dependencies listed."
  ;;

  list-system-dependencies|--list-system-dependencies)
  echo "listing system dependencies ..."
  echo ""
  platform_list_system_dependencies
  echo ""
  echo ""
  echo "dependencies listed."
  ;;

  update|--update)
  echo "updating platform..."
  echo ""
  echo "updating system packages..."
  echo ""
  platform_system_install > /dev/null 2>&1
  echo "updating system dependencies..."
  echo ""
  platform_composer_install > /dev/null 2>&1
  echo "updating system core..."
  echo ""
  platform_core_update > /dev/null 2>&1
  echo ""
  echo ""
  echo "platform update completed."
  ;;

  download|--download)
  echo "downloading $2..."
  echo ""
  if [ "$2" = "" ]
  then
    /usr/bin/wget --continue --user-agent="$APP_UA" $APP_SNAPSHOT_URI
  fi

  if [ "$2" != "" ]
  then
    if [ "$2" = "composer" ]
    then
      /usr/bin/php -r "readfile('$APP_COMPOSER_URI');" | /usr/bin/php -- --install-dir="$CUR_PATH" --filename=composer > /dev/null 2>&1
    else
      /usr/bin/wget --continue --user-agent="$APP_UA" "$2"
    fi
  fi
  echo ""
  echo ""
  echo "downloading completed."
  ;;

  uninstall|--uninstall)
  echo "uninstalling platform..."
  echo ""
  platform_uninstall

  ;;

  purge|--purge)
  echo "purging platform..."
  echo ""
  echo "This command will purge your platform install"
  echo ""

  read -r -p "Are you sure? [y/N] " response
  if [[ $response =~ ^([yY][eE][sS]|[yY])$ ]]
  then
    platform_destroy
    echo ""
    echo ""
    echo "purging completed."
  fi

  ;;

  remove|--remove)
  echo "removing platform..."
  echo ""
  echo "This command will remove your platform install"
  echo ""

  read -r -p "Are you sure? [y/N] " response
  if [[ $response =~ ^([yY][eE][sS]|[yY])$ ]]
  then
    platform_destroy
    echo ""
    echo ""
    echo "platform removed."
  fi

  ;;

  snapshot|--snapshot)
  echo "creating platform snapshot..."
  echo ""
  # TODO:
  #
  # - creating platform snapshots
  echo ""
  echo ""
  echo "snapshot created."
  ;;

  image|--image)
  echo "creating platform image..."
  echo ""
  # TODO:
  #
  # - creating platform images
  echo ""
  echo ""
  echo "image created."
  ;;

  extract|--extract)
  echo "extracting platform virtual archive..."
  echo ""
  tar -jxf $2 > /dev/null 2>&1
  echo ""
  echo ""
  echo "extracting completed."
  ;;

  compress|--compress)
  echo "compressing platform virtual archive..."
  echo ""
  tar -jcf $2 $3 > /dev/null 2>&1
  echo ""
  echo ""
  echo "compressing completed."
  ;;

  generate|--generate)
  echo "generating platform..."
  echo ""
  if [ "$2" != "" ]
  then
    case "$2" in
      # generate a php file
      php)
        if [ "$3" != "" ]
        then
          echo $0 $1 $2 $3
        else
          echo $0 $1 $2
        fi
      ;;
      # generate a tests file
      tests)
        if [ "$3" != "" ]
        then
          echo $0 $1 $2 $3
        else
          echo $0 $1 $2
        fi
      ;;
    esac
  fi
  echo ""
  echo ""
  echo "generating completed."
  ;;

  clone|--clone)
  echo "cloning platform..."
  echo ""
  platform_clone
  echo ""
  echo ""
  echo "cloning completed."
  ;;

  restore|--restore)
  echo "restoring platform..."
  echo ""
  # TODO:
  #
  # - create a  platform restoring tool
  if [ "$2" = "" ]
  then
    cd $APP_PATH && $0 download
  fi

  if [ "$2" != "" ]
  then
    cd $APP_PATH && $0 download $2
  fi
  echo ""
  echo ""
  echo "restoring completed."
  ;;

  sync|--sync)
  echo "syncing platform..."
  echo ""
  platform_sync
  echo ""
  echo ""
  echo "syncing done."
  ;;

  reload|--reload)
  echo "reloading platform cli..."
  echo ""
  platform_reload_cli
  platform_reload_apache2
  platform_fix_permissions
  echo ""
  echo ""
  echo "reloading done."
  ;;

  clean|--clean)
  echo "cleaning up platform..."
  echo ""
  # TODO:
  #
  # - create a platform clean up tool
  echo ""
  echo ""
  echo "platform cleaned."
  ;;

  find|--find)
  echo "finding '$2' in '$CUR_PATH'..."
  echo ""
  grep -Rn "$2" $CUR_PATH | uniq
  echo ""
  echo ""
  echo "done."
  ;;

  clean-repository|--clean-repository)
  echo "cleaning repository '$2'..."
  echo ""
  rm -f $2/*
  echo ""
  echo ""
  echo "done."
  ;;

  clean-system-repository|--clean-system-repository)
  echo "cleaning system repository..."
  echo ""
  sudo apt-get autoclean
  echo ""
  echo ""
  echo "done."
  ;;

  backup-repository|--backup-repository)
  echo "backuping repository '$2' to '$3'..."
  echo ""
  cp -ar $2 $3
  echo ""
  echo ""
  echo "done."
  ;;

  backup-system-repository|--backup-system-repository)
  echo "backuping system repository to '$2'..."
  echo ""
  cp -ar $OS_REPOSITORY_PATH/*.deb $2
  echo ""
  echo ""
  echo "done."
  ;;

  create-project|--create-project)
  echo "creating project $2..."
  echo ""
  echo "$2"
  sudo -k
  fix_permissions(){
    sudo chown -R :www-data . && sudo chmod 0755 .
  }
  if [ ! -d "$PLATFORM_PROJECTS_PATH" ]
  then
    mkdir -p $PLATFORM_PROJECTS_PATH
  fi

  if [ ! -d "$2" ]
  then
    echo ""
    echo "creating project $2..."
    mkdir -p $PLATFORM_PROJECTS_PATH/$2
    touch $PLATFORM_PROJECTS_PATH/$2/index.php && platform_generate_projects_index > $PLATFORM_PROJECTS_PATH/$2/index.php
    touch $PLATFORM_PROJECTS_PATH/$2/COPYRIGHT.md && echo "#COPYRIGHT" > $PLATFORM_PROJECTS_PATH/$2/COPYRIGHT.md
    touch $PLATFORM_PROJECTS_PATH/$2/LICENSE.md && echo "#LICENSE" > $PLATFORM_PROJECTS_PATH/$2/LICENSE.md
    touch $PLATFORM_PROJECTS_PATH/$2/README.md && echo "#README" > $PLATFORM_PROJECTS_PATH/$2/README.md
    touch $PLATFORM_PROJECTS_PATH/$2/TODO.md && echo "#TODO" > $PLATFORM_PROJECTS_PATH/$2/TODO.md
    cd $PLATFORM_PROJECTS_PATH/$2 && fix_permissions
    echo ""
    echo "creating project in '$PLATFORM_PROJECTS_PATH/$2'..."
    echo ""
    echo ""
    echo "project $2 created."
  else
    echo ""
    echo "project $2 already exists"
    exit
  fi
  echo ""
  echo "quick note"
  echo "----------"
  echo "start by adding content to '$PLATFORM_PROJECTS_PATH/$2/README.md'..."
  echo ""
  echo "do you have things to do? if 'yes', then start by editing your TODO list"
  echo ""
  echo "see $PLATFORM_PROJECTS_PATH/$2/TODO.md"
  echo ""
  echo ""
  echo "Enjoy!"
  ;;

  create-cpp-project|--create-cpp-project)
  echo "creating cpp project $2..."
  echo ""
  echo "$2"
  sudo -k
  fix_permissions(){
    sudo chown -R :www-data . && sudo chmod 0755 .
  }
  if [ ! -d "$PLATFORM_PROJECTS_PATH" ]
  then
    mkdir -p $PLATFORM_PROJECTS_PATH
  fi

  if [ ! -d "$2" ]
  then
    echo ""
    echo "creating cpp project $2..."
    mkdir -p $PLATFORM_PROJECTS_PATH/$2
    mkdir -p $PLATFORM_PROJECTS_PATH/$2/bin
    mkdir -p $PLATFORM_PROJECTS_PATH/$2/include
    mkdir -p $PLATFORM_PROJECTS_PATH/$2/obj
    mkdir -p $PLATFORM_PROJECTS_PATH/$2/src

    touch $PLATFORM_PROJECTS_PATH/$2/include/platform.h && platform_generate_cpp_header > $PLATFORM_PROJECTS_PATH/$2/include/platform.h
    touch $PLATFORM_PROJECTS_PATH/$2/src/platform.cpp && platform_generate_cpp > $PLATFORM_PROJECTS_PATH/$2/src/platform.cpp
    touch $PLATFORM_PROJECTS_PATH/$2/src/main.cpp && platform_generate_main_cpp > $PLATFORM_PROJECTS_PATH/$2/src/main.cpp
    touch $PLATFORM_PROJECTS_PATH/$2/$2.cbp && platform_generate_cbp > $PLATFORM_PROJECTS_PATH/$2/$2.cbp

    touch $PLATFORM_PROJECTS_PATH/$2/COPYRIGHT.md && echo "#COPYRIGHT" > $PLATFORM_PROJECTS_PATH/$2/COPYRIGHT.md
    touch $PLATFORM_PROJECTS_PATH/$2/LICENSE.md && echo "#LICENSE" > $PLATFORM_PROJECTS_PATH/$2/LICENSE.md
    touch $PLATFORM_PROJECTS_PATH/$2/README.md && echo "#README" > $PLATFORM_PROJECTS_PATH/$2/README.md
    touch $PLATFORM_PROJECTS_PATH/$2/TODO.md && echo "#TODO" > $PLATFORM_PROJECTS_PATH/$2/TODO.md
    cd $PLATFORM_PROJECTS_PATH/$2 && fix_permissions
    echo ""
    echo "creating cpp project in '$PLATFORM_PROJECTS_PATH/$2'..."
    echo ""
    echo ""
    echo "cpp project $2 created."
  else
    echo ""
    echo "cpp project $2 already exists"
    exit
  fi
  echo ""
  echo "quick note"
  echo "----------"
  echo "start by adding content to '$PLATFORM_PROJECTS_PATH/$2/README.md'..."
  echo ""
  echo "do you have things to do? if 'yes', then start by editing your TODO list"
  echo ""
  echo "see $PLATFORM_PROJECTS_PATH/$2/TODO.md"
  echo ""
  echo ""
  echo "Enjoy!"
  ;;

  create-test|--create-test)
  echo "creating test $2..."
  echo ""
  sudo -k
  fix_permissions(){
    sudo chown -R :www-data . && sudo chmod -R 0755 .
  }
  if [ ! -d "$PLATFORM_TESTS_PATH" ]
  then
    mkdir -p $PLATFORM_TESTS_PATH
  fi

  if [ ! -d "$2" ]
  then
    mkdir -p $PLATFORM_TESTS_PATH/$2
    cp -ar $PLATFORM_TESTS_PATH/assets $PLATFORM_TESTS_PATH/$2
    touch $PLATFORM_TESTS_PATH/$2/index.php && platform_generate_tests_index > $PLATFORM_TESTS_PATH/$2/index.php
    touch $PLATFORM_TESTS_PATH/$2/COPYRIGHT.md && echo "#COPYRIGHT" > $PLATFORM_TESTS_PATH/$2/COPYRIGHT.md
    touch $PLATFORM_TESTS_PATH/$2/LICENSE.md && echo "#LICENSE" > $PLATFORM_TESTS_PATH/$2/LICENSE.md
    touch $PLATFORM_TESTS_PATH/$2/README.md && echo "#README" > $PLATFORM_TESTS_PATH/$2/README.md
    touch $PLATFORM_TESTS_PATH/$2/TODO.md && echo "#TODO" > $PLATFORM_TESTS_PATH/$2/TODO.md
    cd $PLATFORM_TESTS_PATH/$2 && fix_permissions
    echo ""
    echo "creating test in '$PLATFORM_TESTS_PATH/$2'..."
    echo ""
    echo ""
    echo "test created."
  else
    echo ""
    echo "test $2 already exists"
    exit
  fi
  echo ""
  echo "quick note"
  echo "----------"
  echo "start by adding content to '$PLATFORM_TESTS_PATH/$2/README.md'..."
  echo ""
  echo "do you have things to do? if 'yes', then start by editing your TODO.md"
  echo ""
  echo "see $PLATFORM_TESTS_PATH/$2/TODO.md"
  echo ""
  echo ""
  echo "Enjoy!"
  ;;

  run|--run|execute|--execute)
  echo "runnng command $2"
  echo ""

  /bin/sh $2
  echo ""
  echo "$2 command executed."
  ;;

  scripts|--scripts)
  /bin/sh $PLATFORM_SYSTEM_PATH/scripts/$2
  echo ""
  echo "script $2 executed."
  ;;

  check-status|--check-status)
  platform_check_status
  ;;

  machine-up|--machine-up)
  echo "checking if machine is online..."
  echo ""
  echo -n "IP Address or Machine Name: "; read IP; ping -c 1 -q $IP >/dev/null 2>&1 && echo -e "\e[00;32mOnline\e[00m" || echo -e "\e[00;31mOffline\e[00m"
  echo ""
  echo ""
  echo "test completed."
  ;;

  server-up|--server-up)
  echo "starting test server instance..."
  echo ""
  sudo -k
  sudo php -S platform:80 -t $PLATFORM_HOME
  echo ""
  echo ""
  echo "test completed."
  ;;

  desktop-icon|--desktop-icon)
  echo "creating desktop icon..."
  echo ""
  platform_desktop_icons
  echo ""
  echo ""
  echo "desktop icon created."
  ;;

  debug|--debug)
  echo "debugging '$CUR_PATH' directory..."
  echo ""
  for i in $(find . -type f | grep -E "(.php$|.inc$)" | awk '{print $1}'); do php -l $i ; done | grep -i "/No syntax errors detected in/" #> ${APP_LOGS}/platform-debug.log
  echo ""
  echo ""
  echo "debugging done."
  ;;

  version|--version)
    platform_version
  ;;

  info|--info|status|--status)
    platform_status
  ;;

  help|--help)
    platform_help
  ;;

  usage|--usage|*)
    platform_usage
  ;;

esac
