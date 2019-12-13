<?php
include("blade/header.php");
require("config.php");

$userid = $_SESSION['user']['id'];

if(isset($_POST['submit'])) {
    $conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";
    $db = new PDO($conn_string, $username, $password);
    $sql = "INSERT INTO `Records` (win, lost, draw, user_id) VALUES (:win, :lost, :draw, :user_id)";
    $que = "INSERT INTO `Multiplayer`(`user_id_host`) VALUES (:user_id_host)";
    $stmt = $db->prepare($sql);
    $r = $stmt->execute(array(":user_id_host" => $userid));
    echo
    var_dump($r);
}

$query = "SELECT * FROM `Records` WHERE 1";
$stmt = $db->prepare($query);
$r = $stmt->execute();
$results = $stmt->fetchAll();



?>

<html>
<head>
    <title>language test</title>
</head>

<form action="" method="POST">
    <input type="Submit" name="submit" value="go"/>
</form>

</html>