<?php
include '../../../header.php';
// Vérifie si l'utilisateur est connecté, sinon redirige vers la page de login
if (!isset($_SESSION['pseudoMemb'])) {
    header("Location: " . ROOT_URL . "/views/backend/security/login.php");
    exit();
}
?>

<!-- Bootstrap form to create a new statut -->
<link rel="stylesheet" href="/../../src/css/style.css">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Création nouveau Statut</h1>
        </div>
        <div class="col-md-12">
            <!-- Form to create a new statut -->
            <form action="<?php echo ROOT_URL . '/api/statuts/create.php' ?>" method="post">
                <div class="form-group">
                    <label for="libStat">Nom du statut</label>
                    <input id="libStat" name="libStat" class="form-control" type="text" autofocus="autofocus" />
                </div>
                <br />
                <div class="form-group mt-2">
                    <a href="list.php" class="btn btn-primary">List</a>
                    <button type="submit" class="btn btn-success">Confirmer create ?</button>
                </div>
            </form>
        </div>
    </div>
</div>