#!/bin/bash

source "configuracion.sh"
source "informaciondelsistema.sh"

casos_menu_principal(){
case $1 in
1)
    sudo /opt/lampp/lampp start
    ;;
2)
    sudo /opt/lampp/lampp stop
    ;;
3)
    sudo /opt/lampp/lampp restart
    ;;
4)
    sudo /opt/lampp/lampp startapache
    ;;
5)
    sudo /opt/lampp/lampp stopapache
    ;;
6)
    sudo /opt/lampp/lampp restartapache
    ;;
7)
    sudo /opt/lampp/lampp startmysql
    ;;
8)
    sudo /opt/lampp/lampp stopmysql
    ;;
9)
    sudo /opt/lampp/share/mysql/mysql.server restart
    ;;
10)
    configuracion
    ;;

11)
    infosistema
    ;;
12)

    exit

    ;;
esac
}

inicio() {
option=0
    clear
    echo ██████████████████████████████████████████████████████████████████████████████████████████████████████
    echo ██                                                                                                  ██
    echo ██  ██████╗░██╗░░░██╗████████╗███████╗  ██████╗░██╗░░░██╗░██████╗████████╗███████╗██████╗░░██████╗  ██
    echo ██  ██╔══██╗╚██╗░██╔╝╚══██╔══╝██╔════╝  ██╔══██╗██║░░░██║██╔════╝╚══██╔══╝██╔════╝██╔══██╗██╔════╝  ██
    echo ██  ██████╦╝░╚████╔╝░░░░██║░░░█████╗░░  ██████╦╝██║░░░██║╚█████╗░░░░██║░░░█████╗░░██████╔╝╚█████╗░  ██
    echo ██  ██╔══██╗░░╚██╔╝░░░░░██║░░░██╔══╝░░  ██╔══██╗██║░░░██║░╚═══██╗░░░██║░░░██╔══╝░░██╔══██╗░╚═══██╗  ██
    echo ██  ██████╦╝░░░██║░░░░░░██║░░░███████╗  ██████╦╝╚██████╔╝██████╔╝░░░██║░░░███████╗██║░░██║██████╔╝  ██
    echo ██  ╚═════╝░░░░╚═╝░░░░░░╚═╝░░░╚══════╝  ╚═════╝░░╚═════╝░╚═════╝░░░░╚═╝░░░╚══════╝╚═╝░░╚═╝╚═════╝░  ██
    echo ██                                                                                                  ██
    echo ██████████████████████████████████████████████████████████████████████████████████████████████████████
    echo
    echo █▄█ █▀█ █░█ █▀█   █▀▄ █ █▀▀ █ ▀█▀ ▄▀█ █░░   ▀█▀ █▀█ ▄▀█ █▄░█ █▀ █▀▀ █▀█ █▀█ █▀▄▀█ ▄▀█ ▀█▀ █ █▀█ █▄░█
    echo ░█░ █▄█ █▄█ █▀▄   █▄▀ █ █▄█ █ ░█░ █▀█ █▄▄   ░█░ █▀▄ █▀█ █░▀█ ▄█ █▀░ █▄█ █▀▄ █░▀░█ █▀█ ░█░ █ █▄█ █░▀█
    echo
    echo
    echo "{1}---Iniciar LAMPP"
    echo "{2}---Parar LAMPP"
    echo "{3}---Reiniciar LAMPP"
    echo "{4}---Iniciar apache"
    echo "{5}---Parar apache"
    echo "{6}---Reiniciar apache"
    echo "{7}---Iniciar MySQL"
    echo "{8}---Parar MySQL"
    echo "{9}---Reiniciar MySQL"
    echo "{10}--Configuración"
    echo "{11}--Información del sistema"
    echo "{12}--"
    echo
    echo "INGRESE UNA DE LAS OPCIONES"
    read -r option
    
    casos_menu_principal $option
} 
inicio