#!/bin/sh
# Installation for dotnet core 2.x on Ubuntu
sudo -k
gpg_key_signing_dncore2x(){
  curl https://packages.microsoft.com/keys/microsoft.asc | gpg --dearmor > microsoft.gpg
  sudo mv microsoft.gpg /etc/apt/trusted.gpg.d/microsoft.gpg
}

# Ubuntu 17.04
ubuntu_zesty_dncore2x(){
  sudo sh -c 'echo "deb [arch=amd64] https://packages.microsoft.com/repos/microsoft-ubuntu-zesty-prod zesty main" > /etc/apt/sources.list.d/dotnetdev.list'
  sudo apt-get update
}

# Ubuntu 16.04
ubuntu_xenial_dncore2x(){
  sudo sh -c 'echo "deb [arch=amd64] https://packages.microsoft.com/repos/microsoft-ubuntu-xenial-prod xenial main" > /etc/apt/sources.list.d/dotnetdev.list'
  sudo apt-get update
}

# Ubuntu 14.04
ubuntu_trusty_dncore2x(){
  sudo sh -c 'echo "deb [arch=amd64] https://packages.microsoft.com/repos/microsoft-ubuntu-trusty-prod trusty main" > /etc/apt/sources.list.d/dotnetdev.list'
  sudo apt-get update
}

install_dncore2x(){
  sudo apt-get install dotnet-sdk-2.0.0
}


#Installation for dotnet core 1.x on Ubuntu
# Ubuntu 16.10
ubuntu_yakkety_dncore1x(){
  sudo sh -c 'echo "deb [arch=amd64] https://apt-mo.trafficmanager.net/repos/dotnet-release/ yakkety main" > /etc/apt/sources.list.d/dotnetdev.list'
  sudo apt-key adv --keyserver hkp://keyserver.ubuntu.com:80 --recv-keys B02C46DF417A0893
  sudo apt-get update
}

# Ubuntu 16.04
ubuntu_xenial_dncore1x(){
  sudo sh -c 'echo "deb [arch=amd64] https://apt-mo.trafficmanager.net/repos/dotnet-release/ xenial main" > /etc/apt/sources.list.d/dotnetdev.list'
  sudo apt-key adv --keyserver hkp://keyserver.ubuntu.com:80 --recv-keys B02C46DF417A0893
  sudo apt-get update
}

# Ubuntu 14.04
ubuntu_trusty_dncore1x(){
  sudo sh -c 'echo "deb [arch=amd64] https://apt-mo.trafficmanager.net/repos/dotnet-release/ trusty main" > /etc/apt/sources.list.d/dotnetdev.list'
  sudo apt-key adv --keyserver hkp://keyserver.ubuntu.com:80 --recv-keys B02C46DF417A0893
  sudo apt-get update
}

install_dncore1x(){
  sudo apt-get install dotnet-dev-1.0.4
}

if [ "$1" = "2x" ];
then
  gpg_key_signing_dncore2x
  ubuntu_xenial_dncore2x     # currently using xenial
  install_dncore2x
else
  ubuntu_xenial_dncore1x     # currently using xenial
  install_dncore1x
fi

echo "dotnet "
dotnet --version
