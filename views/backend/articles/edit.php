<?php
include '../../../header.php';

// Vérifie si l'utilisateur est connecté, sinon redirige vers la page de login
if (!isset($_SESSION['pseudoMemb'])) {
    header("Location: " . ROOT_URL . "/views/backend/security/login.php");
    exit();
}

// Récupération de tous les articles
$articles = sql_select('ARTICLE', 'numArt, libTitrArt');

// Vérifier si un article a été sélectionné
$numArt = isset($_GET['numArt']) ? $_GET['numArt'] : null;
$article = null;

if ($numArt) {
    // Récupération des informations de l'article sélectionné
    $article = sql_select('ARTICLE', '*', "numArt = '$numArt'")[0];
}

// Récupération des thématiques
$thematiques = sql_select('THEMATIQUE', '*');
?>
<link rel="stylesheet" href="/../../src/css/style.css">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Modifier un article</h1>
        </div>

        <!-- Sélection de l'article à modifier -->
        <div class="col-md-12">
            <form method="GET" action="edit.php">
                <div class="form-group">
                    <label for="selectArticle">Sélectionnez un article</label>
                    <select class="form-control" name="numArt" id="selectArticle">
                        <option value="">-- Choisir un article --</option>
                        <?php foreach ($articles as $art) : ?>
                            <option value="<?php echo $art['numArt']; ?>" 
                                <?php echo ($numArt == $art['numArt']) ? 'selected' : ''; ?>>
                                <?php echo $art['libTitrArt']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <br />
                <button type="submit" class="btn btn-primary">Modifier</button>
            </form>
        </div>

        <!-- Affichage du formulaire SEULEMENT si un article est sélectionné -->
        <?php if ($article) : ?>
            <div class="col-md-12 mt-4">
                <form action="<?php echo ROOT_URL . '/api/articles/update.php' ?>" method="post" enctype="multipart/form-data">
                    
                    <!-- ID caché -->
                    <input type="hidden" name="numArt" value="<?php echo $numArt; ?>">

                    <!-- Titre -->
                    <div class="form-group">
                        <label for="libTitrArt">Titre</label>
                        <input id="libTitrArt" name="libTitrArt" class="form-control" type="text" value="<?php echo $article['libTitrArt']; ?>" autofocus="autofocus" />
                    </div>
                    <br />
                    <!-- Chapô -->
                    <div class="form-group">
                        <label for="libChapoArt">Chapô</label>
                        <input id="libChapoArt" name="libChapoArt" class="form-control" type="text" value="<?php echo $article['libChapoArt']; ?>" />
                    </div>
                    <br />
                    <!-- Accroche -->
                    <div class="form-group">
                        <label for="libAccrochArt">Accroche</label>
                        <input id="libAccrochArt" name="libAccrochArt" class="form-control" type="text" value="<?php echo $article['libAccrochArt']; ?>" />
                    </div>
                    <br/>
                    <!-- Paragraphe 1 -->
                    <div class="form-group">
                        <label for="parag1Art">Paragraphe 1</label>
                        <textarea id="parag1Art" name="parag1Art" class="form-control"><?php echo $article['parag1Art']; ?></textarea>
                    </div>
                    <br />
                    <!-- Sous-titre 1 -->
                    <div class="form-group">
                        <label for="libSsTitr1Art">Sous-titre 1</label>
                        <input id="libSsTitr1Art" name="libSsTitr1Art" class="form-control" type="text" value="<?php echo $article['libSsTitr1Art']; ?>" />
                    </div>
                    <br/>
                    <!-- Paragraphe 2 -->
                    <div class="form-group">
                        <label for="parag2Art">Paragraphe 2</label>
                        <textarea id="parag2Art" name="parag2Art" class="form-control"><?php echo $article['parag2Art']; ?></textarea>
                    </div>
                    <br />
                    <!-- Sous-titre 2 -->
                    <div class="form-group">
                        <label for="libSsTitr2Art">Sous-titre 2</label>
                        <input id="libSsTitr2Art" name="libSsTitr2Art" class="form-control" type="text" value="<?php echo $article['libSsTitr2Art']; ?>" />
                    </div>
                    <br/>
                    <!-- Paragraphe 3 -->
                    <div class="form-group">
                        <label for="parag3Art">Paragraphe 3</label>
                        <textarea id="parag3Art" name="parag3Art" class="form-control"><?php echo $article['parag3Art']; ?></textarea>
                    </div>
                    <!-- Conclusion -->
                    <div class="form-group">
                        <label for="libConclArt">Conclusion</label>
                        <textarea id="libConclArt" name="libConclArt" class="form-control"><?php echo $article['libConclArt']; ?></textarea>
                    </div>

                    <!-- Image actuelle -->
                    <div class="form-group">
                        <label>Image actuelle</label><br>
                        <?php if (!empty($article['urlPhotArt'])) : ?>
                            <img src="<?php echo ROOT_URL . '/src/uploads/' . $article['urlPhotArt']; ?>" alt="Image actuelle" width="200">
                        <?php else : ?>
                            <p>Aucune image</p>
                        <?php endif; ?>
                    </div>

                    <!-- Changer l'image -->
                    <div class="form-group">
                        <label for="urlPhotArt">Changer l'image</label>
                        <input type="file" name="urlPhotArt" class="form-control" id="urlPhotArt" accept="image/*">
                    </div>

                    <!-- Thématique -->
                    <div class="form-group">
                        <label for="numThem">Thématique</label>    
                        <select class="form-select" name="numThem">
                            <?php foreach ($thematiques as $thematique) : ?>
                                <option value="<?php echo $thematique['numThem']; ?>" 
                                    <?php echo ($thematique['numThem'] == $article['numThem']) ? 'selected' : ''; ?>>
                                    <?php echo $thematique['libThem']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Mots-clés -->
                    <div class="form-group">
                        <label>Mots-clés</label>
                        <div>
                            <?php
                            // Récupération de tous les mots-clés disponibles
                            $motsCles = sql_select('MOTCLE', '*');

                            // Récupération des mots-clés déjà associés à l'article
                            $motsClesArticle = sql_select('MOTCLEARTICLE', 'numMotCle', "numArt = '$numArt'");
                            $motsClesAssocies = array_column($motsClesArticle, 'numMotCle'); // Convertir en tableau simple

                            foreach ($motsCles as $motCle) :
                                // Vérifier si ce mot-clé est déjà associé à l'article
                                $checked = in_array($motCle['numMotCle'], $motsClesAssocies) ? 'checked' : '';
                            ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="numMotCle[]" 
                                        value="<?php echo $motCle['numMotCle']; ?>" 
                                        id="motCle_<?php echo $motCle['numMotCle']; ?>" 
                                        <?php echo $checked; ?>>
                                    <label class="form-check-label" for="motCle_<?php echo $motCle['numMotCle']; ?>">
                                        <?php echo $motCle['libMotCle']; ?>
                                    </label>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <br />
                    <div class="form-group mt-2">
                        <a href="list.php" class="btn btn-primary">Retour à la liste</a>
                        <button type="submit" class="btn btn-warning">Confirmer modification</button>
                    </div>
                </form>
            </div>
        <?php endif; ?>
    </div>
</div>
