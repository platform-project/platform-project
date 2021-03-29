#!/bin/bash

#[ `whoami` != "root" ] && echo "This script must be run as root" && exit

# Prerequisites
# You must be able to login to the dev server with your ssh key
#
sudo -k

PARAM=$1
BRANCHNAME=`echo $2 | tr -cd "[:alnum:]"`
CODENAME="add_codename_here"
REPOSITORY="https://github.com/project-project/$CODENAME.git"
WWWSERV_PATH="/var/www"
LOCAL_REPO_PATH="/var/www/domain.com"

LOCAL_IP="127.0.0.1"                           
LOCAL_HOST="$BRANCHNAME.domain.com"
LOCAL_HTTP="http://$LOCAL_HOST"
LOCAL_HTTPS="https://$LOCAL_HOST"
LOCAL_PATH="$WWWSERV_PATH/$LOCAL_HOST"
LOCAL_USER=`whoami`

REMOTE_IP="0.0.0.0"                            
REMOTE_HOST="$BRANCHNAME.dev.domain.com"
REMOTE_HTTP="http://$REMOTE_HOST"
REMOTE_HTTPS="https://$REMOTE_HOST"
REMOTE_PATH="$WWWSERV_PATH/$REMOTE_HOST"
REMOTE_USER=`whoami`

# DO NOT EDIT BEYOND THIS LINE
#----------------------------------------------------------------------------------------

check_bin(){
  if [ ! -e "/bin/$CODENAME" ] 
  then
    cd /tmp && git clone $REPOSITORY > /dev/null 2>&1
    sudo cp -var /tmp/$CODENAME/scripts/$CODENAME /usr/local/bin
  fi
}

create_branch(){
  echo ""
  echo "Creating local branch"
  git checkout stable
  git pull && git checkout -b "$BRANCHNAME"
  git branch --track "$BRANCHNAME" origin/"$BRANCHNAME"

  echo ""
  echo "Pushing branch to central respository"
  echo ""
  git push origin "$BRANCHNAME"
  echo ""
}

replace_local_app_config(){
  find $LOCAL_PATH/app/config/ * -type f -exec sed -i "s/domain.com/$BRANCHNAME.domain.com/g" {} \;
  find $LOCAL_PATH/bootstrap/ * -type f -exec sed -i "s/your-machine-name/$BRANCHNAME.domain.com/g" {} \;
}

configure_local_vhost(){
  echo "
<VirtualHost *:80>
  ServerAdmin webmaster@localhost
  ServerName $BRANCHNAME.domain.com
  ServerAlias m.$BRANCHNAME.domain.com
  DocumentRoot $LOCAL_PATH/public
  RewriteMap lowercase int:tolower

  AllowEncodedSlashes On

  <Directory $LOCAL_PATH/public>
    AuthType Basic
    AuthName \"Development Area\"
    AuthUserFile $LOCAL_PATH/pass
    require valid-user
    Options Indexes FollowSymLinks MultiViews
    AllowOverride All
    Order allow,deny
    allow from all
  </Directory>

  ErrorLog ${APACHE_LOG_DIR}/$LOCAL_HOST-error.log

  # Possible values include: debug, info, notice, warn, error, crit,
  # alert, emerg.
  LogLevel warn

  CustomLog ${APACHE_LOG_DIR}/$LOCAL_HOST-access.log combined
</VirtualHost>

<VirtualHost *:443>

  SSLEngine on
  SSLCertificateFile    $LOCAL_PATH/app/config/ssl/certs/ssl-cert-snakeoil.pem
  SSLCertificateKeyFile $LOCAL_PATH/app/config/ssl/private/ssl-cert-snakeoil.key

  ServerAdmin webmaster@localhost
  ServerName $BRANCHNAME.domain.com
  ServerAlias laravel.domain.com
  DocumentRoot $LOCAL_PATH/public

  <Directory $LOCAL_PATH/public>
    AuthType Basic
    AuthName \"Development Area\"
    AuthUserFile $LOCAL_PATH/pass
    require valid-user
    Options Indexes FollowSymLinks MultiViews
    AllowOverride All
    Order allow,deny
    allow from all
  </Directory>

  ErrorLog ${APACHE_LOG_DIR}/$LOCAL_HOST.ssl-error.log

  # Possible values include: debug, info, notice, warn, error, crit,
  # alert, emerg.
  LogLevel warn

  CustomLog ${APACHE_LOG_DIR}/$LOCAL_HOST.ssl-access.log combined
</VirtualHost>
" | sudo tee /etc/apache2/sites-enabled/$BRANCHNAME.vhost.conf > /dev/null 
  
  sudo chmod 0755 /etc/apache2/sites-enabled/$BRANCHNAME.vhost.conf 

  echo "$LOCAL_IP $LOCAL_HOST" | sudo tee --append /etc/hosts > /dev/null 
  replace_local_app_config
  sudo service apache2 restart > /dev/null
  echo ""
}

