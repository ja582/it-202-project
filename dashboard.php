<?php
session_start();
include_once("blade/header.php");
?>
<head>
    <title><?php echo $lang['title_dash']; ?></title>
</head>


<br>
<a href="gameroom.php"><?php echo $lang['gotogame']; ?></a><br><a href="records.php"><?php echo $lang['gotorec']; ?></a><br><a href="leaderboard.php"><?php echo $lang['gotolb'] ?></a><br><a href="logout.php"><?php echo $lang['logout']; ?></a>

<?php
include_once("blade/footer.php");
?>
