<main class="container">
        <div class="row">
            <div class="col">
                <div>
                <?php
                include __DIR__ . "/components/form-publication.php";
                ?>
                </div>
                <?php
$query= "SELECT id,user_id,texte,username,profil_picture,sending_date,aime,unlike,non
FROM `publication` 
INNER JOIN uprofils ON publication.user_id = uprofils.uid order by sending_date desc";
$stmt = MysqlConnect::getInstance()->link->prepare($query);
$stmt->execute();
$stmt->bind_result($pid,$user_id,$texte,$username,$profil_picture,$sending_date,$like,$unlike,$fuck);

while ($stmt->fetch()) {
    include __DIR__ . "/components/publication.php";
}

            ?>
        </div>
    </main>
