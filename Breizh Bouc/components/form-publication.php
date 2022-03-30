<form class="border shadow rounded mt-4 pb-2" method="POST">
    <div class="row">
        <h2>Creer une publication</h2>
    </div>
    <div class="row p-2">
        <div class="col form-floating">
            <textarea class="form-control" placeholder="Ça raconte quoi ?" name="publication" id="publication" resize="true"></textarea>
            <label class="ms-2" for="publication">Ça raconte quoi ?</label>
        </div>
    </div>
    <div class="row">
        <div class="col d-flex justify-content-around">
       <!--     <img src="images/icons8-image-32.png" alt="logo insert image">
         -->   <button class="btn btn-warning">Publier</button>
        </div>
    </div>
</form>


<?php


function publication($id,$texte){

$query = "INSERT INTO `publication` (`uid`, `texte`, `aime`, `unlike`, `user_id`, `non`) VALUES (NULL, ?, 0, 0, ?, 0)";
$stmt = MysqlConnect::getInstance()->link->prepare($query);
$stmt->bind_param('si', $texte, $id);
$stmt->execute();



}


if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];



if (isset($_POST) && isset($_POST['publication'])){

$texte = $_POST['publication'];

publication($id,$texte);


}
}
?>
