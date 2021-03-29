#!/bin/bash
for i in $(seq $2 $3)
do
   mkdir "$1$i"
done
