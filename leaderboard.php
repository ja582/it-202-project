<?php

include("blade/header.php");
require("config.php");
$conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";
$db = new PDO($conn_string, $username, $password);
$sql = "SELECT * FROM `Users` ORDER BY `bal` DESC LIMIT 10";
$stmt = $db->prepare($sql);
$r = $stmt->execute();
$results = $stmt->fetchAll();

$x = 1;
?>
    <head>
        <title>Leaderboards</title>
    </head>

    <a href="dashboard.php"><?php echo $lang['title_dash'] ?></a>
    <br>
    <p><?php echo $lang['lb_desc']; ?></p>
<?php foreach($results as $index=>$row): ?>
    <div class="row">
        <div class="col">
            #<?php echo $x++;?>
        </div>
        <div class="col">
            <?php echo $row['username'];?>
        </div>
        <div class="col">
            <?php echo "$".$row['bal'];?>
        </div>
    </div>
<?php endforeach;?>
    </div>

<?php
include_once("blade/footer.php");
?>

