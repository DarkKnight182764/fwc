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
	
	





</body>

</html>
