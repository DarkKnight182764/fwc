<?php
    session_start();
?>
<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<html>
    <head>        
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>         
        <link rel="stylesheet" type="text/css" href="css/players.css">
        <script>            
            var app=angular.module("root",[]);
            app.controller("ctrl",["$scope",function($scope){
                $scope.username="<?php if(COUNT($_SESSION)!=0)echo $_SESSION['username'];?>";
                $scope.query="SELECT * FROM players_view;";                
                $scope.update=function(type){
                    $scope.query="SELECT * FROM players_view WHERE type='"+type+"';";
                }
            }]);
        </script>        
               
        <script src="js/display_query.js"></script> 
        <script src="js/navbar.js"></script>         
    </head>
    <body ng-app="root" ng-controller="ctrl" >                
        <navbar active="#players" username="username"></navbar>                    
        <div>
            <div class="container" style="margin-top:3em;margin-bottom:3em">
                <h1 class="display-4" style="border-bottom: 1px solid black;padding:0.4em;">All Players</h1>
            </div>
            <div class="container">                
                <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown">
                    Filter by position
                </button>
                <div class="dropdown-menu">
                    <input type="button" class="dropdown-item"  ng-click="update('GK')" value="Goalkeeper">
                    <input type="button"  class="dropdown-item" ng-click="update('FW')" value="Forward">
                    <input type="button"  class="dropdown-item"  ng-click="update('MID')" value="Midfielder">
                    <input type="button"  class="dropdown-item"  ng-click="update('DEF')" value="Defender">
                </div>
            </div>        
            <display-query query="query" type="players"></display-query>          
        </div>
    </body>
</html> 