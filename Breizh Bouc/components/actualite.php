
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
// $reactions = getReactionsType();

/**
 * Pour un poste le programme affiche pour chaque type de réaction, le nombre de réaction
 */
/**SELECT reaction_types.id, publication.id,texte,username,profil_picture,count(reaction_types.id) as nb_avis, reaction_types.icon, reaction_types.label
FROM `reaction_types`
RIGHT JOIN reactions
	ON reactions.reaction_type = reaction_types.id
INNER JOIN publication
	ON  publication.id = reactions.pid
INNER JOIN uprofils
	ON uprofils.uid = publication.user_id

GROUP BY publication.id,reaction_types.id
order by last_update desc; */
// SELECT u.* FROM room u JOIN facilities_r fu ON fu.id_uc = u.id_uc AND u.id_fu IN(4,3) WHERE 1 AND vizibility = 1 GROUP BY id_uc ORDER BY u_premium desc , id_uc desc
// $stmt->bind_result( $pid,$texte,$username,$profil_picture,$aime,$unlike,$non);
$query= "SELECT id,texte,username,profil_picture,sending_date
FROM `publication` 
INNER JOIN uprofils ON publication.user_id = uprofils.uid order by sending_date desc";
$stmt = MysqlConnect::getInstance()->link->prepare($query);
$stmt->execute();
$stmt->bind_result($pid,$texte,$username,$profil_picture,$sending_date);

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
        </div>
    </main>
