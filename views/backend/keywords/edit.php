<?php
include '../../../header.php';


if(isset($_GET['numMotCle'])){
    $numMotCle = $_GET['numMotCle'];
    $libMotCle = sql_select("motcle", "libMotCle", "numMotCle = $numMotCle")[0]['libMotCle'];
}
?>

<!-- Bootstrap form to create a new statut -->
<link rel="stylesheet" href="/../../src/css/style.css">

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>modification du mot clé</h1>
        </div>
        <div class="col-md-12">
            <!-- Form to create a new statut -->
            <form action="<?php echo ROOT_URL . '/api/keywords/update.php' ?>" method="post">
                <div class="form-group">
                    <label for="libMotCle">Nom du mot clé</label>
                    <input id="numMotCle" name="numMotCle" class="form-control" style="display: none" type="text" value="<?php echo ($numMotCle); ?>" readonly="readonly" />
                    <input id="libMotCle" name="libMotCle" class="form-control" type="text" value="<?php echo ($libMotCle); ?>"/>
                </div>
                <br />
                <div class="form-group mt-2">
                    <a href="list.php" class="btn btn-primary">Edit</a>
                    <button type="submit" class="btn btn-danger">Confirmer update ?</button>
                </div>
            </form>
        </div>
    </div>
</div>
