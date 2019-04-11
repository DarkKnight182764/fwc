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
                $scope.username="<?php session_start();if(COUNT($_SESSION)!=0)echo $_SESSION['username'];?>";
               $scope.getString=function(date){
                   return (date.getFullYear()+"-"+(date.getMonth()+1)+"-"+date.getDate());
               }
               $scope.repeat=function(){
                    for(var i=0;i<100;i++){
                        var temp=new Date($scope.date.getTime()+i*$scope.inc);
                        $scope.dates[i]=$scope.getString(temp);
                    } 
               }
               $scope.inc=86400000;
               $scope.date=new Date(2019,0,1);  //1st jan 2019
               $scope.dates=[];
               $scope.repeat();               
                //console.log(JSON.stringify($scope.dates));               
                $scope.updateQuery=function(tempdate){
                    $scope.query="SELECT * FROM fmatch_view WHERE start_date='"+tempdate+"';";                
                }
            }]);
        </script>
        <script src="js/display_query.js"></script>
        <link rel="stylesheet" href="css/matches.css">
        <script src="js/navbar.js"></script>
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
            <div ng-repeat="tempdate in dates">
                {{updateQuery(tempdate)}}                                                         
                <display-query query="query" type="ticketing_select"></display-query>
            </div>
        </div>
    </body>
</html>