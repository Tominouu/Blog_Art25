<?php
include '../../../header.php';

if(isset($_GET['numArt'])){
    $numArt = $_GET['numArt'];
    $libTitrArt = sql_select("ARTICLE", "libTitrArt", "numArt = $numArt")[0]['libTitrArt'];
    $libTitrArt = sql_select("ARTICLE", "libTitrArt", "numArt = $numArt")[0]['libTitrArt'];
    $libChapoArt = sql_select("ARTICLE", "libChapoArt", "numArt = $numArt")[0]['libChapoArt'];
    $libAccrochArt = sql_select("ARTICLE", "libAccrochArt", "numArt = $numArt")[0]['libAccrochArt'];
    $parag1Art = sql_select("ARTICLE", "parag1Art", "numArt = $numArt")[0]['parag1Art'];
    $libSsTitr1Art = sql_select("ARTICLE", "libSsTitr1Art", "numArt = $numArt")[0]['libSsTitr1Art'];
    $parag2Art = sql_select("ARTICLE", "parag2Art", "numArt = $numArt")[0]['parag2Art'];
    $libSsTitr2Art = sql_select("ARTICLE", "libSsTitr2Art", "numArt = $numArt")[0]['libSsTitr2Art'];
    $parag3Art = sql_select("ARTICLE", "parag3Art", "numArt = $numArt")[0]['parag3Art'];
    $libConclArt = sql_select("ARTICLE", "libConclArt", "numArt = $numArt")[0]['libConclArt'];
    $urlPhotArt = sql_select("ARTICLE", "urlPhotArt", "numArt = $numArt")[0]['urlPhotArt'];
    $article = sql_select('ARTICLE', '*', "numArt = '$numArt'")[0];


}
?>

<!-- Bootstrap form to create a new statut -->
<link rel="stylesheet" href="/../../src/css/style.css">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Suppression Article</h1>
        </div>
        <div class="col-md-12">
            <!-- Form to create a new statut -->
            <form action="<?php echo ROOT_URL . '/api/articles/delete.php' ?>" method="post">
                <div class="form-group">
                    <input id="numArt" name="numArt" class="form-control" style="display: none" type="text" value="<?php echo($numArt); ?>" readonly="readonly" />
                    <label for="libTitrArt">Titre</label>                    
                    <input id="libTitrArt" name="libTitrArt" class="form-control" type="text" value="<?php echo($libTitrArt); ?>" readonly="readonly" disabled />
                    <label for="libChapoArt">Chapô</label>
                    <input id="libChapoArt" name="libChapoArt" class="form-control" type="text" value="<?php echo($libChapoArt); ?>" readonly="readonly" disabled />
                    <label for="libAccrochArt">Accroche</label>
                    <input id="libAccrochArt" name="libAccrochArt" class="form-control" type="text" value="<?php echo($libAccrochArt); ?>" readonly="readonly" disabled />
                    <label for="parag1Art">Paragraphe 1</label>
                    <input id="parag1Art" name="parag1Art" class="form-control" type="text" value="<?php echo($parag1Art); ?>" readonly="readonly" disabled />
                    <label for="libSsTitr1Art">Sous titre 1</label>
                    <input id="libSsTitr1Art" name="libSsTitr1Art" class="form-control" type="text" value="<?php echo($libSsTitr1Art); ?>" readonly="readonly" disabled />
                    <label for="parag2Art">Paragraphe 2</label>
                    <input id="parag2Art" name="parag2Art" class="form-control" type="text" value="<?php echo($parag2Art); ?>" readonly="readonly" disabled />
                    <label for="libSsTitr2Art">Sous titre 2</label>
                    <input id="libSsTitr2Art" name="libSsTitr2Art" class="form-control" type="text" value="<?php echo($libSsTitr2Art); ?>" readonly="readonly" disabled />
                    <label for="parag3Art">Paragraphe 3</label>
                    <input id="parag3Art" name="parag3Art" class="form-control" type="text" value="<?php echo($parag3Art); ?>" readonly="readonly" disabled />
                    <label for="libConclArt">Conclusion</label>
                    <input id="libConclArt" name="libConclArt" class="form-control" type="text" value="<?php echo($libConclArt); ?>" readonly="readonly" disabled />
                    <label for="urlPhotArt">Photo</label>
                    <input id="urlPhotArt" name="urlPhotArt" class="form-control" type="text" value="<?php echo($urlPhotArt); ?>" readonly="readonly" disabled />
                    <label>Image actuelle</label><br>
                        <?php if (!empty($article['urlPhotArt'])) : ?>
                            <img src="<?php echo ROOT_URL . '/src/uploads/' . $article['urlPhotArt']; ?>" alt="Image actuelle" width="200">
                        <?php else : ?>
                            <p>Aucune image</p>
                        <?php endif; ?>
                </div>

                <?php
                // Récupérer les numéros des mots-clés associés à cet article
                $motsClesArticle = sql_select('MOTCLEARTICLE', 'numMotCle', "numArt = '$numArt'");

                // Si des mots-clés sont trouvés, on récupère leurs libellés
                $motsClesNoms = [];
                if (!empty($motsClesArticle)) {
                    $motsClesIds = array_column($motsClesArticle, 'numMotCle');
                    if (!empty($motsClesIds)) {
                        $motsClesNoms = sql_select('MOTCLE', 'libMotCle', "numMotCle IN (" . implode(',', $motsClesIds) . ")");
                    }
                }
                ?>

                <!-- Affichage des mots-clés associés avant suppression -->
                <div class="form-group">
                    <label>Mots-clés associés :</label>
                    <?php if (!empty($motsClesNoms)) : ?>
                        <ul class="list-group">
                            <?php foreach ($motsClesNoms as $motCle) : ?>
                                <li class="list-group-item"><?php echo htmlspecialchars($motCle['libMotCle']); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php else : ?>
                        <p class="text-muted">Aucun mot-clé associé à cet article.</p>
                    <?php endif; ?>
                </div>

                <br />
                <div class="form-group mt-2">
                    <a href="list.php" class="btn btn-primary">List</a>
                    <button type="submit" class="btn btn-danger">Confirmer delete ?</button>
                </div>
            </form>
        </div>
    </div>
</div>
