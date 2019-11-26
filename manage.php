<?php
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

require("config.php");
$conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";
if(isset($_POST['submit'])){
    try{
        $nBal = $_POST['balance'];
        $db = new PDO($conn_string, $username, $password);
        $quest = "UPDATE into `Users` (`bal`) VALUES(:balance)";
        $stmt = $db->prepare($quest);
        $r = $stmt->execute(array(":balance"=> $nBal));
        $results = $stmt->fetch(PDO::FETCH_ASSOC);

    }
    catch(Exception $e){
        echo $e->getMessage();
    }
}
?>

<html>
<form action="#" method="POST">
    <input name="balance" type="text" class="form-control" placeholder="enter balance"/>
    <input type="Submit" name="submit" value="submit"/>
</form>
</html>