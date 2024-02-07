#!/bin/bash

# O valor da variavél vai ser atribuida na execução da pipeline
portal="$1"

#Diretório para realizar a gerencia das portas
if [ ! -d "/etc/docker/portas-controle/" ]; then
    mkdir -p "/etc/docker/portas-controle/"

fi

# Verifica se o arquivo que armazena a porta já existe no diretório de controle
if [ ! -f "/etc/docker/portas-controle/port_$portal" ]; then
  # Se não existe, gera uma porta aleatória
  porta=$(shuf -i 8000-8999 -n 1)
  echo $porta > "/etc/docker/portas-controle/port_$portal"
else
  # Se o arquivo existe, lê a porta armazenada
  porta=$(cat "/etc/docker/portas-controle/port_$portal")
fi

# Criar diretório do volume
mkdir -p /var/www/html/$portal

sleep 2
echo "Criando o contêiner Docker para o portal $portal..."

# Comando docker para criar o contêiner dokcer e uma copia dos logs. 
#Em construção
#docker-compose up --build -d