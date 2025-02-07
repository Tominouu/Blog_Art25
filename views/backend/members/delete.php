<?php
include '../../../header.php';

// Vérifie si l'utilisateur est connecté, sinon redirige vers la page de login
if (!isset($_SESSION['pseudoMemb'])) {
    header("Location: " . ROOT_URL . "/views/backend/security/login.php");
    exit();
}

if(isset($_GET['numMemb'])){
    $numMemb = $_GET['numMemb'];
    $nomMemb = sql_select("membre", "nomMemb", "numMemb = $numMemb")[0]['nomMemb'];
    $prenomMemb = sql_select("membre", "prenomMemb", "numMemb = $numMemb")[0]['prenomMemb'];
    $pseudoMemb = sql_select("membre", "pseudoMemb", "numMemb = $numMemb")[0]['pseudoMemb'];
    $passMemb = sql_select("membre", "passMemb", "numMemb = $numMemb")[0]['passMemb'];
    $eMailMemb = sql_select("membre", "eMailMemb", "numMemb = $numMemb")[0]['eMailMemb'];

}
?>

<!-- Bootstrap form to create a new statut -->
<link rel="stylesheet" href="/../../src/css/style.css">

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Suppression du compte</h1>
        </div>
        <div class="col-md-12">
            <!-- Form to create a new statut -->
            <form action="<?php echo ROOT_URL . '/api/members/delete.php' ?>" method="post">
                <div class="form-group">
                    <label for="numMemb">Nom du compte</label>
                    <input id="numMemb" name="numMemb" class="form-control" style="display: none" type="text" value="<?php echo($numMemb); ?>" readonly="readonly" />
                    <input id="nomMemb" name="nomMemb" class="form-control" type="text" value="<?php echo($nomMemb); ?>" readonly="readonly" disabled />
                </div>
                <div class="form-group">
                    <label for="numMemb">Prenom du compte</label>
                    <input id="prenomMemb" name="prenomMemb" class="form-control" type="text" value="<?php echo($prenomMemb); ?>" readonly="readonly" disabled />
                </div>
                <div class="form-group">
                    <label for="numMemb">Pseudo du compte</label>
                    <input id="pseudoMemb" name="pseudoMemb" class="form-control" type="text" value="<?php echo($pseudoMemb); ?>" readonly="readonly" disabled />
                </div>
                <div class="form-group">
                    <label for="numMemb">Mot de passe</label>
                    <input id="passMemb" name="passMemb" class="form-control" type="text" value="<?php echo($passMemb); ?>" readonly="readonly" disabled />
                </div>
                <div class="form-group">
                    <label for="numMemb">Mot de passe</label>
                    <input id="eMailMemb" name="eMailMemb" class="form-control" type="text" value="<?php echo($eMailMemb); ?>" readonly="readonly" disabled />
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
