
<main class="container">
    <div class="row">
        <div class="col">
            <div>
                <?php
                include __DIR__ . "/components/form-publication.php";
            ?>
            </div>
                <?php
            //for ($i = 0; $i < 10; $i++) {
              //  include __DIR__ . "/components/publication.php";


           //}
$query= "SELECT texte,users.username,uid,aime,unlike,non FROM `publication` INNER JOIN users ON publication.user_id = users.id order by uid desc";
$stmt = MysqlConnect::getInstance()->link->prepare($query);
$stmt->execute();
$stmt->bind_result($texte, $username, $uid,$aime,$unlike,$non);

while ($stmt->fetch()) {

include __DIR__ . "/components/publication.php";


}

            ?>
        </div>
    </div>
</main>
