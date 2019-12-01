<!doctype html>
<?php
session_start();
ini_set('display_errors', 1);
if(isset($_POST['button'])) {
    session_unset();
    session_destroy();
}
if(isset($_SESSION['test'])){
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Personal account</title>
    <style>
        .title {
            margin: 15px;
            background: none;
            display: block;
            text-align: center;
            padding: 14px 40px;
            outline: none;
            border-radius: 20px;
            transition: 0.25s;
            margin-left: 10%;
            margin-right: 10%;
        }
        body {
            background: url("/box.jpg");
            background-size: 100%;
            font-family: 'Montserrat', sans-serif;
        }
        .btn {
            flex: 1 1 auto;
            margin: 10px;
            padding: 30px;
            text-align: center;
            text-transform: uppercase;
            transition: 0.5s;
            background-size: 200% auto;
            color: white;
            border-radius: 10px;
        }
        .btn1 {
            background-image: linear-gradient(to right, #a2c0c8 0%, #6da0bf 51%, #a2c0c8 100%);
            width: 400px;
        }
        .btn:hover {
            background-position: right center;
        }
        h3{
            color: #6da0bf;
        }
    </style>
</head>
<body>
    <form class="title" method="post" action="index.php">
        <div class="right">
            <button class="btn btn1" name="button" >Back</button>
        </div>
        <h3 class="text-center"><?php echo 'Welcome to your box,'. @$_SESSION['test']['firstname'] .' ' . @$_SESSION['test']['lastname'];?></h3>
    </form>
</body>
</html>
<?php }
else {
    header('Location: http://'.$_SERVER['SERVER_NAME'].'/login.php');
}
?>
