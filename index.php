<?php 
require_once 'header.php';
sql_connect();

require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';


// Récupérer les articles de la base de données
$article = sql_select("ARTICLE", "*");

?>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Karla:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="src/css/style.css">

<main class="container bg-white">
    <div class="row position-relative">
        <div class="col mt-4">
            <img src="src/images/pont-pierre.jpg" alt="Pont de Pierre" style="width: 100%; position: relative; border-radius: 15px;">
        </div>    
        <h1 class="text-center position-absolute top-50 start-50 translate-middle text-white" style="z-index: 1; font-size:5vw;">LES GARDIENS DE LA GARONNE</h1>    </div>    
    </div>
    <div class="row">
        <!-- Article à la une (titre) -->
        <div class="col-md-6">
            <div class="p-4 p-md-5 mb-4 pe-3">
                <h1 class="display-4">
                    <?php echo $article ? htmlspecialchars($article[2]['libTitrArt']) : "Aucun article trouvé."; ?>
                </h1>
                <!-- Article à la une (chapô) -->
                <p class="lead my-3">
                    <?php echo $article ? htmlspecialchars($article[2]['libChapoArt']) : "Aucun article trouvé."; ?>
                </p>
                <a href="views/frontend/articles/article.php?
                <?php echo isset($_SESSION['user_id']) ? 'id=' . $_SESSION['user_id'] . '&' : ''; ?>
                numArt=<?php echo $article[2]['numArt']; ?>&like=0" 
                class="text-body-emphasis fw-bold">Lire la suite....</a>
            </div>
        </div>
        <!-- Article à la une (image) -->
        <div class="col-md-6 d-flex align-items-center pe-5">
            <div class="w-100 d-flex justify-content-center align-items-center">
                <img src="<?php echo ROOT_URL . '/src/uploads/' . htmlspecialchars($article[2]['urlPhotArt']); ?>" alt="Image actuelle" style="max-height: 100%; max-width: 100%;">
            </div>
        </div>
    </div>

    <!-- Articles suivants -->
    <div class="row bg-primary bg-opacity-10" style="border-radius: 15px;">
        <?php for ($i = 1; $i <= 2; $i++) { if (isset($article[$i])) { ?>
        <div class="col-md-6 p-4 p-md-5 mb-4 pe-3">
            <div class="row g-0 border rounded flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col-md-12 p-4 d-flex flex-column position-static">
                    <h3 class="mb-3"><?php echo htmlspecialchars($article[$i]['libTitrArt']); ?></h3>
                    <p class="card-text mb-auto"><?php echo htmlspecialchars($article[$i]['libChapoArt']); ?></p>
                    <a href="/views/frontend/articles/article.php?
                    <?php echo isset($_SESSION['user_id']) ? 'id=' . $_SESSION['user_id'] . '&' : ''; ?>
                    numArt=<?php echo $article[$i]['numArt']; ?>&like=0" 
                    class="text-body-emphasis fw-bold">Lire la suite...</a>

                    </div>
                <div class="col-md-12 px-3">
                    <div class="h-100 d-flex justify-content-center align-items-center rounded">
                        <img src="<?php echo ROOT_URL . '/src/uploads/' . htmlspecialchars($article[$i]['urlPhotArt']); ?>" 
                            alt="Image actuelle" 
                            class="img-fluid rounded" 
                            style="width: 100%; height: auto; object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
        <?php }} ?>
    </div>

    <!-- Dernier article -->
    <?php if (isset($article[3])) { ?>
    <div class="row">
        <div class="col-md-6 d-flex align-items-center px-5">
            <div class="w-100 d-flex justify-content-center align-items-center">
                <img src="<?php echo ROOT_URL . '/src/uploads/' . htmlspecialchars($article[3]['urlPhotArt']); ?>" alt="Image actuelle" style="max-height: 100%; max-width: 100%;">
            </div>
        </div>
        <div class="col-md-6">
            <div class="p-4 p-md-5 mb-4">
                <h1 class="display-4"><?php echo htmlspecialchars($article[3]['libTitrArt']); ?></h1>
                <p class="lead my-3"><?php echo htmlspecialchars($article[3]['libChapoArt']); ?></p>
                <a href="/views/frontend/articles/article.php?
                <?php echo isset($_SESSION['user_id']) ? 'id=' . $_SESSION['user_id'] . '&' : ''; ?>
                numArt=<?php echo $article[3]['numArt']; ?>&like=0" 
                class="text-body-emphasis fw-bold">Lire la suite...</a>

            </div>
        </div>
    </div>
    <?php } ?>
    <div id="cookieAccepter" style="position: fixed; bottom: 20px; left: 20px; right: 20px; background: #fff; border: 1px solid #ccc; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); display: none; z-index: 1000;">
    <p style="margin: 0; font-size: 14px;">Nous utilisons des cookies pour améliorer votre expérience sur notre site. En continuant, vous acceptez notre <a href="#" style="color: blue; text-decoration: underline;">politique de cookies</a>.</p>
    <button id="acceptCookies" style="margin-top: 10px; padding: 10px 20px; background: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer;">Accepter</button>
    <button id="refuseCookies" style="margin-top: 10px; padding: 10px 20px; background: #dc3545; color: white; border: none; border-radius: 5px; cursor: pointer;">Refuser</button>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        let consent = localStorage.getItem('cookieAccepter');
        if (!consent) {
            document.getElementById('cookieAccepter').style.display = 'block';
        }
        document.getElementById('acceptCookies').addEventListener('click', function() {
            document.cookie = "cookieAccepter=accepted; expires=Fri, 31 Dec 9999 23:59:59 GMT; path=/";
            document.getElementById('cookieAccepter').style.display = 'none';
            // Ici, on pourrait charger les cookies
        });
        document.getElementById('refuseCookies').addEventListener('click', 
        function() {
                    localStorage.setItem('cookieAccepter', 'denied');
                    document.getElementById('cookieAccepter').style.display = 'none';
                    // Supprimer les cookies non essentiels
                    deleteAllCookies();
                });
                function deleteAllCookies() {
                    document.cookie.split(";").forEach(function(c) {
                        document.cookie = c.replace(/^ +/, "").replace(/=.*/, "=;expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/");
                    });
                }
            });
</script>
</main>
<?php require_once 'footer.php'; ?>  
