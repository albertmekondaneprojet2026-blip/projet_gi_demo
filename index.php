<?php
require_once 'includes/functions.php';
redirigerSiNonConnecte();

$nom = $_SESSION['utilisateur_nom'];

echo '<!DOCTYPE html>';
echo '<html lang="fr">';
echo '<head>';
echo '<meta charset="UTF-8">';
echo '<title>Accueil</title>';
echo '<link rel="stylesheet" href="css/style.css">';
echo '</head>';
echo '<body>';

echo '<div class="conteneur">';
echo '<h1>Bienvenue, ' . htmlspecialchars($nom) . ' !</h1>';
echo '<p>Vous êtes connecté avec succès.</p>';
echo '<a href="deconnexion.php" class="bouton-deconnexion">Se déconnecter</a>';
echo '</div>';

echo '</body>';
echo '</html>';
