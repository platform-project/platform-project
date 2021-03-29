#!/bin/bash
# Find and Replace script
#
# Command:
#
# find <path> -type f -exec sed -i 's/<expression>/<replace>/g' {} \;
#
# Example:
#  
# find /usr/home/nojitsu/public_html/app/locale/en_US/template/email/ -type f -exec sed -i 's/or call us at (555) 555-0123/or call us at +27 (012) 345 6789/g' {} \;
#

# replacing all instances of  chatmates to chatmates
find /sites/chatmates/ * -type f -exec sed -i 's/chatmate/chatmate/g' {} \;
find /sites/chatmates/ * -type f -exec sed -i 's/Chatmate/Chatmate/g' {} \;
find /sites/chatmates/ * -type f -exec sed -i 's/ChatMate/ChatMate/g' {} \;
find /sites/chatmates/ * -type f -exec sed -i 's/Chat Mate/Chat Mate/g' {} \;
find /sites/chatmates/ * -type f -exec sed -i 's/chat mate/chat mate/g' {} \;

find /sites/chatmates/ * -type f -exec sed -i 's/chatmates/chatmates/g' {} \;
find /sites/chatmates/ * -type f -exec sed -i 's/Chatmates/Chatmates/g' {} \;
find /sites/chatmates/ * -type f -exec sed -i 's/ChatMates/ChatMates/g' {} \;
find /sites/chatmates/ * -type f -exec sed -i 's/Chat Mates/Chat Mates/g' {} \;
find /sites/chatmates/ * -type f -exec sed -i 's/chat mates/chat mates/g' {} \;

# replacing all instances of texts to texts
find /sites/chatmates/ * -type f -exec sed -i 's/text/text/g' {} \;
find /sites/chatmates/ * -type f -exec sed -i 's/Text/Text/g' {} \;
find /sites/chatmates/ * -type f -exec sed -i 's/text/text/g' {} \;
find /sites/chatmates/ * -type f -exec sed -i 's/Text/Text/g' {} \;

find /sites/chatmates/ * -type f -exec sed -i 's/texts/texts/g' {} \;
find /sites/chatmates/ * -type f -exec sed -i 's/Texts/Texts/g' {} \;
find /sites/chatmates/ * -type f -exec sed -i 's/texts/texts/g' {} \;
find /sites/chatmates/ * -type f -exec sed -i 's/Texts/Texts/g' {} \;