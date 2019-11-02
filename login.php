<?php
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require("config.php");
$conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";
if(isset($_POST['submitButton'])){

    $uname = $_POST['username'];
    $pword = $_POST['password'];
    $db = new PDO($conn_string, $username, $password);
    if ($uname != "" && $pword != ""){
        $query = "SELECT * FROM Users WHERE username=:username AND password=:password";
        $stmt = $db->prepare($query);
        $r = $stmt->execute(array(":username"=> $uname, ":password"=> $pword));
        $results = $stmt->fetch(PDO::FETCH_ASSOC);
        echo "<pre>" . var_export($results, true) . "</pre>";

        $countArrays = count($results);

        if ($countArrays > 0){
            $_SESSION['username'] = $uname;
            echo "arrays counted";
            header("Location: home.php");
        }else{
            echo "wrong! you lose!";
        }
    }else{
        echo "Invalid username and password";
    }

}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Login</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


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
    <link href="css/signin.css" rel="stylesheet">
</head>
<body class="text-center">
<form class="form-signin" method="POST" action="#">
    <img class="mb-4" src="/docs/4.3/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
    <input name="username" type="text" class="form-control" placeholder="Username" required autofocus/>
    <input name="password" type="password" class="form-control" placeholder="Password" required/>
    <input type="submit" value="Submit" name="submitButton" id="submitButton"/>
    <p class="mt-5 mb-3 text-muted">&copy; 2019</p>
</form>
</body>
</html>