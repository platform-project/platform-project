#!/bin/bash
# Dev Script: https://github.com/r-plus/dotfiles/install_theos.sh
# Repository: https://github.com/r-plus/dotfiles.git
# Repository: https://github.com/theos/theos.git
# References: http://iphonedevwiki.net/
APP_NAME="$1"
DEVELOPER_NAME="The Platform Authors"
DEVELOPER_EMAIL="platform@entilda.com"
DEVELOPER_LOCATION="UK"
IOS_RELEASE_PATH=/sandbox/workspace/builds/ios/release
XCODE_BUILD_PATH=/sandbox/workspace/projects/xcode/.build

sudo -k
install_dependencies(){
    sudo apt-get install autoconf automake libusb-dev libusb-1.0-0-dev libtool git make openssl \
    usbmuxd ideviceinstaller libimobiledevice-dev libplist-dev libplist++-dev libplist-utils \
    curl openjdk-8-jdk unzip vim-common clang cppcheck cppcheck-gui mktemp \
    nuget mono-xbuild referenceassemblies-pcl lib32stdc++6 lib32z1 libzip4
}

build_app_itms_services_list(){
    touch $XCODE_BUILD_PATH/$APP_NAME.plist
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>
<!DOCTYPE plist PUBLIC \"-//Apple//DTD PLIST 1.0//EN\" \"http://www.apple.com/DTDs/PropertyList-1.0.dtd\">
<plist version=\"1.0\">
<dict>
  <key>items</key>
  <array>
    <dict>
      <key>assets</key>
      <array>
        <dict>
          <key>kind</key>
          <string>software-package</string>
          <key>url</key>
          <string>https://raw.githubusercontent.com/platform-project/platform-project/master/sandbox/workspace/builds/ios/0.0.0/$APP_NAME/source/$APP_NAME.ipa</string>
        </dict>
      </array>
      <key>metadata</key>
      <dict>
        <key>bundle-identifier</key>
        <string>com.entilda.platform-project.$APP_NAME.ios.app</string>
        <key>bundle-version</key>
        <string>0.0.0</string>
        <key>kind</key>
        <string>software</string>
        <key>title</key>
        <string>$APP_NAME</string>
      </dict>
    </dict>
  </array>
</dict>
</plist>" > $XCODE_BUILD_PATH/$APP_NAME.plist
}

build_app_archive(){
    cd $XCODE_BUILD_PATH/$APP_NAME
    zip -0 -y -r "$IOS_RELEASE_PATH/$APP_NAME.ipa" "Payload/"
    zip -0 -y -r "$IOS_RELEASE_PATH/$APP_NAME.ipa" "iTunesArtwork"
    zip -0 -y -r "$IOS_RELEASE_PATH/$APP_NAME.ipa" "iTunesArtwork@2x"
    zip -0 -y -r "$IOS_RELEASE_PATH/$APP_NAME.ipa" "iTunesMetadata.plist"
    zip -0 -y -r "$IOS_RELEASE_PATH/$APP_NAME.ipa" "WatchKitSupport/"
}

build_app_resources(){
    build_app_itms_services_list
    touch $XCODE_BUILD_PATH/$APP_NAME/Payload/$APP_NAME.app/build.xcconfig
    touch $XCODE_BUILD_PATH/$APP_NAME/Payload/$APP_NAME.app/build-debug.xcconfig
    touch $XCODE_BUILD_PATH/$APP_NAME/Payload/$APP_NAME.app/build-release.xcconfig
    touch $XCODE_BUILD_PATH/$APP_NAME/Payload/$APP_NAME.app/config.xml
    touch $XCODE_BUILD_PATH/$APP_NAME/Payload/$APP_NAME.app/embedded.mobileprovision
    touch $XCODE_BUILD_PATH/$APP_NAME/Payload/$APP_NAME.app/Info.plist
    touch $XCODE_BUILD_PATH/$APP_NAME/Payload/$APP_NAME.app/MainViewController.nib
    touch $XCODE_BUILD_PATH/$APP_NAME/Payload/$APP_NAME.app/PkgInfo
    touch $XCODE_BUILD_PATH/$APP_NAME/Payload/$APP_NAME.app/$APP_NAME
    mkdir -p $XCODE_BUILD_PATH/$APP_NAME/Payload/$APP_NAME.app/CDVNotification.bundle
    mkdir -p $XCODE_BUILD_PATH/$APP_NAME/Payload/$APP_NAME.app/_CodeSignature
    mkdir -p $XCODE_BUILD_PATH/$APP_NAME/Payload/$APP_NAME.app/www
    # TODO: Build the file '/path/to/_CodeSignature/CodeResources' and scan and dump contents of `www`. See sample below:
    # 
    # <?xml version="1.0" encoding="UTF-8"?>
    # <!DOCTYPE plist PUBLIC "-//Apple//DTD PLIST 1.0//EN" "http://www.apple.com/DTDs/PropertyList-1.0.dtd">
    # <dict>
    #    <key>files</key>
    #    <dict>
    #        <key>AppIcon29x29.png</key>
    #        <data>
    #        INHTWNMcqTtdwBMAg/rmeG/+2nU=
    #        </data>
    #        <key>AppIcon29x29@2x.png</key>
    #        <data>
    #        qj6MCxEe7kT7U51F2kTT4jgaQg4=
    #        </data>
    #        ...
    #   </dict>
    #</dict>
    #</plist>
}

