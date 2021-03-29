#!/bin/bash
LANG_EN="af"                                  # default language abbreviation: Afrikaans
LANG_EN="en"                                  # default language abbreviation: English
LANG_ES="es"                                  # default language abbreviation: Spanish
LANG_FR="fr"                                  # default language abbreviation: French
LANG_ENGLISH="english"                        # default language  
LANG_SPANISH="spanish"                        # default translation
LANG_FRENCH="french"                          # ...
LOCALE="en_ZA"                                # default locale: English, South Africa
POT_CREATION_DATE=`date +%Y-%m-%d_%Hh%Mm%Ss`  # default datetime: 2018-01-31 12:07+0000
PO_REVISION_DATE=`date +%Y-%m-%d_%Hh%Mm%Ss`   # default datetime: 2018-01-31 12:07+0000


get_locale()
{
    echo "Getting locale" > /dev/null
    #LOCALE=`locale | grep LANG= | awk '{print $0}'`
}

generate_po()
{
    echo "msgid \"\"
msgstr \"\"
\"Project-Id-Version: Platform Demo\\n\"
\"Report-Msgid-Bugs-To: \\n\"
\"POT-Creation-Date: 2018-01-31 12:07+0000\\n\"
\"PO-Revision-Date: 2018-01-31 12:07+0000\\n\"
\"Last-Translator: \\n\"
\"Language-Team: Spanish\\n\"
\"Language: es-ES\\n\"
\"Plural-Forms: nplurals=2; plural=n!=1;\\n\"
\"MIME-Version: 1.0\\n\"
\"Content-Type: text/plain; charset=UTF-8\\n\"
\"Content-Transfer-Encoding: 8bit\\n\"
\"X-Loco-Source-Locale: en_ZA\\n\"
\"X-Generator: Platform https://platform.entilda.com/\"

msgid \"Hello World\"
msgstr \"Hola Mundo\"

# Example comment
#. Example pluralized message
msgid \"An example\"
msgid_plural \"%s examples\"
msgstr[0] \"Un ejemplo\"
msgstr[1] \"%s ejemplos\"
" > ${LANG_SPANISH}.po
}

get_locale
generate_po