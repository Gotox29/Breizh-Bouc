<?php
$css = array("profil");
$pageTitle = "Profile";
include __DIR__ . "/components/header.php";

$isMe = false;
$username = false;
$email = false;
if (isset($_GET['uid'])) {
    $id = $_GET['uid'];
    list($username,$picture,$banner) = userInfo($id);
    if (!$username) {
        die;
    }
} else if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    list($username,$picture,$banner) = userInfo($id);
    $isMe = true;
} else {
    header("location: connexion.php");
    die;
}
?>

<main>
    <img id="banniere" src="<?=$banner?>">
    <!-- <img id="banniere" src="https://i.pinimg.com/originals/26/ae/12/26ae1241ca65ba8e8ff4a4d442c92566.png"> -->

    <div id="nom_prenom">
        <img src="<?=$picture?>" id="photoProfil" alt="Photo de profil">
        <div id="nom_prenom_nav">
            <div id="nom_prenom_content">
                <div id="nom_prenom_content">
                    <p><?=$username?></p>
                    <p><?=$email?></p>
                    <p><?=$email?></p>
                </div>
            </div>
            <?php if ($isMe) { ?>
                <a href="modify.php">
                    <img src="images/parametreProfil.png" alt="Image de parametre" id="photoParametre">
                    <p>Modifier le profil</p>
                </a>
            <?php } ?>
            </div>
        </div>
        
        <div id="amis">
            
            </div>
            
            <div id="modification">
                
                </div>
            <?php if ($isMe) { ?>
            <div class="row mx-5">
                <div class="col">
                    <?php include __DIR__."/components/form-publication.php"; ?>
                </div>
            </div>
            <?php } ?>
<?php


if (isset($_GET['uid'])) {
    $id = $_GET['uid'];
    }

	   $query= "SELECT texte,users.username FROM `publication` INNER JOIN users ON publication.user_id = users.id where user_id = '$id' order by uid desc";
	   $stmt = MysqlConnect::getInstance()->link->prepare($query);
	   $stmt->execute();
	   $stmt->bind_result($texte, $username);

           while ($stmt->fetch()) {

           include __DIR__ . "/components/publication.php";

}
?>


</main>
</body>
</html>
