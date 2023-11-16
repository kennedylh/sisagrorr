# sisagrorr

# **Deploy da Aplicação | Produção**

necessário instalação do docker.
        
        apt update
        apt upgrade
        snap install docker

**1** - Na raiz da aplicação clonar o projeto  laradock, documentação do projeto laradock https://laradock.io/

        git clone https://github.com/Laradock/laradock.git

**2** - Acessar o diretório
  
        cd laradock
        cp .env.example .env

**3** - Subir os containeres necessários para a aplicação.

        docker-compose up -d nginx mysql phpmyadmin workspace

**4** - Verificar o id e o ip do container 

        docker ps
        docker inspect <id_do_container> | grep "IPAddress"

**5** - Acessar o container workspace (container do **projeto** laravel)

        docker exec -it id_do_container bash

**6** - Instalar o composer e configurar a chave da aplicação

        composer install
        cp .env.example .env
        

**7** - Criar o banco de dados

        http://url:8081

        primeiro login padrão mysql
        alterar senha padrão de root

**8** - Configurar o banco de dados no arquivo .env  

        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1   **verificar o ip do container do mysql**
        DB_PORT=3306
        DB_DATABASE=your_db
        DB_USERNAME=root
        DB_PASSWORD=123456

**9** - Executar script de migração base de dados

        php artisan migrate --seed


**10** - Permissão no diretório storage**   

         chmod o+w ./storage/ -R

acessar a aplicação na url determinada.



# **Certificado SSL letsencrypt**

     Path do arquivo 
     
     /home/ubuntu/vocacional_uerr/laradock/docker-compose.yml 

**1** - Em docker-compose.yml defina $CN e $EMAIL com seus dados:

        certbot:
        build:
        context: ./certbot
        volumes:
        - ./data/certbot/certs/:/var/certs
        - ./certbot/letsencrypt/:/var/www/letsencrypt
        environment:
        - CN="fake.domain.com"
        - EMAIL="fake.email@gmail.com"
        networks:
        - frontend

**2** - Em docker-compose.yml adicione os volumes usados ​​no certbot:
        
        nginx:
        volumes:
        - ./data/certbot/certs/:/var/certs
        - ./certbot/letsencrypt/:/var/www/letsencrypt


**3** - Pare o contêiner nginx

        docker-compose stop nginx

**4** - Reconstruir o contêiner nginx com a opção --no-cache

        docker-compose build --no-cache nginx

**5** - Construir contêiner certbot
    
        docker-compose build --no-cache certbot

**6** - Iniciar o contêiner nginx

        docker-compose up -d nginx

**7** - Agora instale os certificados com certbot

        docker-compose up -d certbot    

**8** - Ajustar o arquivo .conf do nginx            

        /home/ubuntu/vocacional_uerr/laradock/nginx/sites

        # For https
        listen 443 ssl default_server;
        listen [::]:443 ssl default_server ipv6only=on;
        ssl_certificate /var/certs/testevocacional.uerr.edu.br-cert1.pem;
        ssl_certificate_key /var/certs/testevocacional.uerr.edu.br-privkey1.pem;

**9** - Reiniciar o nginx

        docker-compose restart nginx



# **Renovação do Certificado**

**1** - Executar o container certbot no diretório laradock

        docker-compose up -d certbot

**2** - Reiniciar o nginx

        docker-compose restart nginx

