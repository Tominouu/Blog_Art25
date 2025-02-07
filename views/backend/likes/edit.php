<?php
include '../../../header.php';


if(isset($_GET['numMemb'])){
    $numMemb = $_GET['numMemb'];
    $numArt = sql_select("likeart", "numArt", "numMemb = $numMemb")[0]['numArt'];
}
?>

<!-- Bootstrap form to create a new likeart -->
<link rel="stylesheet" href="/../../src/css/style.css">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>modification likes</h1>
        </div>
        <div class="col-md-12">
            <!-- Form to create a new likeart -->
            <form action="<?php echo ROOT_URL . '/api/likes/create.php' ?>" method="post">
                <div class="form-group">
                    <label for="numArt">Nom du likeart</label>
                    <input id="numMemb" name="numMemb" class="form-control" style="display: none" type="text" value="<?php echo ($numMemb); ?>" readonly="readonly" />
                    <input id="numArt" name="numArt" class="form-control" type="text" value="<?php echo ($numArt); ?>"/>
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
