# DESAFIO SISTEMA DE AGENDA ELETRÔNICA: Usuários e Atividades

## O usuário deverá conter:
1. id
2. login
3. senha

Cada usuário poderá criar N atividades e só enxergará suas próprias atividades.

## A atividade deverá conter:
1. id
- usuario_id
2. nome
3. descrição
4. data e hora de início
5. data e hora de término
6. status (pendente, concluída, cancelada)

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