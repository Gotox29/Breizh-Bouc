
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
$query= "SELECT texte,users.username FROM `publication` INNER JOIN users ON publication.user_id = users.id order by uid desc";
$stmt = MysqlConnect::getInstance()->link->prepare($query);
$stmt->execute();
$stmt->bind_result($texte, $username);

while ($stmt->fetch()) {

include __DIR__ . "/components/publication.php";


}

            ?>
        </div>
    </main>