create_local_project(){
  echo "Creating local project '$LOCAL_HTTPS'..."
  echo ""
  cd $WWWSERV_PATH && sudo mkdir -p $LOCAL_PATH
  sudo chown -R $LOCAL_USER:www-data $LOCAL_PATH 
  #if there is an existing internet connection clone from repository
  cd $LOCAL_PATH && git clone $REPOSITORY $CODENAME
  #else otherwise clone from existing repository 
  #cd $LOCAL_PATH && mkdir -p $LOCAL_PATH/$CODENAME 
  #cd $LOCAL_PATH && cp -ar $LOCAL_REPO_PATH/.git* $LOCAL_PATH/$CODENAME 
  #cd $LOCAL_PATH && cp -ar $LOCAL_REPO_PATH/* $LOCAL_PATH/$CODENAME
  #endif

  cd $LOCAL_PATH && mv $CODENAME/* . && mv $CODENAME/.git* . && rm -rf $CODENAME
  cd $LOCAL_PATH && create_branch && git checkout $BRANCHNAME
  sudo chmod 0755 -R $LOCAL_PATH 
  sudo chmod 0777 -R $LOCAL_PATH/app/storage
  sudo chmod 0777 -R $LOCAL_PATH/public 

  echo "Configuring vhost for '$LOCAL_HTTPS'..."
  echo ""
  configure_local_vhost 
  echo ""
}

delete_local_project(){
  echo "Deleting '$LOCAL_HTTPS'..."
  cd $LOCAL_PATH && git stash && git checkout develop && git branch -D $BRANCHNAME && git push --delete origin $BRANCHNAME
  #sudo rm -rf $LOCAL_PATH
  sudo rm -f /etc/apache2/sites-enabled/$BRANCHNAME.vhost.conf
  sudo service apache2 restart > /dev/null
  echo ""
  echo "Deleted local project '$LOCAL_HTTPS'."
  echo ""
}

create_remote_project(){
  echo "Creating remote project '$REMOTE_HTTPS'..."
  echo ""
  echo "Deploying branch '$BRANCHNAME' remotely..."
  echo ""
  echo "Connecting to remote server..."
  echo ""
  ssh -A -t $REMOTE_IP "cd $WWWSERV_PATH && 
  sudo mkdir -p $REMOTE_PATH && sudo chown -R $REMOTE_USER $REMOTE_PATH && 
  cd $REMOTE_PATH && git clone $REPOSITORY $CODENAME &&
  cd $REMOTE_PATH && mv $CODENAME/* . && mv $CODENAME/.git* . && rm -rf $CODENAME &&
  cd $REMOTE_PATH && git checkout $BRANCHNAME &&
  sudo chmod 0755 -R $REMOTE_PATH &&
  sudo chmod 0777 -R $REMOTE_PATH/app/storage &&
  sudo chmod 0777 -R $REMOTE_PATH/public && 
  find $REMOTE_PATH/app/config/ * -type f -exec sed -i "s/local.domain.com/$BRANCHNAME.dev.domain.com/g" {} \; &&
  find $REMOTE_PATH/bootstrap/ * -type f -exec sed -i "s/your-machine-name/$BRANCHNAME.dev.domain.com/g" {} \; &&
  sudo cat '/etc/httpd/conf.d/dev.vhost.conf' | sed -e 's/dev.domain.com/$BRANCHNAME.dev.domain.com/g' > /tmp/$BRANCHNAME.dev.vhost.conf && 
  sudo cp /tmp/$BRANCHNAME.dev.vhost.conf /etc/httpd/conf.d/$BRANCHNAME.dev.vhost.conf && rm -f /tmp/$BRANCHNAME.dev.vhost.conf &&
  sudo chmod 0755 /etc/httpd/conf.d/$BRANCHNAME.dev.vhost.conf && sudo service httpd restart  > /dev/null
"
}

delete_remote_project(){
  echo "Deleting remote project '$REMOTE_HTTPS'..."
  echo ""
  ssh -A -t $REMOTE_IP "sudo rm -rf $REMOTE_PATH &&
  sudo rm -f /etc/httpd/conf.d/$BRANCHNAME.dev.vhost.conf &&
  sudo service httpd restart > /dev/null"
  echo ""
  echo "Deleted remote project '$REMOTE_HTTPS'."
}

usage(){
  echo "Usage: "
  echo ""
  echo "$0 --create <branchname>" && echo "$0 --delete <branchname>" && exit
}

info(){
  echo ""
  echo "Browse to $LOCAL_HTTPS"
  echo ""
  echo "Your Authentication credentials:"
  echo ""
  echo "username: myusername"
  echo "password: mypassword"
  echo ""
  echo "To test your branch remotely, browse to $REMOTE_HTTPS"
  echo ""
  exit
}


case $PARAM in
  create|--create)

    [ "$BRANCHNAME" == "" ] && echo "Specify a name for the branch" && exit

    create_local_project

    create_remote_project 

    info

  ;;

  delete|--delete)

    [ "$BRANCHNAME" == "" ] && echo "Specify a name for the branch" && exit

    delete_local_project

    delete_remote_project

  ;;

  help|--help|usage|--usage|*)

    usage

  ;;
esac





