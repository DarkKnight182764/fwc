<!DOCTYPE <!DOCTYPE html>
<html>
<head>        
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/tablestyle.css">
    <script>
        var app=angular.module("root",[]);
        app.controller("ctrl",["$scope",function($scope){
            $scope.query=$scope.teamname="";                        
            $scope.$watch("teamname",function(newVal,oldVal){
                if($scope.teamname.localeCompare("")!=0)
                    $scope.query="SELECT * FROM players_teams WHERE tname='"+$scope.teamname+"'";
            });         
        }])
    </script>        
    <script src="js/display_team.js"></script>
    <script src="js/display_query.js"></script>
</head>
<?php
    session_start();
    if(COUNT($_SESSION)!=0)
            echo "current-user:".$_SESSION['username'];
?>
<body ng-app="root" ng-controller="ctrl">        
    <div ng-bind="teamname"></div>
    <div ng-bind="query"></div>
    <display-team tablename="'team'" teamname="teamname"></display-team>   
    <display-query query="query"></display-query>
</body>
</html>