<?php

include("blade/header.php");
require("config.php");
$conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";
$db = new PDO($conn_string, $username, $password);

is_Admin();

function changeBalance($nBal, $un, $newDB){
    $query = "UPDATE `Users` SET `bal`= (:nBal) WHERE `username` = (:username)";
    $stmt = $newDB->prepare($query);
    $r = $stmt->execute(array(":nBal"=> $nBal, ":username"=>$un));
    echo "balance changed";
}

function changeUsername($nUsername, $un, $newDB){
    $query = "UPDATE `Users` SET `username`= (:nName) WHERE `username` = (:username) LIMIT 1";
    $stmt = $newDB->prepare($query);
    $r = $stmt->execute(array(":nName"=> $nUsername, ":username"=>$un));
    echo "new changed";
}

if(isset($_POST['submit'])) {
    $bal = $_POST['balance'];
    $username = $_POST['username'];
    changeBalance($bal, $username, $db);
}

if(isset($_POST['change'])) {
    $new_name = $_POST['new_username'];
    $username = $_POST['username'];
    changeUsername($new_name, $username, $db);
}

?>
<br>
change balance
<form action="#" method="POST">
    <input name="username" type="text" class="form-control" placeholder="enter username to change"/>
    <input name="balance" type="text" class="form-control" placeholder="enter balance"/>
    <input type="Submit" name="submit" value="submit"/>
</form>
<br>
change username
<form action="#" method="POST">
    <input name="username" type="text" class="form-control" placeholder="enter username to change"/>
    <input name="new_username" type="text" class="form-control" placeholder="enter new username"/>
    <input type="Submit" name="change" value="change"/>
</form>

<?php
include_once("blade/footer.php");
?>

