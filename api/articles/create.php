<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once '../../functions/ctrlSaisies.php';

// Initialisation des variables
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

// Gestion de l'image
if (isset($_FILES['urlPhotArt'])) {
    $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/src/uploads/';
    $urlPhotArt = $_FILES['urlPhotArt']['name'];
    $uploadPath = $uploadDir . $urlPhotArt;
    move_uploaded_file($_FILES['urlPhotArt']['tmp_name'], $uploadPath);
} else {
    die("Erreur lors de l'envoi du fichier");
    exit;
}

// Récupération des mots-clés sélectionnés
$motsCles = isset($_POST['numMotCle']) ? $_POST['numMotCle'] : [];

// Ajout de l'article dans la base de données
sql_insert('ARTICLE', 
    'libTitrArt, libChapoArt, libAccrochArt, parag1Art, libSsTitr1Art, parag2Art, libSsTitr2Art, parag3Art, libConclArt, numThem, urlPhotArt', 
    "'$libTitrArt', '$libChapoArt', '$libAccrochArt', '$parag1Art', '$libSsTitr1Art', '$parag2Art', '$libSsTitr2Art', '$parag3Art', '$libConclArt', '$numThem', '$urlPhotArt'"
);

// Récupération du dernier ID inséré en utilisant `ORDER BY` et `LIMIT`
$article = sql_select('ARTICLE', 'numArt', null, null, 'numArt DESC', '1');

// Vérification que l'article existe bien
if (!empty($article)) {
    $numArt = $article[0]['numArt'];

    // Insertion des mots-clés associés à l'article
    if (!empty($motsCles)) {
        foreach ($motsCles as $numMotCle) {
            sql_insert('motclearticle', 'numArt, numMotCle', "'$numArt', '$numMotCle'");
        }
    }

    // Redirection après succès
    header('Location: ../../views/backend/articles/list.php');
    exit();
} else {
    die("Erreur : impossible de récupérer le numéro de l'article.");
}
?>