build_app_icons(){
    touch $XCODE_BUILD_PATH/$APP_NAME/Payload/$APP_NAME.app/AppIcon29x29@2x~ipad.png
    touch $XCODE_BUILD_PATH/$APP_NAME/Payload/$APP_NAME.app/AppIcon50x50~ipad.png
    touch $XCODE_BUILD_PATH/$APP_NAME/Payload/$APP_NAME.app/AppIcon29x29@2x.png
    touch $XCODE_BUILD_PATH/$APP_NAME/Payload/$APP_NAME.app/AppIcon29x29@3x.png
    touch $XCODE_BUILD_PATH/$APP_NAME/Payload/$APP_NAME.app/AppIcon29x29~ipad.png
    touch $XCODE_BUILD_PATH/$APP_NAME/Payload/$APP_NAME.app/AppIcon29x29.png
    touch $XCODE_BUILD_PATH/$APP_NAME/Payload/$APP_NAME.app/AppIcon40x40@2x~ipad.png
    touch $XCODE_BUILD_PATH/$APP_NAME/Payload/$APP_NAME.app/AppIcon40x40@2x.png
    touch $XCODE_BUILD_PATH/$APP_NAME/Payload/$APP_NAME.app/AppIcon40x40@3x.png
    touch $XCODE_BUILD_PATH/$APP_NAME/Payload/$APP_NAME.app/AppIcon40x40~ipad.png                                 
    touch $XCODE_BUILD_PATH/$APP_NAME/Payload/$APP_NAME.app/AppIcon50x50@2x~ipad.png
    touch $XCODE_BUILD_PATH/$APP_NAME/Payload/$APP_NAME.app/AppIcon57x57@2x.png
    touch $XCODE_BUILD_PATH/$APP_NAME/Payload/$APP_NAME.app/AppIcon57x57.png
    touch $XCODE_BUILD_PATH/$APP_NAME/Payload/$APP_NAME.app/AppIcon60x60@2x.png
    touch $XCODE_BUILD_PATH/$APP_NAME/Payload/$APP_NAME.app/AppIcon60x60@3x.png
    touch $XCODE_BUILD_PATH/$APP_NAME/Payload/$APP_NAME.app/AppIcon72x72@2x~ipad.png
    touch $XCODE_BUILD_PATH/$APP_NAME/Payload/$APP_NAME.app/AppIcon72x72~ipad.png
    touch $XCODE_BUILD_PATH/$APP_NAME/Payload/$APP_NAME.app/AppIcon76x76@2x~ipad.png
    touch $XCODE_BUILD_PATH/$APP_NAME/Payload/$APP_NAME.app/AppIcon76x76~ipad.png
    touch $XCODE_BUILD_PATH/$APP_NAME/Payload/$APP_NAME.app/AppIcon83.5x83.5@2x~ipad.png    
    touch $XCODE_BUILD_PATH/$APP_NAME/Payload/$APP_NAME.app/LaunchImage.png
    touch $XCODE_BUILD_PATH/$APP_NAME/Payload/$APP_NAME.app/LaunchImage@2x.png        
    touch $XCODE_BUILD_PATH/$APP_NAME/Payload/$APP_NAME.app/LaunchImage-568h@2x.png                
    touch $XCODE_BUILD_PATH/$APP_NAME/Payload/$APP_NAME.app/LaunchImage-700@2x.png
    touch $XCODE_BUILD_PATH/$APP_NAME/Payload/$APP_NAME.app/LaunchImage-700-568h@2x.png
    touch $XCODE_BUILD_PATH/$APP_NAME/Payload/$APP_NAME.app/LaunchImage-700-Landscape@2x~ipad.png
    touch $XCODE_BUILD_PATH/$APP_NAME/Payload/$APP_NAME.app/LaunchImage-700-Landscape~ipad.png
    touch $XCODE_BUILD_PATH/$APP_NAME/Payload/$APP_NAME.app/LaunchImage-700-Portrait@2x~ipad.png
    touch $XCODE_BUILD_PATH/$APP_NAME/Payload/$APP_NAME.app/LaunchImage-700-Portrait~ipad.png
    touch $XCODE_BUILD_PATH/$APP_NAME/Payload/$APP_NAME.app/LaunchImage-800-667h@2x.png
    touch $XCODE_BUILD_PATH/$APP_NAME/Payload/$APP_NAME.app/LaunchImage-800-Landscape-736h@3x.png
    touch $XCODE_BUILD_PATH/$APP_NAME/Payload/$APP_NAME.app/LaunchImage-800-Portrait-736h@3x.png
    touch $XCODE_BUILD_PATH/$APP_NAME/Payload/$APP_NAME.app/LaunchImage-Portrait~ipad.png
    touch $XCODE_BUILD_PATH/$APP_NAME/Payload/$APP_NAME.app/LaunchImage-Portrait@2x~ipad.png
}

