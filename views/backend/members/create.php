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
                    <label for="prenomMemb">Prénom</label>
                    <input id="prenomMemb" name="prenomMemb" class="form-control" type="text" autofocus="autofocus" />
                </div>
                <div class="form-group">
                    <label for="nomMemb">Nom</label>
                    <input id="nomMemb" name="nomMemb" class="form-control" type="text" autofocus="autofocus" />
                </div>
                <div class="form-group">
                    <label for="pseudoMemb">Pseudo</label>
                    <input id="pseudoMemb" name="pseudoMemb" class="form-control" type="text" autofocus="autofocus" />
                </div>
                <div class="form-group">
                    <label for="passMemb">Mot de Passe</label>
                    <input id="passMemb" name="passMemb" class="form-control" type="text" autofocus="autofocus" />
                </div>
                <div class="form-group">
                    <label for="eMailMemb">Email</label>
                    <input id="eMailMemb" name="eMailMemb" class="form-control" type="text" autofocus="autofocus" />
                </div>
                <div class="form-group">
                    <label for="numStat">Statut</label>
                    <select id="numStat" name="numStat" class="form-control">
                        <option value="1">Admin</option>
                        <option value="2">Moderateur</option>
                        <option value="2">Membre</option>
                    </select>
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
