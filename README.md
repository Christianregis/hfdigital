# HFDigital

## 📌 Présentation du projet

**HFDigital** est une application **web full-stack** orientée digitalisation des services et gestion moderne des activités numériques. Le projet vise à offrir une plateforme fiable, évolutive et professionnelle permettant de centraliser des fonctionnalités clés autour du numérique (gestion, visibilité en ligne, automatisation).

HFDigital est conçu comme un projet structuré, respectant les bonnes pratiques du développement web et prêt à évoluer vers un déploiement à grande échelle.

---

## 🎯 Objectifs du projet

* Digitaliser des processus et services traditionnels
* Proposer une plateforme web moderne et intuitive
* Mettre en pratique une architecture full-stack propre
* Faciliter la maintenance et l’évolution du système

---

## 🛠️ Technologies utilisées

### Backend

* **PHP – Laravel** (Framework MVC)
* **MySQL** – Base de données relationnelle

### Frontend

* **HTML5 / CSS3**
* **JavaScript**
* **Blade** (moteur de templates Laravel)
* **Bootstrap CSS**

### Outils & Environnement

* **Git & GitHub** – Gestion de versions
* **Composer** – Dépendances PHP
* **Node.js & NPM** – Assets frontend
* **XAMPP / WAMP / Laragon** – Serveur local
* **Visual Studio Code** – Éditeur recommandé

---

## 📂 Structure du projet

```text
hfdigital/
├── app/                # Logique métier
├── bootstrap/
├── config/
├── database/           # Migrations et seeders
├── public/             # Fichiers publics
├── resources/          # Vues et assets
├── routes/             # Routes web et API
├── storage/
├── tests/
├── .env.example
├── composer.json
└── README.md
```

---

## ⚙️ Prérequis

Avant de commencer, assure-toi d’avoir installé :

* **PHP >= 8.0**
* **Composer**
* **MySQL**
* **Node.js & NPM**
* **Git**
* Un serveur local (**XAMPP recommandé**)

---

## 🚀 Procédure d’installation

### 1️⃣ Cloner le dépôt

```bash
git clone https://github.com/Christianregis/hfdigital.git
cd hfdigital
```

---

### 2️⃣ Installer les dépendances backend

```bash
composer install
```

---

### 3️⃣ Configuration de l’environnement

Copier le fichier d’exemple :

```bash
cp .env.example .env
```

Générer la clé Laravel :

```bash
php artisan key:generate
```

---

### 4️⃣ Configuration de la base de données

Modifier le fichier `.env` :

```env
DB_DATABASE=hfdigital
DB_USERNAME=root
DB_PASSWORD=
```

Créer la base de données `hfdigital` dans phpMyAdmin.

---

### 5️⃣ Migration de la base de données

```bash
php artisan migrate
```

(Optionnel – données de test)

```bash
php artisan db:seed
```

---

### 6️⃣ Installation des dépendances frontend

```bash
npm install
npm run dev
```

---

### 7️⃣ Lancer l’application

```bash
php artisan serve
```

Accès via :

```
http://127.0.0.1:8000
```

---

## 🔐 Bonnes pratiques Git

* Exclure `vendor/`, `node_modules/`, `.env`
* Toujours exécuter `git pull` avant `git push`
* Utiliser des messages de commit explicites

---

## 📈 Fonctionnalités actuelles

* Interface web responsive
* Gestion de contenus et services
* Connexion à une base de données
* Architecture prête pour l’extension

---

## 🚧 Améliorations futures

* Authentification et gestion des rôles
* Tableau de bord administrateur
* API REST
* Déploiement cloud

---

## 👤 Auteur

**Christian Régis CHEUKAP TATOUN**
Développeur d’applications – Web & Mobile

---

## 📄 Licence

Projet réalisé à des fins pédagogiques et professionnelles.
Toute réutilisation doit mentio
