#!/bin/bash
#
#
# MMMMMMMMMMMMMMMMMMMMMMMMMmds+.
# MMm----::-://////////////oymNMd+`
# MMd      /++                -sNMd:
# MMNso/`  dMM    `.::-. .-::.` .hMN:
# ddddMMh  dMM   :hNMNMNhNMNMNh: `NMm
#     NMm  dMM  .NMN/-+MMM+-/NMN` dMM
#     NMm  dMM  -MMm  `MMM   dMM. dMM
#     NMm  dMM  -MMm  `MMM   dMM. dMM
#     NMm  dMM  .mmd  `mmm   yMM. dMM
#     NMm  dMM`  ..`   ...   ydm. dMM
#     hMM- +MMd/-------...-:sdds  dMM
#     -NMm- :hNMNNNmdddddddddy/`  dMM
#      -dMNs-``-::::-------.``    dMM
#       `/dMNmy+/:-------------:/yMMM
#          ./ydNMMMMMMMMMMMMMMMMMMMMM
#             \.MMMMMMMMMMMMMMMMMMM
#
#
#
##################################################################################################################
# Written to be used on 64 bits computers
# Author 	: 	Erik Dubois
# Website 	: 	http://www.erikdubois.be
##################################################################################################################
#
# More from Erik Dubois
#
# Aurora Conky
# at http://sourceforge.net/projects/auroraconkytheme/
# Explanation on the use of this theme can be found at
# http://erikdubois.be/category/linux/aurora-conky/
#
# Aureola Conky
# Collections of nice conky's with lua syntax
# https://github.com/erikdubois/Aureola
#
# Sardi icons
# Many different styles of icons from colourfull, monochrome, white, circle
# https://sourceforge.net/projects/sardi/
#
# Super Ultra Flat Numix Remix
# Colourfull and playfull icons
# https://github.com/erikdubois/Super-Ultra-Flat-Numix-Remix
#
# Check out the github - many more scripts for automatic installation of Linux Systems.
#
#
##################################################################################################################
#
#   DO NOT JUST RUN THIS. EXAMINE AND JUDGE. AT YOUR OWN RISK.
#
##################################################################################################################

# if there is no hidden folder then make one
[ -d $HOME"/.themes" ] || mkdir -p $HOME"/.themes"

rm -rf /tmp/Ultimate-Linux-Mint-18-Cinnamon
git clone https://github.com/erikdubois/Ultimate-Linux-Mint-18-Cinnamon /tmp/Ultimate-Linux-Mint-18-Cinnamon
#find /tmp/Ultimate-Linux-Mint-18-Cinnamon -maxdepth 1 -type f -exec rm -rf '{}' \;
mkdir ~/.themes/Minty-Transparent-Colora
cp -r /tmp/Ultimate-Linux-Mint-18-Cinnamon/Theming/Cinnamon\ Theming/Minty-Transparent-Colora/Minty-Transparent-Colora/* ~/.themes/Minty-Transparent-Colora
cp -r /tmp/Ultimate-Linux-Mint-18-Cinnamon/Theming/Cinnamon\ Theming/Minty-Transparent-Colora/Variations/* ~/.themes/
rm -rf /tmp/Ultimate-Linux-Mint-18-Cinnamon



echo "################################################################"
echo "###################    T H E   E N D      ######################"
echo "################################################################"
