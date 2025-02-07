<?php
include '../../../header.php';

// Vérifie si l'utilisateur est connecté, sinon redirige vers la page de login
if (!isset($_SESSION['pseudoMemb'])) {
    header("Location: " . ROOT_URL . "/views/backend/security/login.php");
    exit();
}
if(isset($_GET['numStat'])){
    $numStat = $_GET['numStat'];
    $libStat = sql_select("STATUT", "libStat", "numStat = $numStat")[0]['libStat'];
}

?>

<!-- Bootstrap form to create a new statut -->
<link rel="stylesheet" href="/../../src/css/style.css">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>modification Thematique</h1>
        </div>
        <div class="col-md-12">
            <!-- Form to create a new statut -->
            <form action="<?php echo ROOT_URL . '/api/statuts/update.php' ?>" method="post">
                <div class="form-group">
                    <label for="libStat">Nom du Statut</label>
                    <input id="numStat" name="numStat" class="form-control" style="display: none" type="text" value="<?php echo ($numStat); ?>" readonly="readonly" />
                    <input id="libStat" name="libStat" class="form-control" type="text" value="<?php echo ($libStat); ?>"/>
                </div>
                <br />
                <div class="form-group mt-2">
                    <a href="list.php" class="btn btn-primary">Edit</a>
                    <button type="submit" class="btn btn-danger">Confirmer changements ?</button>
                </div>
            </form>
        </div>
    </div>
</div>
