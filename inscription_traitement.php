<?php
require_once 'includes/functions.php';
require_once 'config/database.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: inscription.php');
    exit;
}

$nom = nettoyer($_POST['nom'] ?? '');
$email = nettoyer($_POST['email'] ?? '');
$motDePasse = $_POST['mot_de_passe'] ?? '';
$confirmation = $_POST['confirmation'] ?? '';

// Validation
if (empty($nom) || empty($email) || empty($motDePasse) || empty($confirmation)) {
    definirMessage('erreur_inscription', 'Tous les champs sont obligatoires.');
    definirMessage('ancien_nom', $nom);
    definirMessage('ancien_email', $email);
    header('Location: inscription.php');
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    definirMessage('erreur_inscription', 'Adresse email invalide.');
    definirMessage('ancien_nom', $nom);
    header('Location: inscription.php');
    exit;
}

if (strlen($motDePasse) < 6) {
    definirMessage('erreur_inscription', 'Le mot de passe doit contenir au moins 6 caractères.');
    definirMessage('ancien_nom', $nom);
    definirMessage('ancien_email', $email);
    header('Location: inscription.php');
    exit;
}

if ($motDePasse !== $confirmation) {
    definirMessage('erreur_inscription', 'Les mots de passe ne correspondent pas.');
    definirMessage('ancien_nom', $nom);
    definirMessage('ancien_email', $email);
    header('Location: inscription.php');
    exit;
}

// Vérifier si l'email existe déjà
$requete = $pdo->prepare('SELECT id FROM utilisateurs WHERE email = :email');
$requete->execute(['email' => $email]);

if ($requete->fetch()) {
    definirMessage('erreur_inscription', 'Cet email est déjà utilisé.');
    definirMessage('ancien_nom', $nom);
    header('Location: inscription.php');
    exit;
}

// Hachage du mot de passe et insertion
$motDePasseHache = password_hash($motDePasse, PASSWORD_BCRYPT);

$insertion = $pdo->prepare(
    'INSERT INTO utilisateurs (nom, email, mot_de_passe) VALUES (:nom, :email, :mot_de_passe)'
);
$insertion->execute([
    'nom' => $nom,
    'email' => $email,
    'mot_de_passe' => $motDePasseHache
]);

definirMessage('succes_connexion', 'Compte créé avec succès. Vous pouvez vous connecter.');
header('Location: connexion.php');
exit;
