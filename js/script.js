// Validation côté client du formulaire d'inscription
const formulaireInscription = document.getElementById('formulaire-inscription');

if (formulaireInscription) {
    formulaireInscription.addEventListener('submit', function (evenement) {
        const motDePasse = document.getElementById('mot_de_passe').value;
        const confirmation = document.getElementById('confirmation').value;

        if (motDePasse.length < 6) {
            evenement.preventDefault();
            alert('Le mot de passe doit contenir au moins 6 caractères.');
            return;
        }

        if (motDePasse !== confirmation) {
            evenement.preventDefault();
            alert('Les mots de passe ne correspondent pas.');
        }
    });
}

// Validation côté client du formulaire de connexion
const formulaireConnexion = document.getElementById('formulaire-connexion');

if (formulaireConnexion) {
    formulaireConnexion.addEventListener('submit', function (evenement) {
        const email = document.getElementById('email').value;

        if (!email.includes('@')) {
            evenement.preventDefault();
            alert('Veuillez entrer une adresse email valide.');
        }
    });
}
