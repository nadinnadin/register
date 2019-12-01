<?php
ini_set('display_errors', 1);

if(isset($_POST['insert'])){
    $username = $_POST['username'];
    $userpwd = $_POST['password'];
    $dsn = 'mysql:dbname=nadiiadiakova; host=localhost';
    $user = 'nadiiadiakova';
    $password = 'DfqYjN';

    try {
        $dbh = new PDO($dsn, $user, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo 'Подключение не удалось: ' . $e->getMessage();
    }

    $data = [
        ':username' => $username,
    ];

    $sql = "select username from reg where username = :username";
    $stmt= $dbh->prepare($sql);
    $stmt->execute($data);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if($result){
        $data = [
            ':username' => $username,
        ];
        $sql = "select password, firstname, lastname from reg where username=:username";
        $stmt= $dbh->prepare($sql);
        $stmt->execute($data);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if($result && password_verify($userpwd,$result['password'])){
            session_start();
            $_SESSION["test"] = ['firstname'=>$result['firstname'], 'lastname'=>$result['lastname']];
            header('Location: http://'.$_SERVER['SERVER_NAME'].'/room.php');
        }
    }
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .title {
            margin: 15px;
            overflow: hidden;
        }
        body {
            background: url("https://oboi.ws/wallpapers/15_1537_oboi_vojna_knopok_1440x900.jpg");
            background-size: 90%;
            font-family: 'Montserrat', sans-serif;
            margin: 0;
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
            background-image: linear-gradient(to right, #6da0bf 0%, rgb(171, 194, 197) 51%, #6da0bf 100%);
            width: 400px;
        }
        .box {
            position: relative;
            padding-top: 1.5rem;
        }
        .form-control{
        width: 600px;
        margin: auto;
        }
        .box input[type = "text"],.box input[type = "password"]{
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
        .box input[type = "text"]:focus,.box input[type = "password"]:focus{
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
    </style>
</head>

<body>
    <form class="title" method="post">
        <div class="right">
            <a class="btn btn1" href="index.php">Back</a>
            <a class="btn btn2" href="reg.php">Sign up</a>
        </div>
    </form>

    <form class="box" action = "login.php" method="post">
        <input type="text" class="form-control" placeholder="username" name="username" required autofocus >
        <input type="password" class="form-control" placeholder="Password" name="password" required autofocus>
        <input class="btn" type="submit" name="insert" value="login">
    </form>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>

