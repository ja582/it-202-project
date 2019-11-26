<?php
session_start();
include_once("blade/functions.php");

if(isset($_POST['submit'])){
    $playerChoice = $_POST['submit'];
    $computerRandInt = rand(1,3);

    $winCount = 0;
    $loseCount = 0;

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
    }
    if($computerChoice == "Paper" && $playerChoice == "Scissor"){
        echo "<br />";
        echo "win!!";
    }
    if($computerChoice == "Scissor" && $playerChoice == "Rock"){
        echo "<br />";
        echo "win!!";
    }
    //mess of if statements.. sorry
    if($computerChoice == "Scissor" && $playerChoice == "Paper"){
        echo "<br />";
        echo "lose!!";
    }
    if($computerChoice == "Paper" && $playerChoice == "Rock"){
        echo "<br />";
        echo "lose!!";
    }
    if($computerChoice == "Rock" && $playerChoice == "Scissor"){
        echo "<br />";
        echo "lose!!";
    }
    if($computerChoice == $playerChoice){
        echo "<br />";
        echo "draw!";
    }

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
