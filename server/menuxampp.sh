#!/bin/bash


respaldar_datos() {
    fecha=$(date +"%d-%m-%y %H:%M:%S")
    usuario=$(whoami)
    #Respaldo de base de datos
    echo "-----------------------------------------"
    echo "--------Respaldando base de datos--------"
    echo "-----------------------------------------"
    tar -czvf "/home/$usuario/Documentos/respaldos/mysql/respaldo_mysql_$fecha.tar" "/opt/lampp/var/mysql"
    #respaldo de htaccess
    echo "-----------------------------------------"
    echo "----------Respaldando htaccess-----------"
    echo "-----------------------------------------"
    tar -czvf "/home/$usuario/Documentos/respaldos/htaccess/respaldo_htaccess_$fecha.tar" "/opt/lampp/lib/php/File/HtAccess.php"
    #Respaldo de htdocs
    echo "-----------------------------------------"
    echo "-----------Respaldando htdocs------------"
    echo "-----------------------------------------"
    tar -czvf "/home/$usuario/Documentos/respaldos/htdocs/respaldo_htdocs_$fecha.tar" "/opt/lampp/htdocs"
    #Respaldo de my.cnf
    echo "-----------------------------------------"
    echo "-----------Respaldando my.cnf------------"
    echo "-----------------------------------------"
    tar -czvf "/home/$usuario/Documentos/respaldos/mycnf/respaldo_mycnf_$fecha.tar" "/opt/lampp/etc/my.cnf"
    #respaldo de httpd.conf
    echo "-----------------------------------------"
    echo "---------Respaldando httpd.conf----------"
    echo "-----------------------------------------"
    tar -czvf "/home/$usuario/Documentos/respaldos/httpdconf/respaldo_httpdconf_$fecha.tar" "/opt/lampp/etc/httpd.conf"
    #Respaldo de php.ini
    echo "-----------------------------------------"
    echo "-----------Respaldando php.ini-----------"
    echo "-----------------------------------------"
    tar -czvf "/home/$usuario/Documentos/respaldos/phpini/respaldo_phpini_$fecha.tar" "/opt/lampp/etc/php.ini"
    echo " "
    echo "-----------------------------------------------"
    echo "--------Sus archivos fueron respaldados--------"
    echo "-----------------------------------------------"

}


# ----------------------------------------
#<--------Casos del menú principal-------->
# ----------------------------------------
cambiar_puerto_apache() {
    echo "Ingrese el nuevo puerto"
    read -r puertonuevo
    sed -irespaldo "205s/ServerName localhost:.*/ServerName localhost:$puertonuevo/" etc/httpd.conf >etc/httpd.conf1
    sed -irespaldo "52s/Listen 8090.*/Listen $puertonuevo/" etc/httpd.conf >etc/httpd.conf1
    echo "puerto modificado"
}

cambiar_puerto_mysql() {
    echo "Ingrese el nuevo puerto"
    read -r puertonuevo
    sed -irespaldo "29s/port=.*/port=$puertonuevo/" etc/my.cnf >etc/my.cnf1
    echo "puerto modificado"
}

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

configuracion() {
    clear
    echo "<--CONFIGURACIÓN-->"
    echo
    echo "{1}---Cambiar puerto de apache"
    echo "{2}---Cambiar puerto de MySQL"
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
    echo "{11}--Salir"
    echo
    echo "INGRESE UNA DE LAS OPCIONES"
    read -r option
    
    casos_menu_principal $option
}
inicio
# ----------------------------------------
#<----------Casos del submenu 10---------->
# ----------------------------------------