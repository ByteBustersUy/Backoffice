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