<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
    <title>Breizh Bouc</title>
</head>
<body>
<header>
    <div class="row">
        <div class="col-1">
            <a href="index.php">
                <img src="images/logo-breton.png"width="60px" height="60px" alt="Logo Breizh Bouc">
            </a>
        </div>
        <div class="col-10">
            <form class="search" method="GET" action="rechercher.php">
                <input type="text" class="form-control" placeholder="Rechercher" name="rechercher">
            </form>
        </div>
        <div class="col-1 text-end">
            <?php
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    ?>
    <a href="profil.php" class="onglet" title="voir mon profil">
        <div id="grid_connexion">
            <img src="images/profile.png" width="60px" height="60px">
        </div>
    </a>
    <?=$username?>
<?php
} else {
    ?>
<a href="connexion.php" class="onglet">
    <div id="grid_connexion">
        <img src="images/profile.png" width="60px" height="60px" alt="image profile">
    </div>
</a>
<?php
}
?>
        </div>
    </div>
</header>
