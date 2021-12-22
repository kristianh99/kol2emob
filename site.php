
<?php
include 'db_config.php';
include 'Mobile-Detect-2.8.34/Mobile_Detect.php';
include 'functions.php';

$accept = "";
if (isset($_SERVER["HTTP_ACCEPT"])) {
    $accept = $_SERVER["HTTP_ACCEPT"];
}

if(!isset($_COOKIE['detected'])) {
    $detect = new Mobile_Detect;

    $deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'mobile') : 'computer');
    $ip_address = getIpAddress();
    $country = getCountryByIp($ip_address);
    $user_agent = $detect->getUserAgent();

    $number = 0;
    if (isset($_GET['number'])) {
        $number = $_GET['number'];
    }

    insertIntoStatistic($deviceType,$ip_address,$country,$user_agent,$number);

    $value=sha1('VISITED');
    setcookie('detected', $value, time() +300);

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no">
    <title>Title</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <style>
        * h1{
            width: 100%;
            text-align: center;
        }
        div img{
            width: 100%;
            height: auto;
        }
        div .hello-world{
            background-color: #0fd9c3;
        }
        div .my-skills{
            background-color: #b3b3b3;
            padding: 15px;
            text-align: center;
        }
        div .php{
            background-color: red;
            color: white;
        }
        div .css{
            background-color: yellow;
            color: red;
        }
        div .js{
            background-color: blue;
            color: white;
        }
        div .web-developer{
            background-color: #bcbcbc;
        }
        div .web-developer h1{
            text-align: right;
        }
        div
    </style>

</head>
<body>
<div class="container-fluid">
    <div class="row">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <a class="navbar-brand" href="#">WEBPAGE</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#hello-world">Hello World<span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#my-skills">My Skills</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#my-image">My Image</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#web-developer">Web Developer</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <div class="row">
        <div class="col-12 hello-world" id="hello-world">
            <h1>Hello World</h1>
            <p>
                tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst
                tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst
                tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst
                tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst
                tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst
                tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst
            </p>
        </div>
    </div>
    <div class="col-12">
        <div class="row my-skills" id="my-skills">
            <h1>My Skills</h1>
            <div class="col-12 col-md-6 php"><p>PHP</p></div>
            <div class="col-12 col-md-6 css"><p>CSS</p></div>
            <div class="col-12 js"><p>JS</p></div>
        </div>
    </div>

    <div class="row">
        <div class="col-12" id="my-image">
            <h1>My image</h1>
            <img src="programer.jpg" class="rounded-circle">
        </div>
    </div>

    <div class="row">
        <div class="col-12 web-developer" id="web-developer">
            <h1>Web developer</h1>
            <p>
                tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst
                tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst
                tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst
                tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst
                tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst
                tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst
            </p>
        </div>
    </div>

</div>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>

</body>
</html>

