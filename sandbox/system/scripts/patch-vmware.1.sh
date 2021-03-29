#!/bin/bash
sudo vmware-modconfig --console --install-all

echo "signing vmmon module"
sudo /usr/src/linux-headers-5.0.0-23-generic/scripts/sign-file sha256 ./MOK.priv 
./MOK.der $(modinfo -n vmmon)

echo "signing vmnet module"
sudo /usr/src/linux-headers-5.0.0-23-generic/scripts/sign-file sha256 ./MOK.priv 
./MOK.der $(modinfo -n vmnet)

echo "importing MOK cert"
mokutil --import MOK.der
