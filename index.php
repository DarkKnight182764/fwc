<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fifa World Cup 2018</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>   
    <link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" />      
    <link rel="stylesheet" href="css/navbar.css">
    <script>
        var loginApp=angular.module("root",[]);
        loginApp.controller("loginController",function($scope,$http){
            $scope.showCa=false;            
            $scope.username="<?php ;if(COUNT($_SESSION)!=0)echo $_SESSION['username'];?>"; 
        });        
    </script>
    <script src="js/navbar.js"></script>
    <style>
        .err_mesg{
            margin-left:10px;
            color:red;
        }
    </style>    
    <style>
        * {
            box-sizing: border-box;
        }


        body {
            margin: 0;
            font-family: 'Righteous', cursive;
        }

        

        .inner {
            overflow: hidden;
        }

        .inner img {
            transition: all .25s ease;
        }

        .inner:hover img {
            transform: scale(1.1);
        }

        .footer {
            background: #326295;
        }

        .footer i {
            color: rgb(223, 223, 223);
            font-size: 3em;
            padding: 10px;
            transition: all .5s ease;
            margin: 1em;
        }

        .footer i:hover {
            color: white;
        }
    </style>
</head>

<body ng-app="root" ng-controller="loginController">

    <navbar active="#home" username="username"></navbar>
    <!-- Carousel -->
    <div class="bd-example">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://img.fifa.com/image/upload/t_tc1/rfdwuvemesqqkjak4z31.jpg" class="d-block w-100"
                        alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h2 class="display-1">Russia 2018 : The Official Film Trailer</h2>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://img.fifa.com/image/upload/t_tc1/v1549275800/g1vslxekjcjvj8fh2lf7.jpg"
                        class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h2 class="display-1">Southgate: The NFL aided England's World Cup</h2>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://img.fifa.com/image/upload/t_tc1/jzhwnsp2ivsnw2vy1eti.jpg" class="d-block w-100"
                        alt="...">
                    <div class=" carousel-caption d-none d-md-block">
                        <h2 class="display-1" style="background: rgba(0, 0, 0, 0.5);">2018 is Russia's year to remember
                        </h2>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <div class="container">
        <img src="https://tpc.googlesyndication.com/simgad/2692123496416992118" alt="book tickets"  style="margin:5em;">
    </div>
	<div class="container-fluid" style="margin-top:1em;margin-bottom: 1em;">
        <div class="row justify-content-center">
            <div class="col-sm-3">
                <div class="card" style="background-color: #eee;border-radius:0;">
                    <div class="inner">
                        <img class="card-img-top"
                            src="https://img.fifa.com/image/upload/t_s3/v1543921822/ex1ksdevyxwsgu7rzdv6.jpg"
                            alt="News 1" style="border-radius:0;">
                    </div>
                    <div class="card-body">
                        <button class="btn btn-info" style="border-radius:0;margin-bottom: 0.9em;margin-top: 0.3em"
                            type="button">Russia 2018</button>
                        <h4 class="card-text">FIFA shares the benefits of Russia 2018 with 416 clubs around the globe.
                        </h4>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card" style="background-color: #eee;border-radius:0;">
                    <div class="inner">
                        <img class="card-img-top" src="https://img.fifa.com/image/upload/t_s3/wrhug8uxqnwqo6ewmy7k.jpg"
                            alt="News 1" style="border-radius:0;">
                    </div>
                    <div class="card-body">
                        <button class="btn btn-info" style="border-radius:0;margin-bottom: 0.9em;margin-top: 0.3em"
                            type="button">Russia 2018</button>
                        <h4 class="card-text">More than half the world watched the record-breaking world cup
                        </h4>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card" style="background-color: #eee;border-radius:0;">
                    <div class="inner">
                        <img class="card-img-top"
                            src="https://img.fifa.com/image/upload/t_s3/v1539692358/uei4irccazwpyn3pjt2r.jpg"
                            alt="News 3" style="border-radius:0;">
                    </div>
                    <div class="card-body">
                        <button class="btn btn-info" style="border-radius:0;margin-bottom: 0.9em;margin-top: 0.3em"
                            type="button">Russia 2018</button>
                        <h4 class="card-text">FIFA Technical Study Group publishes the FIFA World Cup Russia Reports
                        </h4>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card" style="background-color: #eee;border-radius:0;">
                    <div class="inner">
                        <img class="card-img-top"
                            src="https://img.fifa.com/image/upload/t_s3/v1545213115/jl3n8qnregy8uyzjjxtb.jpg"
                            alt="News 4" style="border-radius:0;">
                    </div>
                    <div class="card-body">
                        <button class="btn btn-info" style="border-radius:0;margin-bottom: 0.9em;margin-top: 0.3em"
                            type="button">Russia 2018</button>
                        <h4 class="card-text">Relive the emotions of the 2018 World Cup with the help of this e-book
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid" style="margin-top: 5em;">
        <div class="row" style="color:#fff;background-color:#002c5f">
            <div class="col-sm-5">
                <img src="https://img.fifa.com/image/upload/t_td/teasers/worldcup/desktop/GOT.png"
                    class="img-fluid d-block" alt="GOT">
            </div>
            <div class="col-sm-7">
                <h3 class="display-4">HYUNDAI GOAL OF THE TOURNAMENT</h3>
                <p>From 169 goals scored in Russia, the winning goal has been chosen!</p>
                <button class="btn btn-light" style="border-radius:0;"><a
                        href="https://www.fifa.com/worldcup/videos/goal-of-the-tournament/"
                        style="text-decoration: none;color:#002c5f;">View Winner</a></button>
            </div>
        </div>
    </div>

    <div class="container-fluid" style="margin-top: 5em;">
        <div class="row" style="color:#fff;background-color:#000;">
            <div class="col-sm-5" style="margin-left:1em;padding-top: 1em;">
                <h3 class="display-4">RUSSIA 2018: AWARDS</h3>
                <p>Find out who collected the various individual and collective awards at the 2018 FIFA World Cup
                    Russia.</p>
                <button class="btn btn-light" style="border-radius: 0"><a href="https://www.fifa.com/worldcup/awards/"
                        style="text-decoration: none;color:#000">View the Winners</a></button>
            </div>
            <div class="col-sm-5">
                <img src="https://img.fifa.com/image/upload/t_td/teasers/worldcup/desktop/golden_boot.png"
                    class="img-fluid d-block" alt="306">
            </div>

        </div>
    </div>


    <div class="container-fluid" style="margin-top: 5em;">
        <div class="row" style="color:#fff;background-color:#326295;">
            <div class="col-sm-5" style="margin-left:1em;padding-top: 1em;">
                <h3 class="display-4">360° FANPIC FROM OPENING MATCH</h3>
                <p>A 360° photo was taken at both the Opening and Closing matches at Russia 2018. Were you there?
                    Scroll, zoom, tag and share!</p>
                <button class="btn btn-light" style="border-radius: 0"><a
                        href="https://i.fanpic.co/fifa/360fanpic?ignoredeeplink=true"
                        style="text-decoration: none;color:#326295">Amazing Pictures</a></button>
            </div>
            <div class="col-sm-5">
                <img src="https://img.fifa.com/image/upload/t_td/teasers/worldcup/desktop/360_fan_pic.png"
                    class="img-fluid d-block" alt="306">
            </div>

        </div>
    </div>

    <div class="container">
        <img src="https://tpc.googlesyndication.com/simgad/2692123496416992118" alt="book tickets" style="padding:2em;"
            class="img-fluid d-block">
    </div>
    <footer class="footer">
        <div class="container text-center">
            <div class="row">
                <div class="col-sm-2"><i class="fa fa-facebook"></i></div>
                <div class="col-sm-2"><i class="fa fa-twitter"></i></div>
                <div class="col-sm-2"><i class="fa fa-linkedin"></i></div>
                <div class="col-sm-2"><i class="fa fa-facebook"></i></div>
                <div class="col-sm-2"><i class="fa fa-google-plus"></i></div>
                <div class="col-sm-2"><i class="fa fa-skype"></i></div>
            </div>
        </div>
    </footer>

    <div class="container-fluid text-center" style="background: #002c5f">
        <h3 style="color: #fff;padding: 0.5em;">© 2018 Copyright:
            <a href="https://mdbootstrap.com/education/bootstrap/"> FIFA</a></h3>
    </div>

</body>

</html>
