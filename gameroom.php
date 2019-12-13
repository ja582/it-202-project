<?php
session_start();
include("blade/header.php");
require("config.php");

$conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";
$db = new PDO($conn_string, $username, $password);

function takeMoney($newDB, $bet){
    $user_idN = $_SESSION['user']['id'];
    $query = "UPDATE `Users` SET `bal`= bal - (:bet) WHERE `id` = (:user_id)";
    $stmt = $newDB->prepare($query);
    $r = $stmt->execute(array(":bet"=> $bet, ":user_id"=>$user_idN));
    lang_gameroom_lost($bet);
}

function winMoney($newDB, $bet){
    $user_idN = $_SESSION['user']['id'];
    $query = "UPDATE `Users` SET `bal`= bal + 2 * (:bet) WHERE `id` = (:user_id)";
    $stmt = $newDB->prepare($query);
    $r = $stmt->execute(array(":bet"=> $bet, ":user_id"=>$user_idN));
    $winTotal = $bet*2;
    lang_gameroom_won($winTotal);
}

function insertRecord($newDB, $bet, $game, $place){
    $user_idN = $_SESSION['user']['id'];
    $quest = "INSERT INTO `Records`(`place`, `wager`, `game`, `user_id`) VALUES (:place, :wager, :game, :user_id)";
    $stmt = $newDB->prepare($quest);
    $r = $stmt->execute(array(":place"=> $place, ":wager"=> $bet, ":game"=> $game, ":user_id"=> $user_idN));
}


if(isset($_POST['submit'])){
    $wager = $_POST['wager'];

    if($wager >= $_SESSION['$userBal']){
        echo $lang['error_gr'];
        echo "<br/>";
        echo $lang['gameroom_back'];
        exit();
    }

    if($wager != null){
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

        lang_user_choice($playerChoice);
        echo "<br />";
        lang_computer_choice($computerChoice);

        $gameWinString = $playerChoice . " beat " . $computerChoice;
        $gameLostString = $computerChoice . " beat " . $playerChoice;
        $gameDrawString = $playerChoice . " tied " . $computerChoice;

        if($computerChoice == "Rock" && $playerChoice == "Paper"){
            echo "<br />";
            winMoney($db, $wager);
            insertRecord($db, $wager, $gameWinString, "Win");
        }else if($computerChoice == "Paper" && $playerChoice == "Rock"){
            echo "<br />";
            takeMoney($db, $wager);
            insertRecord($db, $wager, $gameLostString, "Lost");
        }
        if($computerChoice == "Paper" && $playerChoice == "Scissor"){
            echo "<br />";
            winMoney($db, $wager);
            insertRecord($db, $wager, $gameWinString, "Win");
        }else if($computerChoice == "Scissor" && $playerChoice == "Paper"){
            echo "<br />";
            takeMoney($db, $wager);
            insertRecord($db, $wager, $gameLostString, "Lost");
        }
        if($computerChoice == "Scissor" && $playerChoice == "Rock"){
            echo "<br />";
            winMoney($db, $wager);
            insertRecord($db, $wager, $gameWinString, "Win");
        }else if($computerChoice == "Rock" && $playerChoice == "Scissor"){
            echo "<br />";
            takeMoney($db, $wager);
            insertRecord($db, $wager, $gameLostString, "Lost");
        }
        if($computerChoice == $playerChoice){
            echo "<br />";
            echo $lang['gameroom_tie'];
            insertRecord($db, $wager, $gameDrawString, "Tied");
        }
    }else{
        echo $lang['gameroom_isempty'];
    }
    }


?>

<title>Game Room</title>
<br>
<p><?php echo $lang['gameroom_greetings']; ?></p>
<form action="" method="POST">
    <input name="wager" type="text" class="form-control" placeholder="<?php echo $lang['gameroom_writebet']; ?>" required autofocus/>
    <br>
    <input type="Submit" name="submit" value="Rock"/>
    <input type="Submit" name="submit" value="Scissor"/>
    <input type="Submit" name="submit" value="Paper"/>
</form>
<br>
<a href="dashboard.php"><?php echo $lang['title_dash'] ?></a><br><a href="records.php"><?php echo $lang['gotorec']; ?></a>
</body>
</html>
