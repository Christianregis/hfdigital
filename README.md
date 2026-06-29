# HF Digital

HF Digital est une plateforme web développée avec **Laravel 10**, **HTML**, **CSS** et **JavaScript**. Elle offre une architecture moderne, une interface responsive et un environnement de développement entièrement conteneurisé grâce à **Docker**.

## 🚀 Technologies utilisées

### Backend
- Laravel 10
- PHP 8.2
- PostgreSQL
- Composer

### Frontend
- HTML5
- CSS3
- JavaScript
- Vite
- NPM

### DevOps
- Docker
- Docker Compose
- Nginx
- GitHub Actions (CI)

---

# 📁 Structure du projet

```
.
├── app/
├── bootstrap/
├── config/
├── database/
├── docker/
│   └── nginx/
├── public/
├── resources/
├── routes/
├── storage/
├── tests/
├── Dockerfile
├── docker-compose.yml
├── composer.json
├── package.json
└── README.md
```

---

# ⚙️ Prérequis

Avant de commencer, assurez-vous d'avoir installé :

- Git
- Docker Desktop
- Docker Compose

### Vérification

```bash
docker --version
docker compose version
git --version
```

---

# 🐳 Installation de Docker

## Windows

1. Télécharger Docker Desktop :
https://www.docker.com/products/docker-desktop/

2. Installer Docker Desktop

3. Activer WSL2 lorsque demandé

4. Vérifier l'installation

```bash
docker --version
docker compose version
```

---

## Linux (Ubuntu)

```bash
sudo apt update

sudo apt install docker.io docker-compose-plugin -y

sudo systemctl enable docker

sudo systemctl start docker
```

Ajouter votre utilisateur au groupe docker

```bash
sudo usermod -aG docker $USER
```

Puis redémarrer la session.

---

## macOS

Télécharger Docker Desktop :

https://www.docker.com/products/docker-desktop/

---

# 📥 Cloner le projet

```bash
git clone https://github.com/<username>/hfdigital.git

cd hfdigital
```

---

# ⚙️ Configuration

Créer le fichier `.env`

```bash
cp .env.example .env
```

Générer la clé Laravel

```bash
php artisan key:generate
```

> Si vous utilisez Docker uniquement, cette étape peut être réalisée depuis le conteneur.

---

# 🚀 Lancer le projet avec Docker

Construire les images

```bash
docker compose build
```

ou directement

```bash
docker compose up -d --build
```

---

Vérifier que les conteneurs sont démarrés

```bash
docker ps
```

Vous devriez voir :

- hfdigital_app
- hfdigital_nginx
- hfdigital_postgres

---

# 📦 Installer les dépendances (si nécessaire)

PHP

```bash
docker compose exec app composer install
```

JavaScript

```bash
docker compose exec app npm install
```

---

# 🔑 Générer la clé Laravel

```bash
docker compose exec app php artisan key:generate
```

---

# 🗄️ Exécuter les migrations

```bash
docker compose exec app php artisan migrate
```

Avec les seeders

```bash
docker compose exec app php artisan migrate --seed
```

Ou réinitialiser complètement la base

```bash
docker compose exec app php artisan migrate:fresh --seed
```

---

# 🧹 Nettoyer les caches Laravel

```bash
docker compose exec app php artisan optimize:clear
```

---

# 🎨 Compiler les assets

Mode développement

```bash
docker compose exec app npm run dev
```

Build production

```bash
docker compose exec app npm run build
```

---

# 🌐 Accéder au projet

Application

```
http://localhost:8080
```

---

# 📊 Base de données

PostgreSQL

- Host : postgres
- Port : 5432
- Database : hfdigital
- Username : postgres
- Password : password

---

# 🛠️ Commandes utiles

Construire les images

```bash
docker compose build
```

Lancer les conteneurs

```bash
docker compose up -d
```

Reconstruire

```bash
docker compose up -d --build
```

Voir les conteneurs

```bash
docker ps
```

Voir les logs

```bash
docker compose logs
```

Logs d'un service

```bash
docker compose logs app
```

Entrer dans le conteneur

```bash
docker compose exec app sh
```

Arrêter les conteneurs

```bash
docker compose down
```

Supprimer les volumes

```bash
docker compose down -v
```

---

# 🧪 Tests

Exécuter les tests

```bash
docker compose exec app php artisan test
```

---

# 🔄 Pipeline CI

Le projet utilise **GitHub Actions** pour :

- Installation des dépendances
- Vérification du code
- Exécution des migrations
- Exécution des tests automatiques

Chaque Pull Request et chaque Push déclenchent automatiquement le pipeline.

---

# 📌 Fonctionnalités

- Authentification
- Gestion des utilisateurs
- Interface responsive
- Architecture MVC Laravel
- Gestion PostgreSQL
- Docker Ready
- CI/CD GitHub Actions

---

# 👨‍💻 Développeur

**Christian Regis CHEUKAP TATOUN**

Étudiant en Génie Logiciel & Développeur Full Stack

GitHub : https://github.com/Christianregis

---

# 📄 Licence

Vous êtes libre de l'utiliser, le modifier et le redistribuer conformément aux termes de la licence.