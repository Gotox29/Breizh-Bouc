<?php
if (empty(session_id()) ) session_start(); 
ob_start();
include_once "MysqlConnect.php";
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
    <?php
if (isset($css)) {
    foreach ($css as $key => $file) {
        echo '<link rel="stylesheet" href="' . $file . '.css">';
    }
}
?>
    <script src="script.js"></script>
    <?php
if (isset($scriptJS)) {
    foreach ($scriptJS as $key => $file) {
        echo ' <script src="' . $file . '.js"></script>';
    }
}
$title = "";
if (isset($pageTitle)) {
    $title = " - $pageTitle";
}
?>
    <title>Breizh Bouc<?=$title?></title>
</head>
<body class="mt-5 pt-5">
<header class="fixed-top bg-dark text-light shadow">
    <div class="row align-items-center">
        <div class="col-3">
            <a href="index.php">
                <img src="images/logo-breton.png" class="m-2 rounded-circle" width="60px" height="60px" alt="Logo Breizh Bouc">
            </a>
        </div>
        <div class="col-6">
            <form class="search" method="GET" action="rechercher.php">
                <input type="text" class="form-control" placeholder="Rechercher" name="rechercher">
            </form>
        </div>
        <div class="col-3 text-end">
            <?php
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    ?>
    <div class="dropdown">
        <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                <?=$username?>
                <img src="images/profile.png" width="60px" height="60px">
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="profil.php">Mon profile</a></li>
            <li><a class="dropdown-item" href="deconnexion.php">Se deconnecter</a></li>
        </ul>
        </div>
    <!-- <a href="profil.php" class="onglet" title="voir mon profil">
        <div id="grid_connexion">
            
        </div>
    </a> -->
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
