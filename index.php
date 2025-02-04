<?php 
require_once 'header.php';
session_start(); 
sql_connect();

require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';

// Récupérer le premier article de la base de données
$article = sql_select("ARTICLE", "*");
?>

<main class="container">
    <div class="row">
        <!-- Article à la une (titre) -->
        <div class="col-6">
            <div class="p-4 p-md-5 mb-4">
                <h1 class="display-4 fst-italic">
                    <?php if ($article) {
                        echo htmlspecialchars($article[0]['libTitrArt']);
                    } else {
                        echo "Aucun article trouvé.";
                    } ?>
                </h1>
                <!-- Article à la une (chapô) -->
                <p class="lead my-3">
                    <?php if ($article) {
                        echo htmlspecialchars($article[0]['libChapoArt']);
                    } else {
                        echo "Aucun article trouvé.";
                    } ?>
                </p>
                <p class="lead mb-0"><a href="#" class="text-body-emphasis fw-bold">Lire la suite...</a></p>
            </div>
        </div>
        
        <!-- Article à la une (image) -->
        <div class="mt-5 col-6 d-flex align-items-center">
            <div style="width: 100%; display: flex; justify-content: center; align-items: center;">
            <?php if ($article) {
                $url = $article[0]['urlPhotArt']; ?>
                <img src="<?php echo ROOT_URL . '/src/uploads/' . $url; ?>" alt="Image actuelle" width="500"><?php        
            } else {
                echo "Aucun article trouvé.";
            } ?>   
            </div>
        </div>
    </div>

    <!-- Article deux -->
    <div class="row pt-5 bg-light">
        <div class="col-6">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col-6 p-4 d-flex flex-column position-static">
                    <!--(titre) -->
                    <h3 class="mb-3">
                        <?php 
                        if ($article) {
                            echo htmlspecialchars($article[1]['libTitrArt']);
                        } else {
                            echo "Aucun article trouvé.";
                        } ?>
                    <!-- (chapô) -->
                    </h3>
                    <p class="card-text mb-auto">
                        <?php if ($article) {
                            echo htmlspecialchars($article[1]['libChapoArt']);
                        } else {
                            echo "Aucun article trouvé.";
                        } ?> 
                    </p>
                    <a href="#" class="icon-link gap-1 icon-link-hover stretched-link"> Lire la suite</a>
                </div>
                
                <!-- (photo) -->
                <div class="col-6 pd-5 py-3 mt-5">
                    <div style="height: 250px; margin-right: 15px;">
                        <div>
                            <?php 
                            if ($article) {
                            $url = $article[1]['urlPhotArt']; ?>
                            <img src="<?php echo ROOT_URL . '/src/uploads/' . $url; ?>" alt="Image actuelle" style="width: 100%; height: 100%; object-fit: cover;"><?php        
                            } else {
                                echo "Aucun article trouvé.";
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                           
        
    <!-- Article deux bis -->
        <div class="col-6">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col-6 p-4 d-flex flex-column position-static">
                    <!--(titre) -->
                    <h3 class="mb-3">
                        <?php 
                        if ($article) {
                            echo htmlspecialchars($article[2]['libTitrArt']);
                        } else {
                            echo "Aucun article trouvé.";
                        } ?>
                    <!-- (chapô) -->
                    </h3>
                    <p class="card-text mb-auto">
                        <?php if ($article) {
                            echo htmlspecialchars($article[2]['libChapoArt']);
                        } else {
                            echo "Aucun article trouvé.";
                        } ?> 
                    </p>
                    <a href="#" class="icon-link gap-1 icon-link-hover stretched-link"> Lire la suite</a>
                </div>
                
                <!-- (photo) -->
                <div class="col-6 py-3 mt-5">
                    <div style="height: 250px; margin-right: 15px;">
                        <div>
                            <?php 
                            if ($article) {
                            $url = $article[2]['urlPhotArt']; ?>
                            <img src="<?php echo ROOT_URL . '/src/uploads/' . $url; ?>" alt="Image actuelle" style="width: 100%; height: 100%; object-fit: cover;"><?php        
                            } else {
                                echo "Aucun article trouvé.";
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
                
        <!-- Article à la une (image) -->
        <div class="col-6 d-flex align-items-center">
            <div style="width: 100%; display: flex; justify-content: center; align-items: center;">
            <?php if ($article) {
            $url = $article[3]['urlPhotArt']; ?>
            <img src="<?php echo ROOT_URL . '/src/uploads/' . $url; ?>" alt="Image actuelle" style="max-height: 100%; max-width: 100%;"><?php        
            } else {
            echo "Aucun article trouvé.";
            } ?>   
            </div>
        </div>
        <!-- Article à la une (titre) -->
        <div class="col-6">
            <div class="p-4 p-md-5 mb-4">
                <h1 class="display-4 fst-italic">
                    <?php if ($article) {
                        echo htmlspecialchars($article[3]['libTitrArt']);
                    } else {
                        echo "Aucun article trouvé.";
                    } ?>
                </h1>
                <!-- Article à la une (chapô) -->
                <p class="lead my-3">
                    <?php if ($article) {
                        echo htmlspecialchars($article[3]['libChapoArt']);
                    } else {
                        echo "Aucun article trouvé.";
                    } ?>
                </p>
                <p class="lead mb-0"><a href="#" class="text-body-emphasis fw-bold">Lire la suite...</a></p>
            </div>
        </div>
    </div>

</main>
<?php require_once 'footer.php'; ?> 
