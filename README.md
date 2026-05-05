# Portfolio Fotográfico

Sistema de portfolio para fotógrafos, desenvolvido em Laravel, com site público, blog, projetos, biblioteca de fotos por projeto e painel administrativo para gerenciamento completo do conteúdo.

## Recursos

- Site público com página inicial editável.
- Projetos separados, com capa, descrição, ordem, destaque e biblioteca própria de fotos.
- Fotos com título, descrição, hierarquia, status de publicação e controle de enquadramento.
- Blog com listagem, detalhe do artigo, imagem principal e conteúdo editável.
- Painel administrativo protegido por login.
- Gerenciamento de usuários administrativos.
- Configurações visuais do site, incluindo textos, cores e marca d'água.
- Download de fotos com marca d'água aplicada automaticamente.
- Uploads armazenados pelo Laravel, sem depender de arquivos públicos enviados manualmente.

## Tecnologias

- PHP 8.2+
- Laravel 12
- Blade
- MySQL
- Docker e Docker Compose
- Nginx
- Redis

## Como Rodar com Docker

### 1. Clonar o projeto

```bash
git clone <url-do-repositorio> portfolio-fotos
cd portfolio-fotos
```

### 2. Criar o arquivo de ambiente

```bash
cp .env.example .env
```

O `.env.example` já vem preparado para usar o banco MySQL do `docker-compose.yml`.

### 3. Subir os containers

```bash
docker compose up -d
```

### 4. Instalar as dependências

```bash
docker compose exec app composer install
```

Se for trabalhar no frontend com assets do Vite:

```bash
docker compose exec app npm install
docker compose exec app npm run build
```

### 5. Preparar a aplicação

```bash
docker compose exec app php artisan key:generate
docker compose exec app php artisan migrate --seed
docker compose exec app php artisan storage:link
```

### 6. Acessar o sistema

Site:

```text
http://localhost:9001
```

Painel administrativo:

```text
http://localhost:9001/login
```

Usuário criado pelo seed inicial:

```text
Login: admin
Senha: 123
```

Depois do primeiro acesso, crie um novo usuário administrativo com uma senha forte e remova ou altere o usuário inicial.

## Banco de Dados e Uploads

O MySQL do Docker usa a pasta local:

```text
.docker/mysql/dbdata
```

Essa pasta guarda dados locais do banco e não deve ser versionada no Git. Em outro computador, o banco deve ser recriado com:

```bash
docker compose exec app php artisan migrate --seed
```

As fotos enviadas pelo painel ficam no storage da aplicação e são servidas pelas rotas de mídia do Laravel, com marca d'água quando acessadas ou baixadas.

## Comandos Úteis

Rodar testes:

```bash
docker compose exec app php artisan test
```

Limpar caches:

```bash
docker compose exec app php artisan optimize:clear
```

Recriar o banco local do zero:

```bash
docker compose exec app php artisan migrate:fresh --seed
```

## Cuidados Antes de Enviar para o Git

Não envie estes arquivos ou pastas:

- `.env`
- `.docker/`
- `vendor/`
- `node_modules/`
- `public/storage`

Antes de commitar, confira:

```bash
git status
```

Se arquivos do banco aparecerem dentro de `.docker/mysql/dbdata`, eles devem ser removidos apenas do controle do Git, sem apagar o banco local:

```bash
git rm -r --cached .docker/mysql/dbdata
```

## Estrutura Principal

- `app/Http/Controllers`: controllers do site, admin, mídia, blog, projetos e usuários.
- `app/Models`: modelos principais do sistema.
- `database/migrations`: estrutura do banco.
- `resources/views/index.blade.php`: página inicial pública.
- `resources/views/admin`: painel administrativo e seus blocos de interface.
- `resources/views/blog`: páginas públicas do blog.
- `resources/views/projetos`: páginas públicas dos projetos.
- `routes/web.php`: rotas públicas, rotas de mídia e rotas administrativas.

## Autor

Projeto desenvolvido para gerenciamento de portfolio fotográfico em Laravel.
