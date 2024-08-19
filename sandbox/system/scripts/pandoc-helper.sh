#!/bin/bash

# A simple Bash script to create HTML in stdout from a markdown file

# This script requires pandoc. On Ubuntu use `sudo apt install pandoc` to install.

# Check to see if the user included a filename. If not, ask them for one.
        if [ -z "$1" ]; then
                read -p "Please provide a filename (include the path if not in this directory): " file
        else file=$1
        fi

# Execute this 'pandoc' command to create HTML from markdown and display in stdout for copying
pandoc -f markdown $file
pandoc -f gfm -o "$file.html" "{$file}.md"   # Convert to Github-styled markdown