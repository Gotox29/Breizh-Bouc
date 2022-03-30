<?php include_once __DIR__ . "/components/header.php";
if (!isset($_SESSION['username'])) {
    header("location: connexion.php");
    die;
}
?>
        <?php include "actualite.php";?>    
