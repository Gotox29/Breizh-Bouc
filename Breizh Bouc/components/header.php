<?php
if (empty(session_id()) ) session_start(); 
ob_start();
include_once "MysqlConnect.php";
date_default_timezone_set('Europe/Paris');
function intToDateFormat($time, $format = "l j F Y") {
    $english_days = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
    $french_days = array('lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche');
    $english_months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
    $french_months = array('janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre');
    return str_replace($english_months, $french_months, str_replace($english_days, $french_days, date($format,$time) ) );
}
function alert($message)
{
    echo "
    <div class='alert alert-danger' role='alert'>
      $message
    </div>";
}

function getReactionsType()
{
    $query = "SELECT `id`, `label`, `icon` FROM reaction_types";
    $stmt = MysqlConnect::getInstance()->link->set_charset("utf8mb4");;
    $stmt = MysqlConnect::getInstance()->link->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->fetch();
    $stmt->close();
    return $rows;
}
function userInfo($id)
{
    $username = false;
    $picture = false;
    $banner = false;
    $query = "SELECT `username`, `profil_picture`, `profil_banner` FROM uprofils WHERE `uid` = ?";
    $stmt = MysqlConnect::getInstance()->link->prepare($query);
    $stmt->bind_param('s', $id);
    $stmt->execute();
    $stmt->bind_result($username,$picture,$banner);
    $stmt->fetch();
    $stmt->close();
    if (!$username && !$picture && !$banner) {
        alert("Erreur : Utilisateur introuvable.");
        return false;
    }
    return array($username,$picture,$banner);
}
?>
<!DOCTYPE html>
<html lang="fr">
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
<body id="back" class="mt-5 pt-4">
<header class="fixed-top bg-dark text-light shadow">
    <div class="line">

    </div>
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
                <?=htmlspecialchars($username, ENT_QUOTES, 'UTF-8')?>
                <img class="profil"src="images/profile.png" width="60px" height="60px">
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="profil.php">Mon profil</a></li>
            <li><a class="dropdown-item" href="deconnexion.php">Se déconnecter</a></li>
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
        <img class="profil" src="images/profile.png" width="60px" height="60px" alt="image profile">
    </div>
</a>
<?php
}


function like($pid){
    $query = "UPDATE `publication` SET aime = aime+1, last_update=? where id=?";
    // $query = "UPDATE `publication` SET like = 1 where uid=$uid";
    $stmt = MysqlConnect::getInstance()->link->prepare($query);
    $now = time();
    $stmt->bind_param('ii',$now, $pid);
    $stmt->execute();
    
}
function unlike($pid){
    $query = "UPDATE `publication` SET unlike = unlike +1, last_update=? where id=?";
    // $query = "UPDATE `publication` SET like = 1 where uid=$uid";
    $stmt = MysqlConnect::getInstance()->link->prepare($query);
    $now = time();
    $stmt->bind_param('ii',$now, $pid);
    $stmt->execute();
    
}
function fuck($pid){
    $query = "UPDATE `publication` SET non= non+1, last_update=? where id= ?";
    // $query = "UPDATE `publication` SET like = 1 where uid=$uid";
    $stmt = MysqlConnect::getInstance()->link->prepare($query);
    $now = time();
    $stmt->bind_param('ii',$now, $pid);
    $stmt->execute();
    
}
    
    
    if (isset($_POST) && isset($_POST['reaction']) && isset($_POST['pid'])){
    
    $reaction=$_POST['reaction'];
    $pid=$_POST['pid'];

    switch($reaction) {
            case "aime":
            like($pid);
            break;
            case "unlike":
            unlike($pid);
            break;
            case "fuck":
            fuck($pid);
            break;
    }
    
    }
?>
        </div>
    </div>
</header>
