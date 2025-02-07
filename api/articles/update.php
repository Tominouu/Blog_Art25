<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once '../../functions/ctrlSaisies.php';

// Vérifier si l'ID de l'article est fourni
if (!isset($_POST['numArt']) || empty($_POST['numArt'])) {
    die("Erreur : ID de l'article non spécifié");
}

$numArt = ctrlSaisies($_POST['numArt']); // ID de l'article à modifier

// Récupération et sécurisation des données du formulaire
$libTitrArt = isset($_POST['libTitrArt']) ? ctrlSaisies($_POST['libTitrArt']) : '';
$libChapoArt = isset($_POST['libChapoArt']) ? ctrlSaisies($_POST['libChapoArt']) : '';
$libAccrochArt = isset($_POST['libAccrochArt']) ? ctrlSaisies($_POST['libAccrochArt']) : '';
$parag1Art = isset($_POST['parag1Art']) ? ctrlSaisies($_POST['parag1Art']) : '';
$libSsTitr1Art = isset($_POST['libSsTitr1Art']) ? ctrlSaisies($_POST['libSsTitr1Art']) : '';
$parag2Art = isset($_POST['parag2Art']) ? ctrlSaisies($_POST['parag2Art']) : '';
$libSsTitr2Art = isset($_POST['libSsTitr2Art']) ? ctrlSaisies($_POST['libSsTitr2Art']) : '';
$parag3Art = isset($_POST['parag3Art']) ? ctrlSaisies($_POST['parag3Art']) : '';
$libConclArt = isset($_POST['libConclArt']) ? ctrlSaisies($_POST['libConclArt']) : '';
$numThem = isset($_POST['numThem']) ? ctrlSaisies($_POST['numThem']) : 0;

// Gestion de l'image : garder l'ancienne ou en enregistrer une nouvelle
$urlPhotArt = '';
if (isset($_FILES['urlPhotArt']) && $_FILES['urlPhotArt']['error'] == 0) {
    $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/src/uploads/';
    $urlPhotArt = $_FILES['urlPhotArt']['name'];
    $uploadPath = $uploadDir . $urlPhotArt;

    // Déplacer le fichier téléchargé
    move_uploaded_file($_FILES['urlPhotArt']['tmp_name'], $uploadPath);

    // Mettre à jour avec la nouvelle image
    sql_update('ARTICLE', "libTitrArt='$libTitrArt', libChapoArt='$libChapoArt', libAccrochArt='$libAccrochArt', 
        parag1Art='$parag1Art', libSsTitr1Art='$libSsTitr1Art', parag2Art='$parag2Art', libSsTitr2Art='$libSsTitr2Art', 
        parag3Art='$parag3Art', libConclArt='$libConclArt', numThem='$numThem', urlPhotArt='$urlPhotArt'", 
        "numArt='$numArt'");
} else {
    // Si aucune nouvelle image, on met à jour sans toucher à l'image
    sql_update('ARTICLE', "libTitrArt='$libTitrArt', libChapoArt='$libChapoArt', libAccrochArt='$libAccrochArt', 
        parag1Art='$parag1Art', libSsTitr1Art='$libSsTitr1Art', parag2Art='$parag2Art', libSsTitr2Art='$libSsTitr2Art', 
        parag3Art='$parag3Art', libConclArt='$libConclArt', numThem='$numThem'", 
        "numArt='$numArt'");
}

// Vérifier si des mots-clés sont sélectionnés
if (isset($_POST['numMotCle'])) {
    $numMotCles = $_POST['numMotCle']; // Tableau des mots-clés sélectionnés

    // Supprimer tous les mots-clés actuels de l'article
    sql_delete('MOTCLEARTICLE', "numArt = '$numArt'");

    // Insérer les nouveaux mots-clés sélectionnés
    foreach ($numMotCles as $numMotCle) {
        sql_insert('MOTCLEARTICLE', 'numArt, numMotCle', "'$numArt', '$numMotCle'");
    }
} else {
    // Si aucun mot-clé n'est sélectionné, supprimer les anciens
    sql_delete('MOTCLEARTICLE', "numArt = '$numArt'");
}


// Redirection vers la liste des articles après modification
header('Location: ../../views/backend/articles/list.php');
exit();

?>
