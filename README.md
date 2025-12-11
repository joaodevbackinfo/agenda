📘 Sistema de Agenda de Contatos

Projeto da disciplina Linguagens e Técnicas de Programação III – IFTO

👨‍💻 Desenvolvedores

João Vítor Piagem Pereira

Ingrid Costa Sousa

📌 Sobre o Projeto

Este sistema foi desenvolvido como atividade avaliativa da disciplina Linguagens e Técnicas de Programação III, com o objetivo de aplicar os conceitos de desenvolvimento web utilizando o framework Laravel.

A aplicação consiste em um CRUD completo de contatos, com autenticação, listagem, cadastro, edição e exclusão.
O sistema foi construído com foco em organização, boas práticas, usabilidade e responsividade.

🛠 Tecnologias Utilizadas

Laravel 12

PHP 8.2

MySQL

Blade Templates

CSS Responsivo

Bootstrap (se aplicável)

Composer & Artisan CLI

📂 Funcionalidades
✔ Autenticação

Login

Registro

Proteção de rotas para usuários autenticados

✔ CRUD de Contatos

Criar

Listar

Editar

Excluir

✔ Campos do Contato

Nome

Email

Telefone

Endereço

Data de nascimento

Observações

user_id (associação com o usuário logado)

✔ Funcionalidades Extras

Paginação

Ordenação asc/desc

Layout moderno

Navbar responsiva

Rodapé informativo

Views organizadas e intuitivas

🧱 Estrutura do Banco de Dados

A tabela contatos possui os seguintes campos:

Campo	Tipo
id	bigint
nome	varchar(255)
email	varchar(255)
telefone	varchar(20)
endereco	varchar(255)
nascimento	date
observacoes	text
user_id	bigint (FK)
created_at	timestamp
updated_at	timestamp
🚀 Como Executar o Projeto
1️⃣ Clonar o repositório
git clone <URL_DO_REPOSITORIO>
cd projeto-agenda-contatos-ltp3

2️⃣ Instalar dependências do Laravel
composer install

3️⃣ Instalar dependências do frontend (caso use)
npm install

4️⃣ Criar arquivo .env
cp .env.example .env

5️⃣ Gerar chave da aplicação
php artisan key:generate

6️⃣ Configurar banco de dados no arquivo .env

Exemplo:

DB_DATABASE=agenda
DB_USERNAME=root
DB_PASSWORD=

7️⃣ Rodar as migrations
php artisan migrate

8️⃣ Iniciar o servidor
php artisan serve


Acesse:
👉 http://127.0.0.1:8000/

📸 Layout da Aplicação

O sistema conta com:

Navbar moderna e responsiva

Rodapé fixo com créditos dos desenvolvedores

Tabelas estilizadas

Botões intuitivos

Campos organizados visualmente

100% compatível com dispositivos móveis

🎓 Contexto Acadêmico

Este software foi desenvolvido para a disciplina Linguagens e Técnicas de Programação III do Instituto Federal do Tocantins (IFTO).

Objetivos acadêmicos:

Praticar arquitetura MVC

Trabalhar com CRUD no Laravel

Utilizar Blade de forma organizada

Implementar autenticação nativa

Garantir responsividade e boas práticas

Publicar e documentar o código corretamente no GitHub

⭐ Créditos e Contribuição

Desenvolvido por:

👨‍💻 João Vítor Piagem Pereira
👩‍💻 Ingrid Costa Sousa

Ambos participaram do desenvolvimento backend, frontend e documentação.

📄 Licença

Projeto livre para uso acadêmico e estudos.