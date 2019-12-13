<?php

include("blade/function.php");

//English

$lang = array();
//test
$lang['page_title'] = "Hello!";
$lang['page_desc'] = "This is my homepage!";
$lang['numbers'] = "1, 2, 3, 4, 5, 6, 7, 8, 9, 10";
$lang['info'] = "Japanese has three alphabets: Hiragana, Katakana, and Kanji. English has one alphabet!";

function passNumber($num){
    echo get_username()."'s number is: ".$num;
}

//header
function langWelcomeHeader($sz){
    echo "Welcome ".$sz;
}
function langBalanceHeader($num){
    echo "Balance: $".$num;
}

function langIdHeader($num){
    echo "ID: ".$num;
}

$lang['select_lang'] = "Select Langauge:";

//dashboard
$lang['title_dash'] = "Home";
$lang['gotogame'] = "Play Rock, Paper, Scissors";
$lang['gotorec'] = "View Past Games";
$lang['gotolb'] = "View Leaderboards";
$lang['logout'] = "Log out";

//Gameroom
$lang['gameroom_greetings'] = "Hello! Please play some Rock, Paper, Scissors!";
$lang['gameroom_writebet'] = "Enter bet amount here.";
$lang['gameroom_isempty'] = "The wager is empty. Please go back and write it.";
$lang['gameroom_tie'] = "Tie! Nothing gained.";
$lang['error_gr'] = "Bet is bigger than Balance. Try again.";
$lang['gameroom_back'] = "<a href=\"gameroom.php\">Return to Gameroom</a>";

function lang_gameroom_won($num){
    echo '<b><p class="text-success">You won $'.$num.'!</p></b>';
}

function lang_gameroom_lost($num){
    echo '<b><p class="text-danger">You lost $'.$num.'!</p></b>';
}
function lang_gameroom_isempty(){
    echo "The wager is empty. Please go back and write it.";
}

function lang_computer_choice($choice){
    echo "Computer's choice: ".$choice;
}

function lang_user_choice($choice){
    echo "Your choice: ".$choice;
}
//Records
$lang['rec_desc'] = "This is all your recorded games of Rock, Paper, Scissors. You can see what you bet and what your game outcome was.";
$lang['lb_desc'] = "Leaderboard of the richest 10 players.";
//Balance management

//Login

//Registeration


?>