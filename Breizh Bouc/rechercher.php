<?php
$css = array('search');
include __DIR__ . "/components/header.php";
?>
    <main>
        <?php
function findUser($search)
{
    $search = "%$search%";
    $query = "SELECT `uid`, `username`, `profil_picture`, `profil_banner` FROM uprofils WHERE `username` LIKE ?";
    $stmt = MysqlConnect::getInstance()->link->prepare($query);
    $stmt->bind_param('s', $search);
    $stmt->execute();
    $result = $stmt->get_result();
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->fetch();
    $stmt->close();
    return $rows;
}
$users = array();
if (isset($_GET['rechercher'])) {
    $users = findUser($_GET['rechercher']);
}
foreach($users as $user) {
    ?>
    <div class="row">
        <a href="profil.php?uid=<?=$user['uid']?>">
            <div class="offset-1 col-10 shadow mt-1 rouded border">
                <div style="
                    background-image: url(<?=$user['profil_banner']?>);
                    height: 200px;
                    background-position: center;
                " class="rcol-12 ounded m-1"></div>
                <div class="row">
                    <div class="offset-1 col-2 border">
                        <img class="profil_picture" src="<?=$user['profil_picture']?>">
                    </div>
                    <div class="col-8 border">
                        <p><?=$user['username']?></p>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <?php
}
?>
</main>
</body>
</html>
