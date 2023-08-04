#!/bin/bash
listar_usuarios_sistema() {
    echo "<--USUARIOS DEL SISTEMA-->"
    cat /etc/passwd | grep bash | cut -d: -f 1
}

crear_usuarios_linux() {
    clear
    echo "<--CREAR USUARIO-->"
    echo " "
    echo "Ingrese el nombre de usuario"
    echo usuario
    read -r usuario
    echo " "
    sudo adduser $usuario
    echo "Usuario agregado correctamente"
    echo " "
    echo "¿Quiere que este usuario sea SUDO? si/no"
    read -r essudo
    if [ $essudo = si ]; then
        sudo adduser $usuario sudo

    else
        echo "El usuario quedó sin grupos"

    fi
}

eliminar_usuarios_linux() {
    echo "<--USUARIOS DEL SISTEMA-->"
    echo " "
    cat /etc/passwd | grep bash | cut -d: -f 1
    echo " "
    echo "Ingrese el nombre de usuario a eliminar"
    read -r usuario
    echo $usuario
    sudo userdel $usuario
    echo "Usuario $usuario eliminado correctamente"
}

agregar_usuario_sudo() {
    echo "<--AGREGAR USUARIO A GRUPO SUDO-->"
    echo " "
    cat /etc/passwd | grep bash | cut -d: -f 1
    read -r usuario
    sudo adduser $usuario sudo
    echo "Usuario agregado correctamente"
}