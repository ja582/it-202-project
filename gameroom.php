<?php
session_start();
include_once("blade/functions.php");
require("config.php");
$conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";
$db = new PDO($conn_string, $username, $password);


function takeMoney(){
    $user_idN = $_SESSION['user']['id'];
    $query = "UPDATE `Users` SET `bal`= bal - 1 WHERE `id` = (:user_id)";
    $stmt = $db->prepare($query);
    $r = $stmt->execute(array(":user_id"=>$user_idN));
    $results = $stmt->fetch(PDO::FETCH_ASSOC);
    return true;
}


if(isset($_POST['submit'])){
    $playerChoice = $_POST['submit'];
    $computerRandInt = rand(1,3);
    switch($computerRandInt){
        case 1:
            $computerChoice = "Rock";
            break;
        case 2:
            $computerChoice = "Paper";
            break;
        case 3:
            $computerChoice = "Scissor";
            break;
    }

    echo "Computer's choice: ".$computerChoice;
    echo "<br />";
    echo "Your choice: ".$playerChoice;

    if($computerChoice == "Rock" && $playerChoice == "Paper"){
        echo "<br />";
        echo "win!!";
    }else if($computerChoice == "Paper" && $playerChoice == "Rock"){
        echo "<br />";
        echo "you lose!!";
    }
    if($computerChoice == "Paper" && $playerChoice == "Scissor"){
        echo "<br />";
        echo "win!!";
    }else if($computerChoice == "Scissor" && $playerChoice == "Paper"){
        echo "<br />";
        echo "you lose!!";
    }
    if($computerChoice == "Scissor" && $playerChoice == "Rock"){
        echo "<br />";
        echo "win!!";
    }else if($computerChoice == "Rock" && $playerChoice == "Scissor"){
        echo "<br />";
        echo "you lose!!";
        takeMoney();
        echo "<br />";
    }
    if($computerChoice == $playerChoice){
        echo "<br />";
        echo "draww!";
    }
}else{
    "NO MONEY";
}


?>

<html>
<title>Game Room</title>
<p>Hello, <?php get_username();?>!! Play some Rock, Paper, and Scissors (please):</p>
<form action="#" method="POST">
    <input type="Submit" name="submit" value="Rock"/>
    <input type="Submit" name="submit" value="Scissor"/>
    <input type="Submit" name="submit" value="Paper"/>
</form>

</html>
