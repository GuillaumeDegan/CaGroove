<!-- Page de traitement du formulaire d'ajout de gouts -->

<?php

// connexion bdd
require "../database/connectDB.php";
$db = new ConnectDB('cagroove');

// récupération de l'id user
$id = $_GET['id'];

// vérification du token 
require "../nocsrf.php";
if(NoCSRF::check( 'token', $_POST, true, 60*10, false )) {
    // récupération de toutes les checkboxs gouts séléctionnées
    $goutsArray = $_POST['gouts'];
    // boucle qui envoie la requete d'ajout de l'utilisateur et du gout dans la table d'association utilisateursgouts
    foreach($goutsArray as $gout) {
        $goutId = str_replace("g_", "", $gout);
        $db->querySend("INSERT INTO `utilisateursgouts` (`idUtilisateur`, `idGout`) VALUES (?, ?); ", [$id, $goutId]);
    }

    // redirection
    header('Location: affichage_utilisateur.php');
} else {
    // affichage d'erreur si token différent
    echo "Erreur de token";
    echo "<br />";
    echo "<a href='affichage_event.php'>Retour</a>";
}

