#!/bin/bash

infosistema(){
    echo "CPU"
    grep -m 1 "model name" /proc/cpuinfo | cut -d: -f2
    echo 
}