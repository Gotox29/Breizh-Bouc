<?php include_once __DIR__ . "/components/header.php";
if (!isset($_SESSION['username'])) {
    header("location: connexion.php");
    die;
}
?>
    <main>
        <?php include "actualite.php";?>
    </main >
</body>
</html>
