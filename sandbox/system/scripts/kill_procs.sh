#!/bin/sh

# Stop all KVM modules and plugin processes
/etc/init.d/kvm stop

# Stop Apache2 web server
killall apache2

# Stop MySQL
killall mysqld
