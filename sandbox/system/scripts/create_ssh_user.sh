#!/bin/bash

echo 'User name'
read USER

useradd $USER
mkdir /home/"$USER"/.ssh
vim /home/"$USER"/.ssh/authorized_keys
chown -R "$USER":"$USER" /home/$USER/.ssh
chmod 700 /home/$USER/.ssh
chmod 600 /home/"$USER"/.ssh/authorized_keys
echo "$USER" ALL=NOPASSWD: ALL >>/etc/sudoers
