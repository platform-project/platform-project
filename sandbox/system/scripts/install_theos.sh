#!/bin/bash
export THEOS=/opt/theos

# clone theos.git
cd /opt
git clone git://github.com/DHowett/theos.git

# clone iphoneheaders.git
cd $THEOS
mv include include.bak
git clone git://github.com/rpetrich/iphoneheaders.git include
for FILE in include.bak/*.h; do mv $FILE include/; done
rmdir include.bak/

# get IOSurfaceAPI.h
cd $THEOS/include/IOSurface/
curl -O https://raw.github.com/javacom/toolchain4/master/Projects/IOSurfaceAPI.h

# clone CaptainHook.git
cd $THEOS/include/
git clone git://github.com/rpetrich/CaptainHook.git

# clone theos-nic-templates.git
cd $THEOS/templates/
git clone git://github.com/orikad/theos-nic-templates.git

# get dpkg-deb for Mac OS X
cd $THEOS
curl -O http://test.saurik.com/francis/dpkg-deb-fat
chmod a+x dpkg-deb-fat
sudo mkdir -p /usr/local/bin
sudo mv dpkg-deb-fat /usr/local/bin/dpkg-deb

# get ldid for Mac OS X
cd $THEOS/bin
curl -O http://dl.dropbox.com/u/3157793/ldid
chmod a+x ldid

# get libsubstrate.dylib
msdeb="mobilesubstrate_0.9.3366-1_iphoneos-arm.deb"
cd $THEOS
curl -OL http://apt.saurik.com/debs/$msdeb
dpkg-deb -x $msdeb mobilesubstrate
cp mobilesubstrate/Library/Frameworks/CydiaSubstrate.framework/CydiaSubstrate  $THEOS/lib/libsubstrate.dylib
rm $msdeb 

#get libactivator.dylib
echo "Downloading Activator header and library..."
ACTIVATOR_REPO="http://apt.thebigboss.org/repofiles/cydia"
curl -s -L "${ACTIVATOR_REPO}/dists/stable/main/binary-iphoneos-arm/Packages.bz2" > Packages.bz2
pkg_path=$(bzcat Packages.bz2 | grep "debs2.0/libactivator" | awk '{print $2}')
pkg=$(basename $pkg_path)
curl -s -L "${ACTIVATOR_REPO}/${pkg_path}" > $pkg
ar -p $pkg data.tar.gz | tar -zxf - ./usr/include/libactivator/libactivator.h ./usr/lib/libactivator.dylib
mv ./usr/include/libactivator $THEOS/include
mv ./usr/lib/libactivator.dylib $THEOS/lib
rm -rf usr Packages.bz2 $pkg

echo "Done."