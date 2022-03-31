<?php include __DIR__ . "/components/header.php";
?>
<div class="row">
    <div class="offset-2 col-8">

<?php
function mailIsNotInDatabase($email)
{
    $count = 0;
    $query = "SELECT count(1) as count FROM users WHERE email = ?";
    $stmt = MysqlConnect::getInstance()->link->prepare($query);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();
    if ($count > 0) {
        alert("Erreur : L'email existe déjà.");
        return false;
    }
    return true;
}
function initProfile($uid,$username) {
    $picture = "images/icone.jpg";
    $banner = "images/baniere.jpg";
    $query = "INSERT INTO `uprofils` (`uid`, `username`, `profil_picture`, `profil_banner`) VALUES (?, ?, ?, ?);";
    $stmt = MysqlConnect::getInstance()->link->prepare($query);
    $stmt->bind_param('isss', $uid,$username,$picture,$banner);
    $stmt->execute();
    $count = $stmt->affected_rows;
    $stmt->close();
    if ($count < 1) {
        return false;
    }
    return true;
}
function register($email,$username,$pass)
{
    $pass = md5($pass);
    $time = time();
    $query = "INSERT INTO `users` (`id`, `username`, `email`, `password`, `register`, `last_connection`) VALUES (NULL, ?, ?, ?, ?, ?);";
    $stmt = MysqlConnect::getInstance()->link->prepare($query);
    $stmt->bind_param('sssii',$username,$email,$pass,$time,$time);
    $stmt->execute();
    $count = $stmt->affected_rows;
    $uid = $stmt->insert_id;
    $stmt->close();
    $profil = initProfile($uid,$username);
    if ($count < 1 && !$profil) {
        alert("Erreur : Erreur lors de l'enregistrement.");
        return false;
    }
    return true;
}
function login($email,$pass)
{
    $pass = md5($pass);
    $username = false;
    $id = false;
    $query = "SELECT username, id FROM users WHERE email = ? AND `password` = ?";
    $stmt = MysqlConnect::getInstance()->link->prepare($query);
    $stmt->bind_param('ss', $email, $pass);
    $stmt->execute();
    $stmt->bind_result($username, $id);
    $stmt->fetch();
    $stmt->close();
    if (!$username && !$id && !updateLastLogin($id)) {
        alert("Erreur : Email ou mot de passe invalide.");
        return false;
    }
    return array($username, $id);
}
function updateLastLogin($id) {
    
    $time = time();
    $query = "UPDATE `users` SET `last_connection` = ? WHERE id = ?;";
    $stmt = MysqlConnect::getInstance()->link->prepare($query);
    $stmt->bind_param('ii', $time,$id);
    $stmt->execute();
    $count = $stmt->affected_rows;
    $stmt->close();
    if ($count < 1) {
        alert("Erreur.");
        return false;
    }
    return true;
}
$result = false;
// création de compte
if (isset($_POST) && isset($_POST['mail']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['confirm-password'])) {
    $id = false;
    $mail = $_POST['mail'];
    $username = $_POST['username'];
    $pass = $_POST['password'];
    $confirmPass = $_POST['confirm-password'];
    if (($pass == $confirmPass) && mailIsNotInDatabase($mail)) {
        if (register($mail,$username,$pass) && (list($username, $id) = login($mail, $pass))){
            $result = true;
        } else {
            $result = false;
        }
    }
    // identification
} else if (isset($_POST) && isset($_POST['mail']) && isset($_POST['password'])) {
    $mail = $_POST['mail'];
    $pass = $_POST['password'];
    if (list($username, $id) = login($mail, $pass)) {
        $result = true;
    }
}
if ($result && $id) {
    $_SESSION['username'] = $username;
    $_SESSION['id'] = $id;
    header("location: index.php");
    die;
}?></div></div>

<div id="connexion-creation" class="mt-5">
   <?php
include "cree_compte.php";
?>

    <?php
include "connexion_compte.php";
?>
</div>
</body>
</html>
