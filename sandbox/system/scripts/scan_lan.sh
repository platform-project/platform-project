#!/bin/bash
#lan_addr= "172.16.1"
for ip in $(seq 1 254); do ping -c 1  172.16.1.$ip > /dev/null; [ $? -eq 0 ] && echo "172.16.1.$ip UP" || : ; done