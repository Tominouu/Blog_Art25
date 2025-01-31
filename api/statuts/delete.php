<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once '../../functions/ctrlSaisies.php';

header('Content-Type: application/json');

try {
    if (!isset($_POST['numStat'])) {
        throw new Exception("Aucun statut sélectionné.");
    }
    
    $numStat = ctrlSaisies($_POST['numStat']);

    // Exécution de la suppression
    sql_delete('STATUT', "numStat = $numStat");

    echo json_encode(["success" => true, "message" => "Statut supprimé avec succès."]);
    exit();

} catch (PDOException $e) {
    if ($e->getCode() == '23000') {
        echo json_encode(["success" => false, "message" => "Impossible de supprimer ce statut car il est encore utilisé."]);
    } else {
        echo json_encode(["success" => false, "message" => "Une erreur est survenue lors de la suppression."]);
    }
    exit();
} catch (Exception $e) {
    echo json_encode(["success" => false, "message" => $e->getMessage()]);
    exit();
}
