<?php
include '../../../header.php';

if(isset($_GET['numMemb'])){
    $numMemb = $_GET['numMemb'];
    $prenomMemb = sql_select("membre", "prenomMemb", "numMemb = $numMemb")[0]['prenomMemb'];
    $nomMemb = sql_select("membre", "nomMemb", "numMemb = $numMemb")[0]['nomMemb'];
    $pseudoMemb = sql_select("membre", "pseudoMemb", "numMemb = $numMemb")[0]['pseudoMemb'];
    $passMemb = sql_select("membre", "passMemb", "numMemb = $numMemb")[0]['passMemb'];
    $eMailMemb = sql_select("membre", "eMailMemb", "numMemb = $numMemb")[0]['eMailMemb'];
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Modification Membre</h1>
        </div>
        <div class="col-md-12">
            <form action="<?php echo ROOT_URL . '/api/members/update.php' ?>" method="post">
                <fieldset>
                    <legend>Informations du Membre</legend>
                    <div class="form-group">
                        <label for="prenomMemb">Prénom</label>
                        <input id="prenomMemb" name="prenomMemb" class="form-control" type="text" value="<?php echo $prenomMemb; ?>"/>
                    </div>
                    <div class="form-group">
                        <label for="nomMemb">Nom</label>
                        <input id="nomMemb" name="nomMemb" class="form-control" type="text" value="<?php echo $nomMemb; ?>"/>
                    </div>
                    <div class="form-group">
                        <label for="pseudoMemb">Pseudo</label>
                        <input id="pseudoMemb" name="pseudoMemb" class="form-control" type="text" value="<?php echo $pseudoMemb; ?>"/>
                    </div>
                    <div class="form-group">
                        <label for="passMemb">Password</label>
                        <input id="passMemb" name="passMemb" class="form-control" type="text" value="<?php echo $passMemb; ?>"/>
                    </div>
                    <div class="form-group">
                        <label for="eMailMemb">Mail</label>
                        <input id="eMailMemb" name="eMailMemb" class="form-control" type="email" value="<?php echo $eMailMemb; ?>"/>
                    </div>
                </fieldset>
                <br />
                <div class="form-group mt-2">
                    <a href="list.php" class="btn btn-primary">Edit</a>
                    <button type="submit" class="btn btn-danger">Confirmer update ?</button>
                </div>
            </form>
        </div>
    </div>
</div>
