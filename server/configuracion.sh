#!/bin/bash 
source "gestiondeusuarios.sh"
source "cambiodepuertos.sh"
source "respaldo.sh"

configuracion() {
    clear
    echo "<--CONFIGURACIÓN-->"
    echo
    echo "{1}---Cambiar puerto de apache"
    echo "{2}---Cambiar puerto de MySQL"
    echo "{3}---gestión de usuarios linux"
    echo "{3}---Listar los usuarios de linux"
    echo "{4}---Crear usuarios de linux"
    echo "{5}---Eliminar usuarios de linux"
    echo "{6}---Agregar un usuario a SUDO"
    echo "{7}---Respaldar datos"
    echo "{8}---Volver a inicio"

    read -r option
    case $option in
    1)
        cambiar_puerto_apache
        ;;
    2)
        cambiar_puerto_mysql
        ;;
    3)
        listar_usuarios_sistema
        ;;
    4)
        crear_usuarios_linux
        ;;
    5)
        eliminar_usuarios_linux
        ;;
    6)
        agregar_usuario_sudo
        ;;
    7)
        respaldar_datos
        ;;
    8)
        inicio
        ;;
    esac
}