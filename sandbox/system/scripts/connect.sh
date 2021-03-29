#!/bin/bash

connect(){
	sleep 3
	sudo modprobe -r option > /dev/null 2>&1
	sudo modprobe -r usbserial > /dev/null 2>&1
	sleep 5
	sudo modprobe usbserial vendor=0x12d1 product=0x1001 > /dev/null 2>&1
	sleep 5

	# establish connections
	wvdial
}
connect