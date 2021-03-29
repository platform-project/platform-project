#!/bin/bash
BASE_PATH="/var/www/platform/sandbox/system/applications/ebooks"
PDF_PATH="$BASE_PATH/documents"         #"$1"
JPG_PATH="$BASE_PATH/assets/thumbnails" #"$2"

sudo -k
process_pdf(){
    cd $PDF_PATH &&
    find * -name '*.pdf' -exec /usr/bin/gs -dSAFER -dBATCH -dNOPAUSE -sDEVICE=jpeg -dTextAlphaBits=4 -dGraphicsAlphaBits=4 -r144 -sPageList=1 -sOutputFile={}.jpg {} \;
}

process_jpg(){
    cd $PDF_PATH &&
    find * -name '*.jpg' -exec cp -var {} $JPG_PATH \;
    find * -name '*.jpg' -exec rm -f {} \;
}

process_pdf
process_jpg