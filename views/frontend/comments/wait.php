<?php 
require_once '../../../header.php';
sql_connect();

require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
if (isset($_SESSION['user_id'])) {
    $id2 = $_SESSION['user_id'];
}
?>

<form action="commentaire.php" method="GET">
    <!-- Champs cachés pour les IDs -->
    <input type="hidden" name="id1" value="<?php echo $id1; ?>">
    <input type="hidden" name="id2" value="<?php echo $article; ?>">

    <!-- Bouton qui soumet le formulaire -->
    <button type="submit" class="btn btn-primary">Commenter</button>
</form>


