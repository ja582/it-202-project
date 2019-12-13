<?php
session_start();

function get_username(){
    if(isset($_SESSION['user']['name'])){
        echo $_SESSION['user']['name'];
    }
    else{
        echo "name missing";
    }
}

function get_id(){
    if(isset($_SESSION['user']['id'])){
        echo $_SESSION['user']['id'];
    }
    else{
        echo "id missing";
    }
}

function is_Admin(){
    if($_SESSION['user']['name'] == "admin"){
        echo "you are admin";
        echo "<br>";
    }
    else{
        header("Location: dashboard.php");
    }
}

/*
function get_balance(){
    if(isset($_SESSION['user']['bal'])){
        echo $_SESSION['user']['bal'];
    }
    else{
        echo "Balance missing";
    }
}
*/
if(empty($_SESSION['user']['name'])){
    header("Location: login.php");
}

if(isset($_GET['lang'])){
    $lang = $_GET['lang'];
    $_SESSION['lang'] = $lang;
}

switch($lang){
    case 'en':
        $langFile = 'lang.en.php';
        break;
    case 'jp':
        $langFile = 'lang.jp.php';
        break;
    default:
        $langFile = 'lang.en.php';
        break;
}
include_once($langFile);
?>