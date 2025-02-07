<?php
include '../../../header.php'; // contains the header and call to config.php

// Vérifie si l'utilisateur est connecté, sinon redirige vers la page de login
if (!isset($_SESSION['pseudoMemb'])) {
    header("Location: " . ROOT_URL . "/views/backend/security/login.php");
    exit();
}

//charge tous les likes
$likes = sql_select("likeart", "*");
?>

<!-- Bootstrap default layout to display all statuts in foreach -->
<link rel="stylesheet" href="/../../src/css/style.css">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Gestion des likes</h1>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id Membre</th>
                        <th>Nom de l'article</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($likes as $like){ ?>
                        <tr>
                            <td><?php echo($like['numMemb']); ?></td>
                            <td><?php echo($like['numArt']); ?></td>
                            <td>
                                <a href="edit.php?numArt=<?php echo($like['numArt']); ?>&numMemb=<?php echo($like['numMemb']); ?>"class="btn btn-primary">Edit</a>
                                <a href="delete.php?numArt=<?php echo($like['numArt']); ?>&numMemb=<?php echo($like['numMemb']); ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <a href="create.php" class="btn btn-success">Create</a>
        </div>
    </div>
</div>
<?php
include '../../../footer.php'; // contains the footer