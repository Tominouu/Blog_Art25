<?php
include '../../../header.php';
include 'api/views/backend/secrity/styles-login.css';
include 'api/views/backend/members/list.php'

 
// echo("Form login");
?>


<div class="box">
    <div>
        <label for="Pseudo-login">Pseudo</label>
        <input type="text" name="Pseudo-login" id="Pseudo-login" />
    </div>
    <div>
        <label for="pass-login">Mot de Passe</label>
        <input type="password" name="pass-login" id="pass-login" />
    </div>
    <div class="form-group mt-2">
                    <button type="submit" class="btn btn-primary m-1">Confirmer ?</button>
                </div>
</div>
