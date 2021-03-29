#!/bin/bash
IP="$1"
/usr/bin/mysqladmin status; /usr/bin/mysqladmin proc -h$IP -uroot | grep Query | sort -n  