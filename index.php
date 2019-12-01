<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" >
    <link crossorigin="anonymous" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" rel="stylesheet">
    <title>Hi,babe!</title>
    <style>
        .title {
            margin: 15px;
        }
        body {
            background: url("https://avatars.mds.yandex.net/get-pdb/1352825/7da449aa-c95e-4075-b7b1-16931789a2fe/s1200") ;
            background-size: 100%;
            font-family: 'Montserrat', sans-serif;
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
        .image{
            display: block;
            margin: 3% auto;
            width:60%;
            height:60%;
        }
    </style>
</head>

<body>
    <header>
        <form class="title" method="post">
            <div class="right">
                <a class="btn btn1" href="login.php">Sign in</a>
                <a class="btn btn2" href="reg.php">Sign up</a>
           </div>
       </form>
    </header>
    <img class= "image" src="/image.png" >
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>