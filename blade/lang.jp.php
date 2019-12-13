<?php

include("blade/function.php");

//Japanese

$lang = array();
//test
$lang['page_title'] = "こんにちは！";
$lang['page_desc'] = "これはホームページです。";
$lang['numbers'] = "一、二、三、四、五、六、七、八、九、十";
$lang['info'] = "日本語は３つのアルファベット：ひらがな、カタカナ、漢字です。英語は１つのアルファベットがあります。";
function passNumber($num){
    echo "あなたの番号: ".$num;
}

//header
function langWelcomeHeader($username){
    echo "ようこそ、".$username."さん";
}

function langBalanceHeader($num){
    echo "残高: $".$num;
}

function langIdHeader($num){
    echo "ID番号: ".$num;
}

$lang['select_lang'] = "言語:";

//dashboard
$lang['title_dash'] = "ホーム";
$lang['gotogame'] = "じゃんけんします";
$lang['gotorec'] = "過去のじゃんけんゲームの記録";
$lang['gotolb'] = "リーダーボード";
$lang['logout'] = "ログアウト";


//Gameroom
$lang['gameroom_greetings'] = "じゃんけんをしてください！";
$lang['gameroom_writebet'] = "賭けを書いてください";
$lang['gameroom_isempty'] = "賭けは空です。　賭けを書いてください。";
$lang['gameroom_lose'] = "負けた!";
$lang['gameroom_tie'] = "引き分けた！";
$lang['error_gr'] = "賭はあなたの残高より大きいです。再試行してください。";
$lang['gameroom_back'] = "<a href=\"gameroom.php\">じゃんけんに戻る</a>";

function lang_gameroom_won($num){
    echo '<b><p class="text-success">'.$num.'ドルを勝ちました。おめでとうございます!</p></b>';
}

function lang_gameroom_lost($num){
    echo '<b><p class="text-danger">'.$num.'ドルを失いました。残念。</p></b>';
}

function lang_gameroom_isempty(){
    echo "賭けは空です。賭けを書いてください";
}

function lang_computer_choice($choice){
    echo "コンピューターの選択: ".$choice;
}

function lang_user_choice($choice){
    echo "あなたの選択: ".$choice;
}
//Records
$lang['rec_desc'] = "これは過去のじゃんけんゲームの記録です。過去のゲームと賭けを見することができます。";
$lang['lb_desc'] = "最も金持ち10人のプレイヤーのリーダーボードです。";
//Login

//Registeration
$lang[] = "";


?>