# DESAFIO SISTEMA DE AGENDA ELETRÔNICA: Usuários e Atividades

## O usuário deverá conter:
1. id: INT, chave primária, auto-incremento
2. login: VARCHAR(255), único, não nulo
3. senha: VARCHAR(255), não nulo

Cada usuário poderá criar N atividades e só enxergará suas próprias atividades.

## A atividade deverá conter:
1. id: INT, chave primária, auto-incremento
- usuario_id: INT, chave estrangeira referenciando id em Usuários
2. nome: VARCHAR(255), não nulo
3. descrição: TEXT, opcional
4. data e hora de início: DATETIME, não nulo
5. data e hora de término: DATETIME, não nulo
6. status (pendente, concluída, cancelada): ENUM('pendente', 'concluída', 'cancelada'), padrão 'pendente'

Deverá ser possível alterar o status da atividade, após a criação.

## Funcionalidades:
1. Tela para cadastro e login de usuário.
- Cadastro: Formulário para criar um novo usuário com login e senha.
- Login: Formulário para autenticar o usuário com login e senha.
2. CRUD (Create, Read, Update e Delete) de atividades.
- Create: Formulário para criar uma nova atividade.
- Read: Exibição das atividades em um calendário e em uma lista.
- Update: Formulário para editar detalhes da atividade, incluindo o status.
- Delete: Opção para excluir uma atividade.
3. Exibição de atividades em um calendário (é permitido o uso de bibliotecas).
- Utilização de bibliotecas de calendário como *FullCalendar* para exibir as atividades.

## Tecnologias recomendadas:

1. PHP (Codeigniter ou CakePHP)
2. Jquery
3. Bootstrap
4. MySQL

- Backend: PHP com Codeigniter ou CakePHP
- Frontend: JQuery para manipulação do DOM e chamadas AJAX, Bootstrap para o design responsivo.
- Banco de Dados: MySQL para armazenamento de dados.