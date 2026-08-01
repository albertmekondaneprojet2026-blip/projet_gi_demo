<?php
require_once 'includes/functions.php';
redirigerSiConnecte();

$erreur = recupererMessage('erreur_connexion');
$succes = recupererMessage('succes_connexion');

echo '<!DOCTYPE html>';
echo '<html lang="fr">';
echo '<head>';
echo '<meta charset="UTF-8">';
echo '<title>Connexion</title>';
echo '<link rel="stylesheet" href="css/style.css">';
echo '</head>';
echo '<body>';

echo '<div class="conteneur">';
echo '<h1>Connexion</h1>';

if ($erreur) {
    echo '<p class="message-erreur">' . $erreur . '</p>';
}
if ($succes) {
    echo '<p class="message-succes">' . $succes . '</p>';
}

echo '<form action="connexion_traitement.php" method="POST" id="formulaire-connexion">';

echo '<label for="email">Adresse email</label>';
echo '<input type="email" name="email" id="email" required>';

echo '<label for="mot_de_passe">Mot de passe</label>';
echo '<input type="password" name="mot_de_passe" id="mot_de_passe" required>';

echo '<div class="case-souvenir">';
echo '<input type="checkbox" name="se_souvenir" id="se_souvenir" value="1">';
echo '<label for="se_souvenir">Se souvenir de moi</label>';
echo '</div>';

#echo '<button type="submit">Se connecter</button>';-->

echo '</form>';

echo '<p>Pas encore de compte ? <a href="inscription.php">S\'inscrire</a></p>';
echo '</div>';

echo '<script src="js/script.js"></script>';
echo '</body>';
echo '</html>';
