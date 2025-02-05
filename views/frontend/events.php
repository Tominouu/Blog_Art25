<?php 
    require_once '../../header.php';
    session_start(); 
    sql_connect();

    require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';

    // Récupérer les articles de la base de données
    $article = sql_select("ARTICLE", "*", "numThem = 1");
    ?>

    <link rel="stylesheet" href="<?php echo ROOT_URL . '/src/css/style.css'; ?>" />
    <main class="container bg-white">
        <div class="row">
            <div class="col mt-4">
                <h1 class="text-center me-5"> Evenement </h1>
                <hr class="decorative-line mt-1">
            </div>
        </div>

        <!-- Articles suivants -->
        <div class="row bg-primary bg-opacity-10">
            <?php foreach($article as $articles) { if (isset($articles)) { ?>
            <div class="col-md-6 p-4 p-md-5 mb-4 pe-3">
                <div class="row g-0 border rounded flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col-md-12 p-4 d-flex flex-column position-static">
                        <h3 class="mb-3"><?php echo htmlspecialchars($articles['libTitrArt']); ?></h3>
                        <p class="card-text mb-auto"><?php echo htmlspecialchars($articles['libChapoArt']); ?></p>
                        <a href="views/frontend/articles/article?id=<?php echo $articles['numArt']; ?>" class="text-body-emphasis fw-bold">Lire la suite...</a>
                        </div>
                    <div class="col-md-12 px-3">
                        <div class="h-100 d-flex justify-content-center align-items-center rounded">
                            <img class="pe-2" src="<?php echo ROOT_URL . '/src/uploads/' . htmlspecialchars($articles['urlPhotArt']); ?>" 
                                alt="Image actuelle" 
                                class="img-fluid rounded" 
                                style="width: 100%; height: auto; object-fit: cover;">
                        </div>
                    </div>
                </div>
            </div>
            <?php }} ?>
        </div>
    </main>
    <?php require_once '../../footer.php'; ?>  
