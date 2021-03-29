#!/bin/sh
# Installation for dotnet core 3.x on Ubuntu
# See https://dotnet.microsoft.com/download/linux-package-manager/ubuntu18-04/sdk-current
sudo -k
gpg_key_signing_dncore3x(){
  wget -q https://packages.microsoft.com/config/ubuntu/18.04/packages-microsoft-prod.deb -O packages-microsoft-prod.deb
  sudo dpkg -i packages-microsoft-prod.deb

}

# Ubuntu 18.04
ubuntu_bionic_dncore3x(){
  sudo add-apt-repository universe
  sudo apt-get update
  sudo apt-get install apt-transport-https
  sudo apt-get update
  sudo apt-get install dotnet-sdk-3.0
}

gpg_key_signing_dncore3x
ubuntu_bionic_dncore3x
echo "dotnet "
dotnet --version
