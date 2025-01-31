<?php
include '../../../header.php';
?>

<!-- Bootstrap form to create a new motcle -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Création nouveau Membre</h1>
        </div>
        <div class="col-md-12">
            <!-- Form to create a new motcle -->
            <form action="<?php echo ROOT_URL . '/api/members/create.php' ?>" method="post">
                <div class="form-group">
                    <label for="prenomMemb">Nom des Membres</label>
                    <input id="prenomMemb" name="prenomMemb" class="form-control" type="text" autofocus="autofocus" />
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