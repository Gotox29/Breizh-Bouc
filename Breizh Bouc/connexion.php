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

<header>
    <?php include("header.php"); ?>
</header>

<body>

<?php
function mailIsNotInDatabase($mail)
{
 return true;
}
function pseudoIsNotInDatabase($pseudo)
{
 return true;
}

?>

    <?php 
    $result = false;
if (isset($_POST)&& isset($_POST['mail']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['confirm-password'])) {
 $mail = $_POST['mail'];
 $pseudo = $_POST['username'];
 $pass = $_POST['password'];
 $confirmPass = $_POST['confirm-password'];
 if ($pass == $confirmPass) {
 $result = true;
 }
 if ($result && mailIsNotInDatabase($mail)) {
 }

}
if ($result){
 $_SESSION['username'] = $pseudo;
 header("location: index.php");
 die;
} else {

}?>

<div id="connexion-creation">
   <?php
    include("cree_compte.php");
    ?> 
    
    <?php 
    include("connexion_compte.php");
    ?>
</div>
</body>