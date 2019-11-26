<?php
function get_username(){
    if(isset($_SESSION['user']['name'])){
        echo $_SESSION['user']['name'];
    }
    else{
        echo "name missing";
    }
}

function get_balance(){
    if(isset($_SESSION['user']['balance'])){
        echo $_SESSION['user']['balance'];
    }
    else{
        echo "Balance missing";
    }
}