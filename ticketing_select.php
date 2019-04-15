<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
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
            var app=angular.module("root",[]);
            app.controller("ctrl",["$scope","$interval",function($scope,$interval){
               $scope.username="<?php if(COUNT($_SESSION)!=0)echo $_SESSION['username'];?>";
               $scope.dates=[];                        
               //$scope.query="SELECT * FROM fmatch_view WHERE start_date='"+tempdate+"' ORDER BY start_date;";
               $scope.query="SELECT * FROM `fmatch_view` WHERE start_date >CURDATE() ORDER BY start_date";
                //console.log(JSON.stringify($scope.dates));               
                $scope.updateQuery=function(tempdate){
                    $scope.query="SELECT * FROM fmatch_view WHERE start_date='"+tempdate+"';";                
                }
            }]);
        </script>
        <script src="js/display_query.js"></script>
        <link rel="stylesheet" href="css/matches.css">
        <script src="js/navbar.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" />      
        <link rel="stylesheet" href="css/navbar.css">
        <style>
            .book{
                width:80%;
                border-radius: 10px;
                padding:10px;
                margin:3px;
                background-color: rgb(24, 231, 24);
                -webkit-transition: all linear 0.3s;         
                transition: all linear 0.3s;                   
            }
            .book:hover{
                background-color:rgb(46, 127, 233);
            }             
        </style>
    </head>
    <body>
        <div ng-app ="root" ng-controller="ctrl">
            <navbar active="#ticketing" username="username"></navbar>
            <?php
                if(count($_SESSION)==0)
                    die("please login to view this page");
            ?>
            <!--<div ng-repeat="tempdate in dates">
                {{updateQuery(tempdate)}}                                                         
                <display-query query="query" type="ticketing_select"></display-query>
            </div>-->
            <div class="container" style="margin-top:3em;margin-bottom:3em">
                <h1 class="display-4" style="border-bottom: 1px solid black;padding:0.4em;">Upcoming Matches</h1>
            </div>                                                                                
            <display-query query="query" type="ticketing_select"></display-query>
        </div>
    </body>
</html>