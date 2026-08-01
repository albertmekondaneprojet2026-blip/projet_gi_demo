<?php
require_once 'includes/functions.php';
redirigerSiConnecte();

$erreur = recupererMessage('erreur_inscription');
$ancienNom = recupererMessage('ancien_nom');
$ancienEmail = recupererMessage('ancien_email');

echo '<!DOCTYPE html>';
echo '<html lang="fr">';
echo '<head>';
echo '<meta charset="UTF-8">';
echo '<title>Inscription</title>';
echo '<link rel="stylesheet" href="css/style.css">';
echo '</head>';
echo '<body>';

echo '<div class="conteneur">';
echo '<h1>Créer un compte</h1>';

if ($erreur) {
    echo '<p class="message-erreur">' . $erreur . '</p>';
}

echo '<form action="inscription_traitement.php" method="POST" id="formulaire-inscription">';

echo '<label for="nom">Nom complet</label>';
echo '<input type="text" name="nom" id="nom" value="' . htmlspecialchars($ancienNom ?? '') . '" required>';

echo '<label for="email">Adresse email</label>';
echo '<input type="email" name="email" id="email" value="' . htmlspecialchars($ancienEmail ?? '') . '" required>';

echo '<label for="mot_de_passe">Mot de passe</label>';
echo '<input type="password" name="mot_de_passe" id="mot_de_passe" required>';

echo '<label for="confirmation">Confirmer le mot de passe</label>';
echo '<input type="password" name="confirmation" id="confirmation" required>';

echo '<button type="submit">S\'inscrire</button>';

echo '</form>';

echo '<p>Déjà un compte ? <a href="connexion.php">Se connecter</a></p>';
echo '</div>';

echo '<script src="js/script.js"></script>';
echo '</body>';
echo '</html>';
