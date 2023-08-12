#!/bin/bash

cambiar_puerto_apache() {
    echo "Ingrese el nuevo puerto"
    read -r puertonuevo
    sed -irespaldo "205s/ServerName localhost:.*/ServerName localhost:$puertonuevo/" /opt/lampp/etc/httpd.conf >/opt/lampp/etc/httpd.conf1
    sed -irespaldo "52s/Listen 8090.*/Listen $puertonuevo/" /opt/lampp/etc/httpd.conf >/opt/lampp/etc/httpd.conf1
    echo "puerto modificado"
}

cambiar_puerto_mysql() {
    echo "Ingrese el nuevo puerto"
    read -r puertonuevo
    sed -irespaldo "29s/port=.*/port=$puertonuevo/" /opt/lampp/etc/my.cnf >/opt/lampp/etc/my.cnf1
    echo "puerto modificado"
}