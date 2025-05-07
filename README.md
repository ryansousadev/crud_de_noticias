Instruções para Configurar/Inicializar o Projeto CRUD de Notícias

## Descrição
Aplicação web para gerenciamento de notícias com funções de Listar, Criar, Editar e Excluir, usando Laravel 12, Livewire 3, AlpineJS, TailwindCSS e banco de dados SQLite.



___________________________________________________________________________________

Passo a passo para instalação

1. Clone o repositório

git clone [url-do-repositorio] noticias-crud

cd noticias-crud

2. Instale as dependências do PHP

composer install

3. Configure o ambiente

cp .env.example .env
php artisan key:generate

4. Configure o banco de dados SQLite

touch database/database.sqlite

5. Configure o arquivo .env

DB_CONNECTION=sqlite
DB_DATABASE=/caminho/absoluto/para/database/database.sqlite

6. Execute as migrações para criar as tabelas 

php artisan migrate

7. (Opcional) Execute os seeders para popular o banco com dados de exemplo

php artisan db:seed

8. Crie o link simbólico para o armazenamento de arquivos 

php artisan storage:link

9. Configure o fuso horário (se necessário) 
No arquivo config/app.php, altere o valor de timezone para America/Sao_Paulo.


10. Limpe o cache de configuração 

php artisan config:clear
php artisan optimize:clear



11. Inicie o servidor de desenvolvimento 

php artisan serve


12. Acesse o CRUD 

Abra o navegador e acesse http://127.0.0.1:8000/news

________________________________________________________________________________________________________

Estrutura do CRUD

O sistema usa Laravel com Livewire para criar um CRUD completo para notícias:
-Visualizar notícias: Layout responsivo com cards em grid

-Criar notícias: Formulário para inserir título, conteúdo e imagem

-Editar notícias: Atualização de informações de notícias existentes

-Excluir notícias: Remoção de notícias com confirmação




## Tecnologias Utilizadas
- PHP 8.3
- Laravel 12
- Livewire 3
- AlpineJS
- TailwindCSS
- SQLite3

Laravel 12: Framework PHP
Livewire: Framework para criar interfaces dinâmicas sem JavaScript
TailwindCSS: Framework CSS para design responsivo
SQLite: Banco de dados leve e portátil

## Requisitos Implementados

Migrations, factories e seeders para o banco de dados
Layout clean e responsivo utilizando TailwindCSS
Interface responsiva com cards
Upload e gerenciamento de imagens
Paginação e busca de notícias

## Funcionalidades
- Cadastro e edição de notícias (título, conteúdo, imagem)
- Listagem responsiva em cards (1 a 3 colunas)
- Exclusão com confirmação
- Paginação (20 itens por página)
- Upload único de imagem por notícia
- Sem autenticação (uso aberto)

## Estrutura do Banco de Dados
Tabela `news`:
- `title` (string, 100 caracteres)
- `content` (string, 300 caracteres)
- `image` (string - path da imagem)
- `created_at`
- `updated_at`
