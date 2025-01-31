<?php
include '../../../header.php';

if(isset($_GET['numStat'])){
    $numStat = $_GET['numStat'];
    $libStat = sql_select("STATUT", "libStat", "numStat = $numStat")[0]['libStat'];
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Suppression Statut</h1>
        </div>
        <div class="col-md-12">
            <form id="deleteForm">
                <div class="form-group">
                    <label for="libStat">Nom du statut</label>
                    <input type="hidden" id="numStat" name="numStat" value="<?php echo $numStat; ?>" />
                    <input id="libStat" name="libStat" class="form-control" type="text" value="<?php echo $libStat; ?>" readonly disabled />
                </div>
                <br />
                <div class="form-group mt-2">
                    <a href="list.php" class="btn btn-primary">Retour à la liste</a>
                    <button type="submit" class="btn btn-danger">Confirmer suppression</button>
                </div>
                <br />
                <!-- Message d'erreur / succès -->
                <div id="message" class="alert" style="display: none;"></div>
            </form>
        </div>
    </div>
</div>

<script>
document.getElementById("deleteForm").addEventListener("submit", function(event) {
    event.preventDefault();

    let formData = new FormData();
    formData.append("numStat", document.getElementById("numStat").value);

    fetch("<?php echo ROOT_URL . '/api/statuts/delete.php' ?>", {
        method: "POST",
        body: formData
    })
    .then(response => {
        return response.json(); 
    })
    .then(data => {
        console.log("Réponse reçue:", data);

        let messageDiv = document.getElementById("message");
        messageDiv.style.display = "block";
        if (data.success) {
            messageDiv.className = "alert alert-success";
            messageDiv.innerText = data.message;
            setTimeout(() => {
                window.location.href = "list.php";
            }, 2000);
        } else {
            messageDiv.className = "alert alert-danger";
            messageDiv.innerText = data.message;
        }
    })
    .catch(error => {
        console.error("Erreur Fetch:", error);
        let messageDiv = document.getElementById("message");
        messageDiv.style.display = "block";
        messageDiv.className = "alert alert-danger";
        messageDiv.innerText = "Impossible de supprimer ce statut.";
    });
});
</script>
