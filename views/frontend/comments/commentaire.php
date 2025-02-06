<?php
// Inclusion des fichiers nécessaires
require_once '../../../header.php';
sql_connect();  // Connexion à la base de données via sql_connect()
if (!isset($_SESSION['user_id'])) {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    header("Location: /../../../views/backend/security/login.php"); // Remplace par l'URL de ta page de connexion
    exit;
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
?>

<?php
// Récupérer l'id de l'article et du membre depuis l'URL
$idArticle = isset($_GET['id1']) ? (int) $_GET['id1'] : 0;
$idMembre = isset($_GET['id2']) ? (int) $_GET['id2'] : 0;

// Récupérer le titre de l'article
$article = sql_select('article', 'LibTitrArt', 'numArt = ' . $idArticle);
if ($article) {
    $titreArticle = $article[0]['LibTitrArt']; // Récupérer le titre
} else {
    $titreArticle = "Article non trouvé";
}

// Récupérer le pseudo du membre
$membre = sql_select('Membre', 'PseudoMemb', 'numMemb = ' . $idMembre);
if ($membre) {
    $pseudoMembre = $membre[0]['PseudoMemb']; // Récupérer le pseudo
} else {
    $pseudoMembre = "Membre non trouvé";
}
?>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJ6t7v5l7ddbc1ad70c62b2072c47f4f2e32e2b8c6c6d538118e14cf3f62" crossorigin="anonymous">
    <link rel="stylesheet" href="/../../src/css/style.css">
</head>
<main>
<body>
    <!-- Conteneur principal -->
    <div class="container mt-5">
        <h1 class="text-center mb-4">Ajouter un commentaire</h1>

        <!-- Formulaire avec Bootstrap -->
        <form action="/../../../api/comments/create.php" method="post">
            <div class="mb-3">
                <label for="pseudo" class="form-label">Pseudo</label>
                <input type="text" class="form-control" id="pseudo" name="pseudo" value="<?= htmlspecialchars($pseudoMembre) ?>" readonly>
            </div>

            <div class="mb-3">
                <label for="titre" class="form-label">Titre de l'article</label>
                <input type="text" class="form-control" id="titre" name="titre" value="<?= htmlspecialchars($titreArticle) ?>" readonly>
            </div>

            <div class="mb-3">
                <label for="commentaire" class="form-label">Votre commentaire</label>
                <textarea id="commentaire" name="libCom" class="form-control" rows="4" required></textarea>
            </div>

            <input type="hidden" name="numArt" value="<?= $idArticle ?>">
            <input type="hidden" name="numMemb" value="<?= $idMembre ?>">

            <button type="submit" class="btn btn-primary w-100">Envoyer le commentaire</button>
        </form>
    </div>

    <!-- Inclusion de la JS de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0QhRfPauOXj6Ai7t9O3yAoe59FOwPJlZqgUgkld1YOtCqR5x" crossorigin="anonymous"></script>
</body>
</main>
</html>
