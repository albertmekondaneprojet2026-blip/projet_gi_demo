<?php
session_start();

// Nettoie une donnée entrante (formulaire)
function nettoyer($donnee) {
    return htmlspecialchars(strip_tags(trim($donnee)));
}

// Vérifie si un utilisateur est connecté
function estConnecte() {
    return isset($_SESSION['utilisateur_id']);
}

// Redirige vers la connexion si l'utilisateur n'est pas connecté
function redirigerSiNonConnecte() {
    if (!estConnecte()) {
        header('Location: connexion.php');
        exit;
    }
}

// Redirige vers l'accueil si l'utilisateur est déjà connecté
function redirigerSiConnecte() {
    if (estConnecte()) {
        header('Location: index.php');
        exit;
    }
}

// Stocke un message flash (erreur ou succès) puis le récupère une seule fois
function definirMessage($cle, $texte) {
    $_SESSION[$cle] = $texte;
}

function recupererMessage($cle) {
    if (isset($_SESSION[$cle])) {
        $texte = $_SESSION[$cle];
        unset($_SESSION[$cle]);
        return $texte;
    }
    return null;
}
