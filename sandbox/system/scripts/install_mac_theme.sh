#!/bin/bash
sudo -k
gsettings set com.canonical.desktop.interface scrollbar-mode normal
sudo add-apt-repository ppa:noobslab/apps
sudo add-apt-repository ppa:noobslab/themes
sudo apt-get update && sudo apt-get install indicator-synapse mac-icons-noobslab mac-ithemes-noobslab \
unity-tweak-tool gnome-tweak-tool
wget -O mac-cursors.zip http://goo.gl/xh52J
sudo unzip mac-cursors.zip -d /usr/share/icons/ && rm mac-cursors.zip
cd /usr/share/icons/mac-cursors
sudo chmod +x install-mac-cursors.sh uninstall-mac-cursors.sh
./install-mac-cursors.sh
sudo sed -i "s/enabled=1/enabled=0/g" '/etc/default/apport'
sudo xhost +SI:localuser:lightdm
sudo su lightdm -s /bin/bash
gsettings set com.canonical.unity-greeter draw-grid false && exit
sudo mv /usr/share/unity-greeter/logo.png /usr/share/unity-greeter/logo.png.backup
