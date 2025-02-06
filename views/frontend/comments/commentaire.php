<?php
include '../../../header.php';
$articles = sql_select("ARTICLE", "*");
$membres = sql_select("MEMBRE", "*");

    if (isset($_GET['id1']) && isset($_GET['id2'])) {
        $article = $_GET['id1'];
        $membre = $_GET['id2'];
        
    } else {
        echo "Veuillez vous connecter pour commenter cet article.";
    }
?>

<!-- Bootstrap form to create a new motcle -->
<link rel="stylesheet" href="src/css/style.css">
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Création d'un nouveau commentaire</h1>
            </div>
            <div class="col-md-12">
                <!-- Form to create a new motcle -->
                <form action="<?php echo ROOT_URL . '/api/comments/create.php' ?>" method="post">
                    <div class="form-group">
                        <label for="libCom">Commentaires</label>
                        <input id="libCom" name="libCom" class="form-control" type="text" autofocus="autofocus" />
                    </div>
                    <div class="form-group">
                        <label for="numArt">Article</label>
                        <select id="numArt" name="numArt" class="form-control">
                            <option value=""><?php $article ?></option>
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
</body>