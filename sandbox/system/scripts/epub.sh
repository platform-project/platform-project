#!/bin/bash
EPUB_PATH="$1"
cd $EPUB_PATH && zip -rX "../$(basename "$(realpath .)").epub" mimetype $(ls|xargs echo|sed 's/mimetype//g')