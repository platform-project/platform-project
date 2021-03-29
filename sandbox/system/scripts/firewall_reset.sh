#!/bin/sh

YOUR_IP_ADDRESS = "0.0.0.0"

# resetting Firewall rules
/sbin/iptables -F
/sbin/iptables -X
/sbin/iptables -t nat -F
/sbin/iptables -t nat -X
/sbin/iptables -t mangle -F
/sbin/iptables -t mangle -X
/sbin/iptables -P INPUT ACCEPT
/sbin/iptables -P FORWARD ACCEPT
/sbin/iptables -P OUTPUT ACCEPT
/sbin/iptables -D INPUT -s $YOUR_IP_ADDRESS -j DROP
/usr/bin/service iptables save
