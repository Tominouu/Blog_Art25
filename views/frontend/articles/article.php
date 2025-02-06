<?php 
require_once '../../../header.php';
session_start();
sql_connect();

require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
// Récupérer l'ID de l'utilisateur connecté
if (isset($_SESSION['user_id'])) {
    $id2 = $_SESSION['user_id'];
}else{
    $id2 = null;
}

$id = $_GET['numArt'];

// Vérifie si un ID est passé en paramètre
if (isset($_GET['numArt']) && is_numeric($_GET['numArt'])) {
    $numArt = intval($_GET['numArt']);

    $article = sql_select("ARTICLE", "*", "numArt =" .  $numArt);

    if (!$article) {
        echo "<h1>Article non trouvé</h1>";
        exit;
    }
}
$numArt = $_GET['numArt'];
$likePositif = 1;
$allLike = sql_select('LIKEART', '*', "numArt = $numArt AND likeA = $likePositif");
$nblike = count($allLike);
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
        <div class="small d-flex justify-content-start">
            <a <?php if (empty($_SESSION)) {echo 'style="pointer-events: none;"';} ?> href="<?php echo ROOT_URL . '/api/likes/create.php?numArt='.$numArt?>"
                class="d-flex align-items-center me-3">
                <?php if (!empty($_GET)) {
                    if ($_GET['like'] == 0) {
                        echo '<i style="font-size: 20px; color: red" class="fa-regular fa-heart"></i>';
                    } elseif ($_GET['like'] == 1) {
                        echo '<i style="font-size: 20px; color: red" class="fa-solid fa-heart"></i>';
                    }
                } ?>
                <p><?php echo $nblike; ?> J'aime</p>
            </a>
            <form action="/../../../views/frontend/comments/commentaire.php" method="GET">
            <!-- Champs cachés pour les IDs -->
            <input type="hidden" name="id2" value="<?php echo $id2; ?>">
            <input type="hidden" name="id1" value="<?php echo $id; ?>">
            <!-- Bouton qui soumet le formulaire -->
            <button type="submit" class="btn btn-primary">Commenter</button>
    </form>
        </div>
        


    </div>
</main>

<?php require_once '../../../footer.php'; ?>