<?php
include '../../../header.php';

if(isset($_GET['numMemb'])){
    $numMemb = $_GET['numMemb'];
    $prenomMemb = sql_select("membre", "prenomMemb", "numMemb = $numMemb")[0]['prenomMemb'];
    $nomMemb = sql_select("membre", "nomMemb", "numMemb = $numMemb")[0]['nomMemb'];
    $pseudoMemb = sql_select("membre", "pseudoMemb", "numMemb = $numMemb")[0]['pseudoMemb'];
    $passMemb = sql_select("membre", "passMemb", "numMemb = $numMemb")[0]['passMemb'];
    $eMailMemb = sql_select("membre", "eMailMemb", "numMemb = $numMemb")[0]['eMailMemb'];
    $dtCreaMemb = sql_select("membre", "dtCreaMemb", "numMemb = $numMemb")[0]['dtCreaMemb'];
    $numStat = sql_select("membre", "numStat", "numMemb = $numMemb")[0]['numStat'];
}
?>

<!-- Bootstrap form to create a new statut -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Modification statut</h1>
        </div>
        <div class="col-md-12">
            <!-- Form to create a new statut -->
            <form action="<?php echo ROOT_URL . '/api/members/update.php' ?>" method="post">
                <div class="form-group">
                    <label for="prenomMemb">Prénom</label>
                    <input id="numMemb" name="numMemb" class="form-control" style="display: none" type="text" value="<?php echo($numMemb); ?>" readonly="readonly" />
                    <input id="prenomMemb" name="prenomMemb" class="form-control" type="text" value="<?php echo($prenomMemb);  ?>"/>
                </div>
                <div class="form-group">
                    <label for="nomMemb">Nom</label>
                    <input id="numMemb" name="numMemb" class="form-control" style="display: none" type="text" value="<?php echo($numMemb); ?>" readonly="readonly" />
                    <input id="nomMemb" name="nomMemb" class="form-control" type="text" value="<?php echo($nomMemb);  ?>"/>
                </div>
                <div class="form-group">
                    <label for="pseudoMemb">Pseudo</label>
                    <input id="numMemb" name="numMemb" class="form-control" style="display: none" type="text" value="<?php echo($numMemb); ?>" readonly="readonly" />
                    <input id="pseudoMemb" name="pseudoMemb" class="form-control" type="text" value="<?php echo($pseudoMemb);  ?>"/>
                </div>
                <div class="form-group">
                    <label for="pseudoMemb">Mot de Passe</label>
                    <input id="numMemb" name="numMemb" class="form-control" style="display: none" type="text" value="<?php echo($numMemb); ?>" readonly="readonly" />
                    <input id="passMemb" name="passMemb" class="form-control" type="text" value="<?php echo($passMemb);  ?>"/>
                </div>
                <div class="form-group">
                    <label for="eMailMemb">Mail</label>
                    <input id="numMemb" name="numMemb" class="form-control" style="display: none" type="text" value="<?php echo($numMemb); ?>" readonly="readonly" />
                    <input id="eMailMemb" name="eMailMemb" class="form-control" type="text" value="<?php echo($eMailMemb);  ?>"/>
                </div>
                <div class="form-group">
                    <label for="numStat">Statut</label>
                    <input id="numMemb" name="numMemb" class="form-control" style="display: none" type="text" value="<?php echo($numMemb); ?>" readonly="readonly" />
                    <input id="numStat" name="numStat" class="form-control" type="text" value="<?php echo($numStat);  ?>"/>
                </div>
                <br />
                <div class="form-group mt-2">
                    <a href="list.php" class="btn btn-primary">List</a>
                    <button type="submit" class="btn btn-success">Confirmer la modification ?</button>
                </div>
            </form>
        </div>
    </div>
</div>
