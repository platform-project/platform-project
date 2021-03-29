#!/bin/bash
# uuid [count]
#
# Generate type 4 (random) UUID, or [count] type 4 UUIDs.
function python_uuid()
{
    local count=1
    if [[ ! -z "$1" ]]; then
        if [[ "$1" =~ [^0-9] ]]; then
            echo "Usage: $FUNCNAME [count]" >&2
            return 1
        fi

        count="$1"
    fi

    python -c 'import uuid; print("\n".join([str(uuid.uuid4()).upper() for x in range('"$count"')]))'
}

function system_uuid()
{
    UUID=$(cat /proc/sys/kernel/random/uuid)
    echo ${UUID^^}  # uncomment for uppercase
    #echo ${UUID,,}  # uncomment for lowercase
}

function generate_uuid()
{
    UUID=$(uuidgen)
}

if [ "$1" = "--python" ]
then
    python_uuid 1
else
    system_uuid
fi
