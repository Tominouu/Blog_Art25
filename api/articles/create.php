<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once '../../functions/ctrlSaisies.php';

// Initialisation des variables:
// Titre de l'article
$libTitrArt = isset($_POST['libTitrArt']) ? ctrlSaisies($_POST['libTitrArt']) : ''; 
// Chapeau de l'article
$libChapoArt = isset($_POST['libChapoArt']) ? ctrlSaisies($_POST['libChapoArt']) : '';
// Accroche de l'article
$libAccrochArt = isset($_POST['libAccrochArt']) ? ctrlSaisies($_POST['libAccrochArt']) : '';
// Premier paragraphe de l'article
$parag1Art = isset($_POST['parag1Art']) ? ctrlSaisies($_POST['parag1Art']) : '';
// Sous-titre du premier paragraphe
$libSsTitr1Art = isset($_POST['libSsTitr1Art']) ? ctrlSaisies($_POST['libSsTitr1Art']) : '';
// Deuxième paragraphe de l'article
$parag2Art = isset($_POST['parag2Art']) ? ctrlSaisies($_POST['parag2Art']) : '';
// Sous-titre du deuxième paragraphe
$libSsTitr2Art = isset($_POST['libSsTitr2Art']) ? ctrlSaisies($_POST['libSsTitr2Art']) : '';
// Troisième paragraphe de l'article
$parag3Art = isset($_POST['parag3Art']) ? ctrlSaisies($_POST['parag3Art']) : '';
// Conclusion de l'article
$libConclArt = isset($_POST['libConclArt']) ? ctrlSaisies($_POST['libConclArt']) : ''; 

$numArt = isset($_POST['numArt']) ? ctrlSaisies($_POST['numArt']) : 0;
$numThem = isset($_POST['numThem']) ? ctrlSaisies($_POST['numThem']) : 0;
if (isset($_FILES['urlPhotArt'])) {
    $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/src/uploads/';
    $urlPhotArt = $_FILES['urlPhotArt']['name'];
    $uploadPath = $uploadDir . $urlPhotArt;
    move_uploaded_file($_FILES['urlPhotArt']['tmp_name'], $uploadPath);
} else {
    die("Erreur lors de l'envoi du fichier"); 
    exit;
}

// Ajout dans la base de données
sql_insert('ARTICLE', 'libTitrArt, libChapoArt, libAccrochArt, parag1Art, libSsTitr1Art, parag2Art, libSsTitr2Art, parag3Art, libConclArt, numArt, numThem, urlPhotArt', 
"'$libTitrArt', '$libChapoArt', '$libAccrochArt', '$parag1Art', '$libSsTitr1Art', '$parag2Art', '$libSsTitr2Art', '$parag3Art', '$libConclArt', '$numArt', '$numThem', '$urlPhotArt'");

// Redirection 
header('Location: ../../views/backend/articles/list.php');
exit();

?>
