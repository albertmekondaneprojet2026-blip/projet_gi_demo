# Projet Démo Git — Authentification PHP

Petit projet PHP (inscription / connexion / accueil) utilisé comme support
pour apprendre Git et GitHub étape par étape.

## Structure

```
projet_git_demo/
├── config/
│   └── database.php          # Connexion PDO
├── includes/
│   └── functions.php         # Fonctions utilitaires
├── css/
│   └── style.css
├── js/
│   └── script.js
├── sql/
│   └── database.sql          # Script de création de la base
├── inscription.php           # Vue - formulaire d'inscription
├── inscription_traitement.php# Traitement inscription
├── connexion.php              # Vue - formulaire de connexion
├── connexion_traitement.php  # Traitement connexion
├── index.php                  # Page d'accueil protégée
└── deconnexion.php            # Déconnexion
```

## Installation

1. Importer `sql/database.sql` dans phpMyAdmin.
2. Lancer le projet depuis XAMPP (dossier `htdocs`).
3. Ouvrir `http://localhost/projet_git_demo/inscription.php`.
