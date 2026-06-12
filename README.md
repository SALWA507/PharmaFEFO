PharmaFEFO est une application web de gestion de stock pharmaceutique basée sur la méthode FEFO (First Expired, First Out).
Elle permet de gérer les médicaments, lots, péremptions, alertes automatiques et rapports financiers.

🚀 Fonctionnalités principales
🔐 Authentification
Login utilisateur (email / password)
Gestion des sessions PHP
Logout sécurisé
👥 Gestion des rôles
Admin
Pharmacien
Préparateur

Chaque rôle a un accès spécifique au système.

📦 Gestion de stock
Ajout des médicaments
Gestion des lots
Quantité disponible
Date d’expiration
⚙️ FEFO automatique
Sortie automatique des lots les plus proches de l’expiration
Mise à jour des quantités
Enregistrement des mouvements de stock
⚠️ Alertes de péremption
Statuts automatiques :
🟢 OK
🟡 WARNING
🔴 CRITICAL
⚫ EXPIRED
🔴 Filtre des lots critiques
Affichage uniquement des lots "CRITICAL"
Tri par date d’expiration
❌ Gestion des lots expirés
Marquer un lot comme expiré
Mise à zéro de la quantité
📊 Dashboard
Nombre total des lots
Lots expirés
Lots critiques
Lots en warning
Vue globale du stock
💰 Rapport financier
Calcul des pertes sur les lots expirés
Prix des médicaments
Total des pertes
🧭 Interface dynamique
Menu dynamique selon le rôle
Sidebar (Admin / Pharmacien / Préparateur)
Interface responsive avec Tailwind CSS
🏗️ Architecture du projet
PharmaFEFO/
│
├── public/
│   ├── index.php
│   └── logout.php
│
├── config/
│   └── database.php
│
├── src/
│   ├── Controller/
│   │   ├── DashboardController.php
│   │   └── StockController.php
│   │
│   ├── Repository/
│   │   ├── UserRepository.php
│   │   └── StockBatchRepository.php
│   │
│   ├── Service/
│   │   ├── FEFOService.php
│   │   └── AlertService.php
│   │
│   └── Middleware/
│       └── AuthMiddleware.php
│
├── templates/
│   ├── auth/
│   │   └── login.php
│   │
│   ├── dashboard/
│   │   └── index.php
│   │
│   └── stock/
│       └── list.php
│
└── README.md
🧠 Base de données (principales tables)
users
roles
medicaments
lots
mouvement_stock
⚙️ Installation
Cloner le projet
git clone https://github.com/your-repo/pharmafefo.git
Importer la base de données SQL
Configurer la connexion :
config/database.php
Lancer le projet :
http://localhost/PharmaFEFO/public/index.php
🔑 Comptes de test

Admin

Email: admin@gmail.com
Password: 123456
🧪 Technologies utilisées
PHP (MVC)
MySQL
Tailwind CSS
PDO
JavaScript (minimal)
📌 Objectif du projet

Optimiser la gestion des stocks pharmaceutiques en appliquant la méthode FEFO afin de réduire les pertes dues à la péremption des médicaments.

👨‍💻 Auteur

Projet réalisé dans le cadre d’un projet académique de gestion de stock intelligent.