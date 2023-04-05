<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <title>Document</title>
    <style>
        body{
            background:rgb(234, 234, 234);
        }
        #container{
            margin:100px auto; width:330px; background:white; padding:20px; border-radius:15px;
            text-align:center;
        }
        #container i{
            font-size:50px;
        }
        #container div a{
            text-decoration:none;
        }
    </style>
</head>
<body>
    <div id="container">
        <i class="bi bi-person-circle"></i> <br/>
        <div style="margin-top:10px;">
            <a class="btn btn-primary" href="{{ route('login') }}">login</a>
            <a class="btn btn-primary" href="{{ route('register') }}">register</a>
        </div>
    </div>
</body>
</html>
