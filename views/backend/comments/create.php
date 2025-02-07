<?php
include '../../../header.php';
$articles = sql_select("ARTICLE", "*");
$membres = sql_select("MEMBRE", "*");
?>


<link rel="stylesheet" href="/../../src/css/style.css">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Création nouveau de Commentaires</h1>
        </div>
        <div class="col-md-12">
        <!-- Formulaire -->
        <form action="<?php echo ROOT_URL . '/api/comments/create.php' ?>" method="post">
                <div class="form-group">
                    <label for="libCom">Commentaires</label>
                    <input id="libCom" name="libCom" class="form-control" type="text" autofocus="autofocus" />
                </div>
                <div class="form-group">
                    <label for="numArt">Article</label>
                    <select id="numArt" name="numArt" class="form-control">
                        <option value="">Sélectionnez un article</option>
                        <?php foreach ($articles as $article) { ?>
                            <option value="<?php echo $article['numArt']; ?>">
                                <?php echo htmlspecialchars($article['libTitrArt']); ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="numMemb">Article</label>
                    <select id="numMemb" name="numMemb" class="form-control">
                        <option value="">Sélectionnez un membre</option>
                        <?php foreach ($membres as $membre) { ?>
                            <option value="<?php echo $membre['numMemb']; ?>">
                                <?php echo htmlspecialchars($membre['pseudoMemb']); ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <br/>
                <div class="form-group mt-2">
                    <a href="list.php" class="btn btn-primary">List</a>
                    <button type="submit" class="btn btn-success">Confirmer create ?</button>
                </div>
            </form>
        </div>
    </div>
</div>
