# Case Técnico da Feegow

Sistema de cadastro de vacinação dos funcionários da feegow.

> Status: Developed

## Funcionalidades

+ Cadastro e gerenciamento de funcionários
+ Cadastro e gerenciamento de Vacinas
+ Cadastro e Gerenciamento de Vacinas aplicadas

## Informações Sobre o projeto

[Documento explicativo sobre o sistema](https://drive.google.com/file/d/1icuTBNYfd9hlV2Py31wV7hBhwB1DQk1J/view?usp=sharing)

[Vídeo explicativo sobre como levantar o ambiente](https://drive.google.com/file/d/16Sop2WKomFRGhFBNbOymiYVS3bQtF1ub/view?usp=sharing)



## Comandos

Abaixo estão os comandos de criação do ambiente necessário para o projeto. Alguns podem demorar, porém siga a sequência e os execute um por vez.

-   `docker-compose up -d` (Cria o container do docker)

-   `docker-compose run --rm composer install` (Instala a dependecia do php via composer)

-   `cp .env.example .env` (Copia e cria o arquivo de configuracao do laravel)

-   `docker-compose run --rm artisan key:generate` (Gera a chave do sistema)

O arquivo .env deve ser configurado nesse momento para que o comando migrate funcione.
É fundamental que a configuração esteja nesta ordem.
e posteriormente os dados de acesso ao banco do sistema. O env.example já esta neste formato só
aguardando os dados.

//ACESSO AO BANCO LOCAL

DB_CONNECTION=pgsql
DB_HOST=postgres
DB_PORT=5432
DB_DATABASE=feegow_covid
DB_USERNAME=postgres
DB_PASSWORD=feegowcovid

//chaves do pgadmin
emal:feegow@gmail.com
senha:feegowcovid

-   `docker-compose run --rm npm install` (Instala as dependencias do frontEnd)
-   `docker-compose run --rm npm run dev` (Compilacao das libs do frontEnd)

Tem que criar a base agora

-   `docker-compose run --rm artisan migrate --seed` (Cria as tabelas do banco de dados e popula ele)

AGORA SERÁ A INSTALAÇÃO DO ADMINLTE, CASO EM ALGUM MOMENTO APAREÇA PEDINDO PARA SOBRESCREVER
ALGUM ARQUIVO, RECUSE.

-   `docker-compose run --rm composer update` (Atualiza a dependecia do php via composer)
