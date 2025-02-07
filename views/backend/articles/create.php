<?php
include '../../../header.php';

// Récupération des thématiques depuis la base de données
$thematiques = sql_select('THEMATIQUE', '*');
?>

<link rel="stylesheet" href="/../../src/css/style.css">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Création d'un article</h1>
        </div>
        <div class="col-md-12">
            <form action="<?php echo ROOT_URL . '/api/articles/create.php' ?>" method="post" enctype="multipart/form-data">
                <!-- titre-->
                <div class="form-group">
                    <label for="libTitrArt">Titre</label>
                    <input id="libTitrArt" name="libTitrArt" class="form-control" type="text" autofocus="autofocus" />
                </div>
                <br />
                <!-- chapô -->
                <div class="form-group">
                    <label for="libChapoArt">Chapô</label>
                    <input id="libChapoArt" name="libChapoArt" class="form-control" type="text" autofocus="autofocus" />
                </div>
                <br />
                <!-- accroche-->
                <div class="form-group">
                    <label for="libAccrochArt">Accroche</label>
                    <input id="libAccrochArt" name="libAccrochArt" class="form-control" type="text" autofocus="autofocus" />
                </div>
                <br/>
                <!-- Paragraphe 1 -->
                <div class="form-group">
                    <label for="parag1Art">Paragraphe 1</label>
                    <textarea id="parag1Art" name="parag1Art" class="form-control" type="text" autofocus="autofocus"></textarea>
                </div>
                <br />
                <!-- Sous titre 1 -->
                <div class="form-group">
                    <label for="libSsTitr1Art">Sous titre 1</label>
                    <input id="libSsTitr1Art" name="libSsTitr1Art" class="form-control" type="text" autofocus="autofocus" />
                </div>
                <br/>
                <!-- Paragraphe 2 -->
                <div class="form-group">
                    <label for="parag2Art">Paragraphe 2</label>
                    <textarea id="parag2Art" name="parag2Art" class="form-control" type="text" autofocus="autofocus"></textarea>
                </div>
                <br />
                <!-- Sous titre 2 -->
                <div class="form-group">
                    <label for="libSsTitr2Art">Sous titre 2</label>
                    <input id="libSsTitr2Art" name="libSsTitr2Art" class="form-control" type="text" autofocus="autofocus" />
                </div>
                <br/>
                <!-- Paragraphe 3 -->
                <div class="form-group">
                    <label for="parag3Art">Paragraphe 3</label>
                    <textarea id="parag3Art" name="parag3Art" class="form-control" type="text" autofocus="autofocus"></textarea>
                </div>
                <!-- Conclusion -->
                <div class="form-group">
                    <label for="libConclArt">Conclusion</label>
                    <textarea id="libConclArt" name="libConclArt" class="form-control" type="text" autofocus="autofocus"></textarea>
                </div>
                <!-- Image -->
                <div class="form-group">
                    <label for="urlPhotArt">Ajouter une image</label>
                    <input type="file" name="urlPhotArt" class="form-control" id="urlPhotArt" accept="image/*">
                </div>

                <!-- Mots-clés -->
                <div class="form-group">
                    <label>Mots-clés</label>
                    <div>
                        <?php
                        // Récupération des mots-clés depuis la base de données
                        $motsCles = sql_select('MOTCLE', '*');
                        foreach ($motsCles as $motCle) : ?>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="numMotCle[]" value="<?php echo $motCle['numMotCle']; ?>" id="motCle_<?php echo $motCle['numMotCle']; ?>">
                                <label class="form-check-label" for="motCle_<?php echo $motCle['numMotCle']; ?>">
                                    <?php echo $motCle['libMotCle']; ?>
                                </label>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <br/>
                <!-- Thématique -->
                <div class="form-group">
                    <label for="numThem">Thématique</label>    
                    <select class="form-select" name="numThem">
                        <?php foreach ($thematiques as $thematique) : ?>
                            <option value="<?php echo $thematique['numThem']; ?>">
                                <?php echo $thematique['libThem']; ?>
                            </option>
                        <?php endforeach; ?>
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
