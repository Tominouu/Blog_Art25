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

    // Récupérer le nombre de likes réels depuis la BDD
    $likes = sql_select("likeArt", "COUNT(*) AS totalLikes", "numArt = $id")[0]['totalLikes'];

    // Vérifier si l'utilisateur a déjà liké cet article
    $userLiked = false;
    if (isset($_SESSION['user_id'])) {
        $numMemb = $_SESSION['user_id'];
        $checkLike = sql_select("likeArt", "*", "numMemb = $numMemb AND numArt = $id");
        $userLiked = !empty($checkLike);
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

        <div class="row mt-4">
            <div class="col-md-8 mx-auto">
                <img src="<?php echo ROOT_URL . '/src/uploads/' . $article[0]['urlPhotArt']; ?>" 
                    alt="Image de l'article" class="img-fluid rounded mb-4">
            </div>
        </div>

        <!-- Section Like -->
        <div class="row mx-4 mb-4">
            <div class="col text-center">
                <?php if (isset($_SESSION['user_id'])): ?>
                    <button id="like-btn" class="btn btn-outline-danger <?php echo $userLiked ? 'active' : ''; ?>" data-liked="<?php echo $userLiked ? '1' : '0'; ?>">
                        ❤️ <span id="like-count"><?php echo $likes; ?></span> J'aime
                    </button>
                <?php else: ?>
                    <p class="text-muted">Connectez-vous pour aimer cet article.</p>
                <?php endif; ?>
            </div>
        </div>

    </div>
</main>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const likeBtn = document.getElementById("like-btn");
    const likeCount = document.getElementById("like-count");

    if (likeBtn) {
        likeBtn.addEventListener("click", function() {
            let liked = likeBtn.getAttribute("data-liked") === "1";
            let articleId = "<?php echo $id; ?>";

            fetch("/api/like_article.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                body: "article_id=" + articleId + "&action=" + (liked ? "unlike" : "like")
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    likeCount.textContent = data.likes;
                    likeBtn.setAttribute("data-liked", liked ? "0" : "1");
                    likeBtn.classList.toggle("active");
                }
            });
        });
    }
});
</script>

<?php require_once '../../../footer.php'; ?>
