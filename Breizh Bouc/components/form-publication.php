<?php
    if (isset($_SESSION['id']) && isset($_POST['publication'])) {
        var_dump($_POST);
    }
?>

<form class="border bg-blue shadow rounded mt-4 pb-2" method="POST">
    <div class="row">
        <h2 class="font-color">Creer une publication</h2>
    </div>
    <div class="row p-2">
        <div class="col form-floating">
            <textarea class="form-control" placeholder="Ça raconte quoi ?" name="publication" id="publication" resize="true"></textarea>
            <label class="ms-2" for="publication">Ça raconte quoi ?</label>
        </div>
    </div>
    <div class="row">
        <div class="col d-flex justify-content-around">
            <img src="images/icons8-image-32.png" alt="logo insert image">
            <button class="btn btn-green font-color">Publier</button>
        </div>
    </div>
</form>
