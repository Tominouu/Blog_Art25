<?php
include '../../../header.php';

$error = isset($_GET['error']) ? $_GET['error'] : null;
$success = isset($_GET['success']) ? $_GET['success'] : null;
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Créer un compte</h1>
            <?php if ($error): ?>
                <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
            <?php endif; ?>
            <?php if ($success): ?>
                <div class="alert alert-success"><?php echo htmlspecialchars($success); ?></div>
            <?php endif; ?>
        </div>
        <div class="col-md-12">
            <form action="<?php echo ROOT_URL . '/api/security/signup.php' ?>" method="post">
                <!-- Nom -->
                <div class="form-group">
                    <label for="nomMemb">Nom</label>
                    <input id="nomMemb" name="nomMemb" class="form-control" type="text" required />
                </div>
                <br />
                <!-- Prénom -->
                <div class="form-group">
                    <label for="prenomMemb">Prénom</label>
                    <input id="prenomMemb" name="prenomMemb" class="form-control" type="text" required />
                </div>
                <br />
                <!-- Pseudo -->
                <div class="form-group">
                    <label for="pseudoMemb">Pseudo</label>
                    <input id="pseudoMemb" name="pseudoMemb" class="form-control" type="text" required />
                </div>
                <br />
                <!-- Mot de passe -->
                <div class="form-group">
                    <label for="passMemb">Mot de passe</label>
                    <input id="passMemb" name="passMemb" class="form-control" type="password" required />
                </div>
                <br />
                <!-- Email -->
                <div class="form-group">
                    <label for="eMailMemb">Email</label>
                    <input id="eMailMemb" name="eMailMemb" class="form-control" type="email" required />
                </div>
                <br />
                <!-- Statut -->
                <div class="form-group">
                    <label for="numStat">Statut</label>
                    <select class="form-select" name="numStat" required>
                        <option value="3">Membre</option>
                    </select>
                </div>
                <br />
                <div class="form-group mt-2">
                    <a href="login.php" class="btn btn-primary">Déjà un compte ?</a>
                    <button type="submit" class="btn btn-success">Créer un compte</button>
                </div>
            </form>
        </div>
    </div>
</div>
