#!/bin/bash

gcc $1.m `gnustep-config --objc-flags` -lobjc -lgnustep-base -o $1