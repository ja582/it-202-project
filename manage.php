<?php
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require("config.php");
include_once("blade/header.php");


$conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";
$userBal = $_SESSION['user']['bal'];

if(isset($_POST['submit'])){
    try{
        $nBal = $_POST['balance'];
        if($nBal != 0 ){
            $db = new PDO($conn_string, $username, $password);
            $query = "UPDATE `Users` SET `bal`= bal - (:balance) WHERE `id` = (:user_id)";
            $user_idN = $_SESSION['user']['id'];
            $stmt = $db->prepare($query);
            $r = $stmt->execute(array(":balance"=> $nBal, ":user_id"=>$user_idN));
            $results = $stmt->fetch(PDO::FETCH_ASSOC);
            echo "Your Balance is now: ".$userBal;
            echo "<br>";
            print_r(array(":balance"=> $nBal, ":user_id"=>$user_idN));
        }else{
            echo "Balance amount is empty/not numeric";
        }

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