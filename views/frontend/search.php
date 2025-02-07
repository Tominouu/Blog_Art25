<?php
require_once '../../header.php';
sql_connect(); // Assurer la connexion à la base de données

$articles = [];

if (isset($_GET['query']) && !empty($_GET['query'])) {
    $query = sql_escape($_GET['query']); // Sécurisation de l'entrée utilisateur

    // Rechercher les articles liés aux mots-clés
    $articles = sql_select(
        "ARTICLE A INNER JOIN MOTCLEARTICLE MA ON A.numArt = MA.numArt 
                    INNER JOIN MOTCLE MC ON MA.numMotCle = MC.numMotCle",
        "DISTINCT A.numArt, A.libTitrArt, A.libChapoArt, A.libAccrochArt",
        "MC.libMotCle LIKE '%$query%'"
    );
}
?>
<link rel="stylesheet" href="<?php echo ROOT_URL . '/src/css/style.css'; ?>" />
<!-- Affichage des résultats -->
<div class="container">
    <h1>Résultats de la recherche</h1>

    <?php if (!empty($articles)) { ?>
        <ul class="list-group">
            <?php foreach ($articles as $article) { ?>
                <li class="list-group-item">
                    <h3><?php echo htmlspecialchars($article['libTitrArt']); ?></h3>
                    <p><?php echo htmlspecialchars($article['libChapoArt']); ?></p>
                    <a href="/views/frontend/articles/article.php?
                        <?php echo isset($_SESSION['user_id']) ? 'id=' . $_SESSION['user_id'] . '&' : ''; ?>
                        numArt=<?php echo $article['numArt']; ?>&like=0" 
                        class="text-body-emphasis fw-bold">Lire la suite...</a>
                </li>
            <?php } ?>
        </ul>
    <?php } else { ?>
        <p>Aucun article trouvé pour "<?php echo htmlspecialchars($_GET['query']); ?>"</p>
    <?php } ?>
</div>
<?php
require_once '../../footer.php';
?>
