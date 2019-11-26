<?php
session_start();
include_once("blade/functions.php");
?>
<html>
<head></head>
<body>
Hello, <?php get_username();?>!!!!!!!!
Balance is: <?php get_balance();?>
<br>
<a href="gameroom.php" />play rock paper scissors</a><br><a href="manage.php" />balance management</a>



</body>
</html>