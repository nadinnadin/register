<?php
ini_set('display_errors',1);
if(isset($_POST['insert'])){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $userpwd = $_POST['password'];
    $pwd = password_hash($_POST['password'],PASSWORD_DEFAULT);
    $repeatpassword = $_POST['repeat-password'];

    $dsn = 'mysql:dbname=********; host=127.0.0.1';
    $user = '**********';
    $password = '********';

    try {
        $dbh = new PDO($dsn, $user, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo 'Подключение не удалось: ' . $e->getMessage();
    }

    $data = [
        ':firstname' => $firstname,
        ':lastname' => $lastname,
        ':email' => $email,
        ':username' => $username,
        ':password' => $pwd,
    ];

    if($repeatpassword == $userpwd){
        $sql = "INSERT INTO reg (`firstname`, `lastname`, `email`, `username`, `password`) VALUES (:firstname,:lastname,:email,:username,:password)";
        $stmt= $dbh->prepare($sql);
        $stmt->execute($data);
        header('Location: http://'.$_SERVER['SERVER_NAME'].'/login.php');
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .title {
            margin: 20px;
        }
        body {
            background: url("http://w1.wallls.com/uploads/original/201601/25/wallls.com_51540.jpg");
            background-size: 100%;
            font-family: 'Montserrat', sans-serif;
        }
        .box input[type = "text"],.box input[type = "password"],.box input[type = "email"]{
            background: none;
            display: block;
            margin: 10px auto;
            text-align: center;
            border: 2px solid #eb7788;
            padding: 30px 15px 25px  15px;
            width:500px;
            outline: none;
            color: white;
            border-radius: 10px;
            transition: 0.25s;
        }
        .box input[type = "text"]:focus,.box input[type = "password"]:focus,.box input[type = "email"]:focus{
            width: 550px;
            border-color: #c961ee;
        }
        .box {
            background: none;
            display: block;
            text-align: center;
            border: 3px solid #eb7788;
            padding: 14px 40px;
            outline: none;
            border-radius: 20px;
            transition: 0.25s;
            margin-left: 10%;
            margin-right: 10%;
        }
        .right {
            display: flex;
            align-content: center;
            flex-wrap: wrap;
            width: 80vw;
            margin: 0 auto;
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
        .btn:hover {
            background-position: right center;
        }
        .btn1 {
            background-image: linear-gradient(to right, #f8cfd5 0%, #eb7788 51%, #f8cfd5 100%);
        }
        .btn2 {
            background-image: linear-gradient(to right, #a2c0c8 0%, #6da0bf 51%, #a2c0c8 100%);
        }
        .box input[type = "submit"]{
            background-image: linear-gradient(to right, #6da0bf 0%, #a2c0c8 51%, #6da0bf 100%);
            width: 400px;
        }
        .inp{
            display: flex;
        }
    </style>
</head>
<body>

    <form class="title" method="post">
        <div class="right">
            <a class="btn btn1" href="login.php">Sign in</a>
            <a class="btn btn2" href="index.php">Back</a>
        </div>
    </form>

    <form class="box" action = "reg.php"  method="post">
        <div class="inp">
            <input autofocus class="form-control" name="firstname" placeholder="First Name" required type="text">
            <input autofocus class="form-control" name="lastname" placeholder="Last Name" required type="text">
        </div>
        <div class="inp">
            <input autofocus class="form-control" name="email" placeholder="Email" required type="email">
            <input autofocus class="form-control" name="username" placeholder="Username" required type="text">
        </div>
        <input autofocus class="form-control" name="password" placeholder="password" required type="password">
        <input autofocus class="form-control" name="repeat-password" placeholder="repeat password" required type="password">
        <input class="btn" name="insert" type="submit" value="register">
    </form>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
