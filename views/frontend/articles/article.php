<?php 
    require_once '../../../header.php';
    session_start();
    sql_connect();

    require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';

    // Récupérer l'ID de l'utilisateur connecté
    if (isset($_SESSION['user_id'])) {
        $id2 = $_SESSION['user_id'];
    } else {
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
    $id_theme =  $article[0]['numThem'];
    $thematique = sql_select('THEMATIQUE', 'libThem', 'numThem = '.$id_theme);
    $id = $_GET['numArt'];
    $commentaire = sql_select('COMMENT','*','numArt = '.$numArt);
    $numArt = $_GET['numArt'];
    $likePositif = 1;
    $allLike = sql_select('LIKEART', '*', "numArt = $numArt AND likeA = $likePositif");
    $nblike = count($allLike);
    // Récupérer les mots-clés associés à l'article
    $motsCles = sql_select(
        "MOTCLEARTICLE MA INNER JOIN MOTCLE MC ON MA.numMotCle = MC.numMotCle",
        "MC.libMotCle",
        "MA.numArt = $numArt"
    );

?>
<body>
    <!-- Affichage de l'article -->
    <link rel="stylesheet" href="/../../src/css/style.css">
    <main class="container">
        <div class="row">
            <div class="col mt-4 text-center">
                <h1><?php echo $article[0]['libTitrArt']; ?></h1>
            </div>
        </div>

        <div class="container bg-light shadow-sm p-4 rounded col-md-8 col-sm-12 mx-auto">
            <!-- Chapo et accroche -->
            <div class="text-center">
                <h5 class="fw-bold"><?php echo $article[0]['libChapoArt']; ?></h5>
                <h3 class="mt-3"><?php echo $article[0]['libAccrochArt']; ?></h3>
            </div>

            <!-- Contenu de l'article -->
            <div class="mt-4">
                <p><?php echo $article[0]['parag1Art']; ?></p>
                <h4 class="text-secondary"><?php echo $article[0]['libSsTitr1Art']; ?></h4>

                <p class="mt-3"><?php echo $article[0]['parag2Art']; ?></p>
                <h4 class="text-secondary"><?php echo $article[0]['libSsTitr2Art']; ?></h4>

                <p class="mt-3"><?php echo $article[0]['parag3Art']; ?></p>
                <h4 class="fw-bold mt-3"><?php echo $article[0]['libConclArt']; ?></h4>
            </div>

            <!-- Image -->
            <div class="text-center mt-4">
                <img src="<?php echo ROOT_URL . '/src/uploads/' . $article[0]['urlPhotArt']; ?>" 
                    alt="Image de l'article" class="img-fluid rounded shadow">
            </div>

            <!-- Thématique et Mots-clés -->
            <div class="d-flex flex-wrap justify-content-center mt-4">
                <span class="badge bg-secondary mx-1">Thématique : <?php echo $thematique[0]['libThem']; ?></span>
                <?php if (!empty($motsCles)) : ?>
                    <?php foreach ($motsCles as $mot) : ?>
                        <span class="badge bg-info text-dark mx-1"><?php echo htmlspecialchars($mot['libMotCle']); ?></span>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <!-- Likes et commentaires -->
            <div class="d-flex justify-content-center align-items-center mt-4">
                <a <?php if (empty($_SESSION)) echo 'style="pointer-events: none;"'; ?> 
                href="<?php echo ROOT_URL . '/api/likes/create.php?numArt=' . $numArt; ?>" 
                class="d-flex align-items-center text-decoration-none">
                    <i class="fa-<?php echo (!empty($_GET) && $_GET['like'] == 1) ? 'solid' : 'regular'; ?> fa-heart me-2 text-danger" style="font-size: 20px;"></i>
                    <p class="mb-0"><?php echo $nblike; ?> J'aime</p>
                </a>

                <form action="/../../../views/frontend/comments/commentaire.php" method="GET" class="ms-3">
                    <input type="hidden" name="id2" value="<?php echo $id2; ?>">
                    <input type="hidden" name="id1" value="<?php echo $id; ?>">
                    <button type="submit" class="btn btn-primary">Commenter</button>
                </form>
            </div>

            <!-- Affichage des commentaires -->
            <div class="mt-4">
                <h2>Commentaires :</h2>
                <?php foreach ($commentaire as $com) : ?>
                    <?php if ($com['attModOK'] == 1 && $com['delLogiq'] == 0) : ?>
                        <div class="card shadow-sm mb-2">
                            <div class="card-body">
                                <p class="mb-0"><?php echo htmlspecialchars($com['libCom']); ?></p>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </main>
</body>
<?php require_once '../../../footer.php'; ?>
