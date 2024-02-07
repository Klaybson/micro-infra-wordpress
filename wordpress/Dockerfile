# Use a imagem base do Ubuntu
FROM ubuntu:latest

# Atualize o sistema e instale as dependências necessárias
RUN apt-get update && \
    apt-get install -y wget unzip && \
    rm -rf /var/lib/apt/lists/*

# Diretório onde o WordPress será baixado e instalado
WORKDIR /var/www/html

# Copie os arquivos do WordPress
COPY ./wordpress_files/ /var/www/html/

# Baixe a versão mais recente do WordPress do site oficial
RUN wget -qO wordpress.zip https://wordpress.org/latest.zip && \
    unzip -q wordpress.zip && \
    rm wordpress.zip

# Defina as permissões adequadas para o diretório do WordPress
RUN chown -R www-data:www-data -R /var/www/html/ && \
    find /var/www/html/ -type d -exec chmod 755 {} \; && \
    find /var/www/html/ -type f -exec chmod 644 {} \;

# Defina o diretório de trabalho padrão
WORKDIR /var/www/html/

# Comando padrão a ser executado quando o contêiner for iniciado
CMD ["tail", "-f", "/dev/null"]

