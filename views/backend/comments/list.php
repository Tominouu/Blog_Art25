<?php
include '../../../header.php'; // contains the header and call to config.php

//Load all statuts
$comments = sql_select("comment", "*");
?>

<!-- Bootstrap default layout to display all statuts in foreach -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Commentaires</h1>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>numéro de l'article</th>
                        <th>Date de création</th>
                        <th>Le commentaire</th>
                        <th>Date de modification</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($comments as $comment){ ?>
                        <tr>
                            <td><?php echo($comment['numCom']); ?></td>
                            <td><?php echo($comment['numArt']); ?></td>
                            <td><?php echo($comment['dtCreaCom']); ?></td>
                            <td><?php echo($comment['libCom']); ?></td>
                            <td><?php echo($comment['dtModCom']); ?></td>
                            <td>
                                <a href="edit.php?numCom=<?php echo($comment['numCom']); ?>" class="btn btn-primary">Edit</a>
                                <a href="delete.php?numCom=<?php echo($comment['numCom']); ?>" class="btn btn-danger">Delete</a>
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
