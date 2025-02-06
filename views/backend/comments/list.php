<?php
include '../../../header.php'; // contains the header and call to config.php

//Load all statuts
$comments = sql_select("comment", "*");
$articles = sql_select("article", "*");
$membres = sql_select("membre", "*");
if(isset($_GET['numCom'])){
    $numCom = $_GET['numCom'];
    $dtCreaCom = sql_select("comment", "dtCreaCom", "numCom = $numCom")[0]['dtCreaCom'];
    $libCom = sql_select("comment", "libCom", "numCom = $numCom")[0]['libCom'];
    $dtModCom = sql_select("comment", "dtModCom", "numCom = $numCom")[0]['dtModCom'];
    $attModOK = sql_select("comment", "attModOK", "numCom = $numCom")[0]['attModOK'];
    $notifComKOAff = sql_select("comment", "notifComKOAff", "numCom = $numCom")[0]['notifComKOAff'];
    $dtDelLogCom = sql_select("comment", "dtDelLogCom", "numCom = $numCom")[0]['dtDelLogCom'];
    $delLogiq = sql_select("comment", "delLogiq", "numCom = $numCom")[0]['delLogiq'];
    $numArt = sql_select("comment", "numArt", "numCom = $numCom")[0]['numArt'];
    $numMemb = sql_select("comment", "numMemb", "numCom = $numCom")[0]['numMemb'];

    $pseudoMemb = sql_select("membre", "pseudoMemb", "numMemb = $numMemb")[0]['pseudoMemb'];
    $libTitrArt = sql_select("article", "libTitrArt", "numArt = $numArt")[0]['libTitrArt'];
    $parag1Art = sql_select("article", "parag1Art", "numArt = $numArt")[0]['parag1Art'];
}
?>

<!-- Bootstrap default layout to display all statuts in foreach -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
    <div class="row">
        <div class="col-md-12">
            <hr style="border-top: 10px solid #000000;">
            <h1 class="titre text-start" style="margin-left: 10rem;">Commentaires</h1>
            <hr style="border-top: 10px solid #000000;">
            <br>
        </div>
        <div class="col-md-2" style="margin: 0.5rem 1rem;">
            <a href="create.php" class="btn btn-success">Create</a>
        </div>
        <h1 class="titre text-start" style="margin: 2rem 10rem 2rem 10rem;">Commentaires en attente</h1>
                <thead>
                    <tr>
                        <th>Titre Article</th>
                        <th>Pseudo</th>
                        <th>Date</th>
                        <th>Contenu</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                        <?php  
                        foreach($comments as $comment ){
                            if ($comment['attModOK'] == 0 && $comment['delLogiq'] == 0){?> 
                                <?php ?> 
                                    <tr>
                                        <?php $idm = $comment['numMemb'] ?>
                                        <?php $idn = $comment['numArt'] ?>
                                        <td><?php echo ($articles[$idn-1]['libTitrArt']); ?></td>
                                        <td><?php echo ($membres[$idm-1]['pseudoMemb']); ?></td>
                                        <td><?php echo($comment['dtCreaCom']); ?></td>
                                        <td><?php echo($comment['libCom']); ?></td>
                                        <td>
                                            <a href="edit - ATTENTE MODIFICATION.php?numCom=<?php echo($comment['numCom']); ?>" class="btn btn-outline-warning">Edit</a>
                                        </td>
                                        <td>
                                            <a href="edit - CONTROLLER MODIFICATION.php?numCom=<?php echo($comment['numCom']); ?>" class="btn btn-outline-primary">Controller</a>
                                        </td>
                                    </tr>
                        <?php }} ?>
                </tbody>
                
            </table>
            
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
    <div class="row">
        <h1 class="titre text-start" style="margin: 2rem 10rem 2rem 10rem;">Commentaires contrôlés</h1>

                <thead>
                    <tr>
                        <th>Pseudo</th>
                        <th>Dernière modif</th>
                        <th>Contenu</th>
                        <th>Publication</th>
                        <th>Raison Refus</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                        <?php  foreach($comments as $comment){ 
                            if ($comment['attModOK'] == 1 && $comment['delLogiq'] == 0){?> 
                                <?php ?> <tr>
                                    <?php $idm = $comment['numMemb'] ?>
                                    <td><?php echo ($membres[$idm-1]['pseudoMemb']); ?></td>                                    <td><?php echo($comment['dtModCom']); ?></td>
                                    <td><?php echo($comment['libCom']); ?></td>
                                    <td><?php if($comment['delLogiq'] == 0){echo "ACCEPTER";}else{echo "REFUS";}?></td>
                                    <td><?php echo($comment['notifComKOAff']); ?></td>
                                    <td>
                                        <a href="edit - CONTROLLER MODIFICATION.php?numCom=<?php echo($comment['numCom']); ?>" class="btn btn-outline-warning">Edit</a>
                                    </td>
                                    

                                </tr>
                        <?php }} ?>
                </tbody>
            </table>
            
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
    <div class="row">
        <h1 class="titre text-start" style="margin: 2rem 10rem 2rem 10rem;">suppression logique</h1>

                <thead>
                    <tr>
                        <th>Pseudo</th>
                        <th>date suppr logique</th>
                        <th>Contenu</th>
                        <th>Publication</th>
                        <th>Raison refus</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                <?php  foreach($comments as $comment){ 
                            if ($comment['delLogiq'] == 1){?> 
                                <?php ?> <tr>
                                    <?php $idm = $comment['numMemb'] ?>
                                    <td><?php echo ($membres[$idm-1]['pseudoMemb']); ?></td>                                    
                                    <td><?php echo($comment['dtModCom']); ?></td>
                                    <td><?php echo($comment['libCom']); ?></td>
                                    <td><?php if($comment['delLogiq'] == 0){echo "ACCEPTER";}else{echo "REFUS";}?></td>
                                    <td><?php echo($comment['notifComKOAff']); ?></td>
                                    <td>
                                        <a href="edit - SUPPRESION.php?numCom=<?php echo($comment['numCom']); ?>" class="btn btn-outline-warning">Edit</a>
                                    </td>
                                    

                                </tr>
                        <?php }} ?>
                </tbody>
            </table>
            
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
    <div class="row">
        <h1 class="titre text-start" style="margin: 2rem 10rem 2rem 10rem;">suppression physique</h1>

                <thead>
                    <tr>
                        <th>Pseudo</th>
                        <th>Date suppr logique</th>
                        <th>Contenu</th>
                        <th>Publication</th>
                        <th>Raison refus</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                <?php  foreach($comments as $comment){ 
                            if ($comment['delLogiq'] == 1){?> 
                                <?php ?> <tr>
                                    <?php $idm = $comment['numMemb'] ?>
                                    <td><?php echo ($membres[$idm-1]['pseudoMemb']); ?></td>                                    <td><?php echo($comment['dtModCom']); ?></td>
                                    <td><?php echo($comment['libCom']); ?></td>
                                    <td><?php if($comment['delLogiq'] == 0){echo "ACCEPTER";}else{echo "REFUS";}?></td>
                                    <td><?php echo($comment['notifComKOAff']); ?></td>
                                    <td>
                                        <a href="delete.php?numCom=<?php echo($comment['numCom']); ?>" class="btn btn-outline-danger">Delete</a>
                                    </td>
                                    

                                </tr>
                        <?php }} ?>
                </tbody>
            </table>
            
        </div>
    </div>
</div>

<?php
include '../../../footer.php'; // contains the footer
