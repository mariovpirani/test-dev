# Teste PHP para Desenvolvedor

## Requisitos:
- Você deve fazer o fork desse projeto no seu repositório;
- Utilizar: Docker, Laravel 5.x e MySQL;
- Devem ser criadas migrations de 3 tabelas relacionadas;


## Sobre o Teste

Nesse teste foi solicitado desenvolver com laravel um sistema de ticket de suporte para clientes

## Tecnologias Utilizadas

- Laravel
- Mysql
- Docker (em teste)
- Bootstrap
- Less


## Passos
- mv .env.alterar .env
- sudo composer update
- sudo docker-compose up -d
- docker exec -it webserver composer update
- sudo docker exec -it webserver php artisan migrate


- Link Sistema - http://0.0.0.0:9080/
- Link Phpmyadmin - http://0.0.0.0:8082/


## Vídeo  com passos do sistema

http://tosempreai.com.br/video-teste/teste.mp4

