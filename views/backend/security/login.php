<?php
include '../../../header.php';

?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center">Connexion</h2>
            <form action="<?php echo ROOT_URL . '/api/security/login.php'; ?>" method="post">
                <!-- Pseudo -->
                <div class="form-group">
                    <label for="pseudo">Pseudo</label>
                    <input type="text" id="pseudo" name="pseudo" class="form-control" required>
                </div>
                <br>
                <!-- Mot de passe -->
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>
                <br>
                <!-- Bouton de connexion -->
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary">Se connecter</button>
                </div>
                <br>
                <!-- Message d'erreur -->
                <?php if (isset($_GET['error'])): ?>
                    <div class="alert alert-danger text-center">
                        <?php echo htmlspecialchars($_GET['error']); ?>
                    </div>
                <?php endif; ?>
            </form>
        </div>
    </div>
</div>

