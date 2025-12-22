
# 📸 Portfólio Fotográfico — Laravel

Portfólio fotográfico moderno desenvolvido em **Laravel**, com **modo escuro permanente**, foco total nas imagens e uma identidade visual **branca + vermelha**.  
O objetivo do projeto é permitir que um fotógrafo publique e organize suas fotos de forma simples, elegante e profissional.

---

## ✨ Características

- 🌙 Modo escuro fixo (dark-first)
- 🖤 Paleta preta com branco como destaque
- 📐 Galeria com proporção fixa (layout limpo e alinhado)
- 🖼️ Imagens como protagonistas (UI mínima)
- ⚡ Frontend com Tailwind CSS + Laravel
- 🧩 Estrutura Blade simples e escalável
- 🚀 Preparado para painel admin de upload

---

## 🛠️ Tecnologias

- **PHP 8+**
- **Laravel**
- **Blade**
- **Tailwind CSS**
- **Docker**

---


## ▶️ Como rodar o projeto (com Docker)

Este projeto utiliza **Docker e Docker Compose** para padronizar o ambiente de desenvolvimento com Laravel.

### 1️⃣ Clonar o repositório

```bash
git clone <url-do-repositorio> portfolio
cd portfolio
````

---

### 2️⃣ Configurar variáveis de ambiente

Copie o arquivo de ambiente:

```bash
cp .env.example .env
```


---

### 3️⃣ Subir os containers

```bash
docker compose up -d
```

---

### 4️⃣ Instalar dependências PHP dentro do container

```bash
docker compose exec app bash
composer install
```

---

### 5️⃣ Gerar a chave da aplicação dentro do container

```bash
php artisan key:generate
```

---

### 6️⃣ Executar as migrações dentro do container (se aplicável)

```bash
php artisan migrate
```

---

### 7️⃣ Acessar o projeto

A aplicação estará disponível em:

```
http://localhost:9001
```

---


## 👤 Autor

Desenvolvido por **Nicole**
Projeto para apresentação de fotografia em ambiente web moderno.

```

---
