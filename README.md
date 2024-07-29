# Sistema de Agenda Eletrônica

## Início Rápido

Este projeto é uma aplicação de agenda eletrônica que permite o gerenciamento de usuários e atividades. A aplicação é construída usando CodeIgniter (PHP) e MySQL como banco de dados.

Este README fornece um guia passo a passo para configurar e executar o contêiner MySQL com Docker, além de integrar o banco de dados com a aplicação. Inclui instruções para criar variáveis de ambiente, iniciar o contêiner, acessar o banco de dados, e iniciar a aplicação.

### Pré-requisitos

- [Docker](https://www.docker.com/)
- [MySQL_Image](https://hub.docker.com/_/mysql)

### Configuração e Início do Banco de Dados com Docker

1. **Clone o Repositório**

   ```bash
   git clone https://github.com/ronaldoomjr/sistema-agenda.git
   cd sistema-agenda
   Para iniciar a aplicação 

2. **Crie um Arquivo .env**

Crie um arquivo .env na raiz do projeto para armazenar as variáveis de ambiente. Aqui está um exemplo de como o arquivo .env deve parecer:

DB_HOST=db
DB_NAME=sistema_agenda
DB_USER=root
DB_PASS=sua_senha_segura
DB_PORT=3306

3. **Baixar a Imagem Oficial do MySQL no DockerHub e seguir as instruções de uso da Imagem**

   docker pull mysql

Iniciar uma instância do MySQL:

   docker run --name some-mysql -e MYSQL_ROOT_PASSWORD=my-secret-pw -d mysql:tag

... onde some-mysql é o nome que você quer atribuir ao seu contêiner, my-secret-pwé a senha a ser definida para o usuário root do MySQL e tagé a tag especificando a versão do MySQL que você quer.

4. **Acesso ao shell do contêiner**

O docker execcomando permite que você execute comandos dentro de um contêiner Docker. A seguinte linha de comando lhe dará um shell bash dentro do seu mysqlcontêiner:

   docker exec -it my_mysql mysql -u root -p

5. **Configurando a Aplicação**

Certifique-se de que as configurações do banco de dados em sua aplicação (app/Config/Database.php para CodeIgniter) estejam corretas e correspondam às variáveis de ambiente definidas.

6. **Executando a Aplicação**

Inicie o servidor de desenvolvimento do CodeIgniter:

  php spark serve

Acesse a aplicação em http://localhost:8080.



