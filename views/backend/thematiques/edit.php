<?php
include '../../../header.php';

$numThem = isset($_GET['numThem']);
$libThem = '';

if ($numThem) {
    $result = sql_select("THEMATIQUE", "libThem", "numThem = $numThem");
    $libThem = $result[0]['libThem'];
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Modification de la Thematique</h1>
        </div>
        <div class="col-md-12">
            <form action="<?php echo ROOT_URL . '/api/thematiques/update.php' ?>" method="post">
                <div class="form-group">
                    <label for="libStat">Nom du thematique</label>
                    <input id="numThem" name="numThem" class="form-control" style="display: none" type="text" value="<?php echo($numThem); ?>" readonly="readonly" />
                    <input id="libThem" name="libThem" class="form-control" type="text" value="<?php echo($libThem); ?>"/>
                </div>
                <br />
                <div class="form-group mt-2">
                    <a href="list.php" class="btn btn-primary">List</a>
                    <button type="submit" class="btn btn-success">Confirmer update ?</button>
                </div>
            </form>
        </div>
    </div>
</div>