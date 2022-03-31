
<body id=back>
    <main class="container">
        <div class="row">
            <div class="col">
                <div>
                <?php
                include __DIR__ . "/components/form-publication.php";
                ?>
                </div>
                <?php

$query= "SELECT id,texte,username,profil_picture,sending_date,aime,unlike,non
FROM `publication` 
INNER JOIN uprofils ON publication.user_id = uprofils.uid order by sending_date desc";
$stmt = MysqlConnect::getInstance()->link->prepare($query);
$stmt->execute();
$stmt->bind_result($pid,$texte,$username,$profil_picture,$sending_date,$like,$unlike,$fuck);

// $query= "SELECT
// sum(reaction_type = 1) as `like`,
// sum(reaction_type = 2) as `unlike`,
// sum(reaction_type = 3) as `fuck`
// FROM `reactions` 
// WHERE reactions.pid = ?";
// $reactStmt = MysqlConnect::getInstance()->link->prepare($query);

while ($stmt->fetch()) {

include __DIR__ . "/components/publication.php";


}

            ?>
        </div>
    </main>
