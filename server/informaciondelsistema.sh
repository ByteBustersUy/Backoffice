#!/bin/bash

infosistema(){
    cpu=$(grep -m 1 "model name" /proc/cpuinfo | cut -d: -f2)
    so=$(uname -o)
    arch=$(uname -m)
    hname=$(hostname)

    clear
    echo "Host: $hname"
    echo
    echo "CPU $cpu" 
    echo 
    echo "Sistema operativo: $so"
    echo 
    echo "Arquitectura: $arch"

    #echo "Espacio en disco (GB)"
    #df -h | awk '{print $2}' | grep -v "Filesystem" | while read -r disk_space; do
    #echo "$disk_space"
    #suma=$suma+$disk_space
    #echo "$suma"
    #done


}