<?php
    session_start();
    if(COUNT($_SESSION)==0)
        header("location:"."index.html");        
?>
<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<html>
    <head>        
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>                           
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="css/tablestyle.css">
        <link rel="stylesheet" type="text/css" href="css/players.css">
        <script>            
            var app=angular.module("root",[]);
            app.controller("ctrl",["$scope",function($scope){
                $scope.query="SELECT * FROM players_view;";                
                $scope.update=function(type){
                    $scope.query="SELECT * FROM players_view WHERE type='"+type+"';";
                }
            }]);
        </script>        
               
        <script src="js/display_query.js"></script>          
    </head>
    <body ng-app="root" ng-controller="ctrl">        
        <?php            
            if(COUNT($_SESSION)!=0)
                echo "current-user:".$_SESSION['username'];
        ?>    
        <input type="button" value="FW" ng-click="update('FW')">
        <input type="button" value="GK" ng-click="update('GK')">
        <input type="button" value="MID" ng-click="update('MID')">
        <input type="button" value="DEF" ng-click="update('DEF')">
        <display-query query="query" type="players"></display-query>          
    </body>
</html> 