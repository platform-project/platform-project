#!/bin/bash
PROJECT_PATH="/var/www/platform/sandbox/workspace/projects"
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
    if [ ! -d "$PROJECT_PATH" ]
    then
      mkdir -p $PROJECT_PATH
    fi

    if [ ! -d "$PROJECT_PATH/$1" ]
    then
      echo ""
      echo "Creating project $1..."
      mkdir -p $PROJECT_PATH/$1 
      touch $PROJECT_PATH/$1/README.md && echo "#README" > $PROJECT_PATH/$1/README.md 
      touch $PROJECT_PATH/$1/TODO.md && echo "#TODO" > $PROJECT_PATH/$1/TODO.md 
      cd $PROJECT_PATH/$1 && fix_permissions
      echo ""
      echo "Creating project in '$PROJECT_PATH/$1'..."
      echo ""
      echo ""
      echo "Project created."
      echo ""
      echo ""
      echo "Quick note"
      echo "----------"
      echo "Start by adding content to '$PROJECT_PATH/$1/README.md'..."
      echo ""
      echo "Do you have things to do? If 'yes', then start by editing your TODO list"
      echo ""
      echo "See $PROJECT_PATH/$1/TODO.md"
      echo ""
      echo ""
      echo "Enjoy!"
    else 
      echo ""
      echo "Project '$1' already exists"
    fi
fi