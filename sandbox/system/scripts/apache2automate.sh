#!/bin/sh
sudo -k
#apache2automate example.com 10.10.10.10 [admin@localhost]
# Stopping apache2 web service
echo "Stopping apache2 web service..."
service apache2 stop

echo ""
echo "Creating domain hosts entry..."
echo "$2    $1" >> /etc/hosts

echo "Attempting to create www directory..."
mkdir -p /var/www/platform/sites/$1

echo ""
echo "Creating an apache2 virtualhost entry..."

#sudo touch /etc/apache2/sites-enabled/$1
echo "<VirtualHost *:80>"  >> /etc/apache2/sites-enabled/$1
#if [ -neq ""] then;  echo "  ServerAdmin $3" >> /etc/apache2/sites-enabled/$1 fi
echo "  ServerName $1" >> /etc/apache2/sites-enabled/$1
echo "  DocumentRoot /var/www/platform/sites/$1" >> /etc/apache2/sites-enabled/$1
echo "  <Directory /var/www/platform/sites/$1>" >> /etc/apache2/sites-enabled/$1
echo "    Options Indexes FollowSymLinks MultiViews" >> /etc/apache2/sites-enabled/$1
echo "    AllowOverride None" >> /etc/apache2/sites-enabled/$1
echo "    Order allow,deny" >> /etc/apache2/sites-enabled/$1
echo "    allow from all" >> /etc/apache2/sites-enabled/$1
echo "  </Directory>" >> /etc/apache2/sites-enabled/$1
echo "" >> /etc/apache2/sites-enabled/$1
echo "  ErrorLog /var/log/apache2/error.log" >> /etc/apache2/sites-enabled/$1
echo "  LogLevel warn" >> /etc/apache2/sites-enabled/$1
echo "  CustomLog /var/log/apache2/access.log combined" >> /etc/apache2/sites-enabled/$1
echo "</VirtualHost>" >> /etc/apache2/sites-enabled/$1
echo "" >> /etc/apache2/sites-enabled/$1

echo "Entry created"
echo "Starting apache2 web service..."
service apache2 start


echo "Initiating PING requests to local sites instance..."
ping -c 4 $1


