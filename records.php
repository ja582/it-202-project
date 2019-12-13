<?php

include("blade/header.php");
require("config.php");
$user_idN = $_SESSION['user']['id'];

$conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";
$db = new PDO($conn_string, $username, $password);
$sql = "SELECT `id`, `place`, `wager`, `game`, `user_id` FROM `Records` WHERE `user_id` = (:user_id) ";
$stmt = $db->prepare($sql);
$r = $stmt->execute(array(":user_id"=>$user_idN));
$results = $stmt->fetchAll();

?>
<head>
    <title>Game Records</title>
</head>

    <a href="dashboard.php"><?php echo $lang['title_dash'] ?></a>
    <br>
    <p><?php echo $lang['rec_desc']; ?></p>
<?php foreach($results as $index=>$row): ?>
    <div class="row">
        <div class="col">
            <?php echo "Game id ".$row['id'];?>
        </div>
        <div class="col">
            <?php echo $row['place'];?>
        </div>
        <div class="col">
            <?php echo "$".$row['wager'];?>
        </div>
        <div class="col">
            <?php echo $row['game'];?>
        </div>
    </div>
<?php endforeach;?>
</div>

<?php
include_once("blade/footer.php");
?>
