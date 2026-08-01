<?php
require_once 'includes/functions.php';
require_once 'config/database.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: connexion.php');
    exit;
}

$email = nettoyer($_POST['email'] ?? '');
$motDePasse = $_POST['mot_de_passe'] ?? '';

if (empty($email) || empty($motDePasse)) {
    definirMessage('erreur_connexion', 'Veuillez remplir tous les champs.');
    header('Location: connexion.php');
    exit;
}

$requete = $pdo->prepare('SELECT * FROM utilisateurs WHERE email = :email');
$requete->execute(['email' => $email]);
$utilisateur = $requete->fetch();

if (!$utilisateur || !password_verify($motDePasse, $utilisateur['mot_de_passe'])) {
    definirMessage('erreur_connexion', 'Email ou mot de passe incorrect.');
    header('Location: connexion.php');
    exit;
}

// Connexion réussie : on démarre la session utilisateur
/*$_SESSION['utilisateur_id'] = $utilisateur['id'];
$_SESSION['utilisateur_nom'] = $utilisateur['nom'];*/
// Se souvenir de l'utilisateur pendant 30 jours via un cookie
if (isset($_POST['se_souvenir'])) {
    setcookie('utilisateur_id_souvenir', $utilisateur['id'], time() + (30 * 24 * 60 * 60), '/');
}

header('Location: index.php');
exit;
