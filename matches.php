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
               $scope.query="SELECT * FROM fmatch_view ORDER BY start_date;";  
               //$scope.repeat();               
                //console.log(JSON.stringify($scope.dates));               
                $scope.updateQuery=function(tempdate){
                    $scope.query="SELECT * FROM fmatch_view WHERE start_date='"+tempdate+"';";                
                }
            }]);
        </script>
        <script src="js/display_query.js"></script>
        <link rel="stylesheet" href="css/matches.css">
        <script src="js/navbar.js"></script>
    </head>
    <body>
        <div ng-app ="root" ng-controller="ctrl">
            <navbar active="#matches" username="username"></navbar>  
            <div class="container" style="margin-top:3em;margin-bottom:3em">
                <h1 class="display-4" style="border-bottom: 1px solid black;padding:0.4em;">All Scheduled Matches</h1>
            </div>                                                                                 
            <display-query query="query" type="match"></display-query>            
        </div>
    </body>
</html>