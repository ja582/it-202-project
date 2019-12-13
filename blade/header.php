<?php
include_once("blade/functions.php");
require("../config.php");

$usern = $_SESSION['user']['name'];
$id = $_SESSION['user']['id'];

$conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";
$db = new PDO($conn_string, $username, $password);


$quest = "select id,  bal from `Users` where id = :id LIMIT 1";
$stmt = $db->prepare($quest);
$r = $stmt->execute(array(":id"=> $id));
$results = $stmt->fetch(PDO::FETCH_ASSOC);
$_SESSION['$userBal'] = $results['bal'];


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">

    <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/grid/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/4.4/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/4.4/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/4.4/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
    <link rel="icon" href="/docs/4.4/assets/img/favicons/favicon.ico">
    <meta name="msapplication-config" content="/docs/4.4/assets/img/favicons/browserconfig.xml">
    <meta name="theme-color" content="#563d7c">


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="grid.css" rel="stylesheet">
</head>
<body class="py-4">
<div class="container">
    <?php langWelcomeHeader($usern); ?> |
    <?php langBalanceHeader($_SESSION['$userBal']); ?> |
    <?php langIdHeader($id); ?>
    <form action="" method="GET">
        <?php echo $lang['select_lang']; ?> <input type="Submit" name="lang" value="en"/> | <input type="Submit" name="lang" value="jp"/>
    </form>
    <br>


