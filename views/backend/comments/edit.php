<?php
include '../../../header.php';

if(isset($_GET['numCom'])){
    $numCom = $_GET['numCom'];
    $libCom = sql_select("comment", "libCom", "numCom = $numCom")[0]['libCom'];
}
?>

<!-- Bootstrap form to create a new statut -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>modification Com</h1>
        </div>
        <div class="col-md-12">
            <!-- Form to create a new statut -->
            <form action="<?php echo ROOT_URL . '/api/comments/update.php' ?>" method="post">
                <div class="form-group">
                    <label for="libCom">Nom du commentaire</label>
                    <input id="numCom" name="numCom" class="form-control" style="display: none" type="text" value="<?php echo ($numCom); ?>" readonly="readonly" />
                    <input id="libCom" name="libCom" class="form-control" type="text" value="<?php echo ($libCom); ?>"/>
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
