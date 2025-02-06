<?php 
require_once '../../../header.php';
sql_connect();

require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';

// Vérifie si un ID est passé en paramètre
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);

    $article = sql_select("ARTICLE", "*", "numArt =" .  $id );

    if (!$article) {
        echo "<h1>Article non trouvé</h1>";
        exit;
    }
} else {
    echo "<h1>Article non spécifié</h1>";
    exit;
}
?>

<link rel="stylesheet" href="<?php echo ROOT_URL . '/src/css/style.css'; ?>" />
<main class="container">
    <div class="row">
        <div class="col mt-4">
            <h1 class="text-center"><?php echo $article[0]['libTitrArt']; ?></h1>
            <hr class="decorative-line mt-1">
        </div>
    </div>

    <div class="container bg-primary bg-opacity-10 col-md-8 col-sm-12 mx-md-auto">
        <div class="row mx-4">
            <div class="col">
                <h5 class="mt-4 mt-5"><?php echo $article[0]['libChapoArt']; ?></h5>
                <h3 class="mt-4"><?php echo $article[0]['libAccrochArt']; ?></h3>
            </div>
        </div>

        <div class="row mx-4">
            <div class="col">
                <p class="mt-5"> <?php echo $article[0]['parag1Art']; ?> </p>
                <h4 class="mt-2"> <?php echo $article[0]['libSsTitr1Art']; ?> </h4>
            </div>
        </div>

        <div class="row mx-4">
            <div class="col">
                <p class="mt-5"> <?php echo $article[0]['parag2Art']; ?> </p>
                <h4 class="mt-2"> <?php echo $article[0]['libSsTitr2Art']; ?> </h4>
            </div>
        </div>

        <div class="row mx-4">
            <div class="col">
                <p class="mt-5"> <?php echo $article[0]['parag3Art']; ?> </p>
            </div>
        </div>

        <div class="row mx-4">
            <div class="col">
                <h4 class="mt-2"> <?php echo $article[0]['libConclArt']; ?> </h4>                
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-8 mx-auto">
                <img src="<?php echo ROOT_URL . '/src/uploads/' . $article[0]['urlPhotArt']; ?>" 
                    alt="Image de l'article" class="img-fluid rounded mb-4">
            </div>
        </div>
    </div>
</main>

<?php require_once '../../../footer.php'; ?>
