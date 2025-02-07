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

    // Vérifie si un ID est passé en paramètre
    if (isset($_GET['numArt']) && is_numeric($_GET['numArt'])) {
        $numArt = intval($_GET['numArt']);
        $article = sql_select("ARTICLE", "*", "numArt =" .  $numArt);
        if (!$article) {
            echo "<h1>Article non trouvé</h1>";
            exit;
        }
    } else {
        echo "<h1>Article non trouvé</h1>";
        exit;
    }

    // Initialisation des variables
    $id = $_GET['numArt'];
    $commentaire = sql_select('COMMENT','*','numArt = '.$numArt);
    $numArt = $_GET['numArt'];
    $likePositif = 1;
    $allLike = sql_select('LIKEART', '*', "numArt = $numArt AND likeA = $likePositif");
    $nblike = count($allLike);
?>

<!-- Affichage de l'article -->
<link rel="stylesheet" href="<?php echo ROOT_URL . '/src/css/style.css'; ?>" />
<main class="container">
    <div class="row">
        <div class="col mt-4">
            <!-- Titre -->
            <h1 class="text-center"><?php echo $article[0]['libTitrArt']; ?></h1>
            <hr class="decorative-line mt-1">
        </div>
    </div>

    <div class="container bg-primary bg-opacity-10 col-md-8 col-sm-12 mx-md-auto">
        <div class="row mx-4">
            <div class="col">
                <!-- Chapo et accroche -->
                <h5 class="mt-4 mt-5"><?php echo $article[0]['libChapoArt']; ?></h5>
                <h3 class="mt-4"><?php echo $article[0]['libAccrochArt']; ?></h3>
            </div>
        </div>

        <div class="row mx-4">
            <div class="col">
                <!-- Paragraphe 1 et Sous Titre 1 -->
                <p class="mt-5"> <?php echo $article[0]['parag1Art']; ?> </p>
                <h4 class="mt-2"> <?php echo $article[0]['libSsTitr1Art']; ?> </h4>
            </div>
        </div>

        <div class="row mx-4">
            <div class="col">
                <!-- Paragraphe 2 et Sous Titre 2 -->
                <p class="mt-5"> <?php echo $article[0]['parag2Art']; ?> </p>
                <h4 class="mt-2"> <?php echo $article[0]['libSsTitr2Art']; ?> </h4>
            </div>
        </div>

        <div class="row mx-4">
            <div class="col">
                <!-- Paragraphe 3 -->
                <p class="mt-5"> <?php echo $article[0]['parag3Art']; ?> </p>
            </div>
        </div>

        <div class="row mx-4">
            <div class="col">
                <!-- Conclusion -->
                <h4 class="mt-2"> <?php echo $article[0]['libConclArt']; ?> </h4>                
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-8 mx-auto">
                <!-- Photo -->
                <img src="<?php echo ROOT_URL . '/src/uploads/' . $article[0]['urlPhotArt']; ?>" 
                    alt="Image de l'article" class="img-fluid rounded mb-4">
            </div>
        </div>

        <!-- Gestion des likes -->
        <div class="d-flex justify-content-center align-items-center mt-4">
            <!-- Redirection -->
            <a <?php if (empty($_SESSION)) {echo 'style="pointer-events: none;"';} ?> href="<?php echo ROOT_URL . '/api/likes/create.php?numArt='.$numArt?>" class="d-flex align-items-center me-3 text-decoration-none">
            <!-- Incrémentation / Décrementation des likes -->
            <?php if (!empty($_GET)) {
                if ($_GET['like'] == 0) {
                    echo '<i class="fa-regular fa-heart me-2" style="font-size: 20px; color: red;"></i>';
                } elseif ($_GET['like'] == 1) {
                    echo '<i class="fa-solid fa-heart me-2" style="font-size: 20px; color: red;"></i>';
                }
            } ?>
            <p class="mb-0"><?php echo $nblike; ?> J'aime</p>
            </a>

            <!-- Gestion des commentaires -->
            <form action="/../../../views/frontend/comments/commentaire.php" method="GET" class="d-flex align-items-center ms-3">
                <!-- Champs cachés pour les IDs -->
                <input type="hidden" name="id2" value="<?php echo $id2; ?>">
                <input type="hidden" name="id1" value="<?php echo $id; ?>">
                <!-- Bouton qui soumet le formulaire -->
                <button type="submit" class="btn btn-primary">Commenter</button>
            </form>
        </div>

        <!-- Affichage des commentaires -->
        <div class="mt-4 mb-4">
            <h2>Commentaires :</h2>
            <?php 
            foreach ($commentaire as $com) {
                if ($com['attModOK'] == 1 AND $com['delLlogiq'] == 0) {
                    echo '<div class="bg-white p-3 rounded mb-2">';
                    echo '<p class="mb-0">' . htmlspecialchars($com['libCom']) . '</p>';
                    echo '</div>';
            }}?>
        </div>
    </div>
</main>

<?php require_once '../../../footer.php'; ?>