build_app_certificate() {
    cd $XCODE_BUILD_PATH/$APP_NAME/Payload/$APP_NAME.app/_CodeSignature
    /usr/bin/openssl genrsa -out $APP_NAME.key 2048
    echo "Generating certificate signing request '$APP_NAME.csr'..."
    /usr/bin/openssl req -new -key $APP_NAME.key -out $APP_NAME.csr -subj "/emailAddress=$DEVELOPER_EMAIL,CN=$DEVELOPER_NAME,C=$DEVELOPER_LOCATION"
    #/usr/bin/openssl x509 -in $APP_NAME.cer -inform DER -out $APP_NAME.pem -outform PEM
    echo "Generating certificate '$APP_NAME.crt'..."
    /usr/bin/openssl x509 -req -days 365 -in $APP_NAME.csr -signkey $APP_NAME.key -out $APP_NAME.crt
    #/usr/bin/openssl x509 -inform PEM -in $APP_NAME.pem -outform DER -out $APP_NAME.crt
    #/usr/bin/openssl pkcs12 -export -inkey $APP_NAME.key -in $APP_NAME.pem -out $APP_NAME.p12
    # Reference: 
    # - https://askubuntu.com/questions/49196/how-do-i-create-a-self-signed-ssl-certificate
    # - https://help.ubuntu.com/lts/serverguide/certificates-and-security.html
}

build_app(){
    if [ "$APP_NAME" != "" ];
    then
        echo "Building iOS application $APP_NAME..."
        echo ""
        mkdir -p "$XCODE_BUILD_PATH/$APP_NAME/Payload/$APP_NAME.app"
        mkdir -p "$XCODE_BUILD_PATH/$APP_NAME/WatchKitSupport"
        touch "$XCODE_BUILD_PATH/$APP_NAME/Payload/.DS_StoreInfo.plist"
        touch "$XCODE_BUILD_PATH/$APP_NAME/iTunesArtwork"
        touch "$XCODE_BUILD_PATH/$APP_NAME/iTunesArtwork@2x"
        touch "$XCODE_BUILD_PATH/$APP_NAME/iTunesMetadata.plist"
        touch "$XCODE_BUILD_PATH/$APP_NAME/WatchKitSupport/WK"
        build_app_icons
        build_app_resources
        build_app_certificate
        build_app_archive
        echo "Application $APP_NAME built!"
        echo ""
    else 
        echo "Please specify an iOS application name"    
    fi
}

#install_dependencies                   # uncomment to install dependencies
build_app
