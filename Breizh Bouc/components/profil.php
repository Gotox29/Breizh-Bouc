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
    <div style="
                    background-image: url(<?=$banner?>);
                    height: 200px;
                    background-position: center;
                " class="rcol-12 rounded mt-1"></div>
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
$reactions = getReactionsType();

$query= "SELECT id,texte,username,profil_picture,sending_date,aime,unlike,non FROM `publication` INNER JOIN uprofils ON publication.user_id = uprofils.uid where user_id = ? order by sending_date desc";
$stmt = MysqlConnect::getInstance()->link->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->bind_result($pid,$texte,$username,$profil_picture,$sending_date,$aime,$unlike,$non);


$query= "SELECT
sum(reaction_type = 1) as `like`,
sum(reaction_type = 2) as `unlike`,
sum(reaction_type = 3) as `fuck`
FROM `reactions` 
WHERE reactions.pid = ?";
$reactStmt = MysqlConnect::getInstance()->link->prepare($query);
$reactStmt->bind_param('i', $pid);

while ($stmt->fetch()) {

    include __DIR__ . "/components/publication.php";

}
?>


</main>
</body>
</html>
