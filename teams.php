<?php
    session_start();
    if(COUNT($_SESSION)==0)
        header("location:"."index.html");        
?>
<!DOCTYPE <!DOCTYPE html>
<html>
<head>        
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/tablestyle.css">
    <link rel="stylesheet" type="text/css" href="css/players.css">
    <link rel="stylesheet" type="text/css" href="css/teams.css">
    <script>
        var app=angular.module("root",[]);
        app.controller("ctrl",["$scope",function($scope){                                        
        }])
    </script>        
    <script src="js/display_table.js"></script>    
</head>
<?php    
    if(COUNT($_SESSION)!=0)
        echo "current-user:".$_SESSION['username']."<br>";
?>
<body ng-app="root" ng-controller="ctrl">                    
    <display-table tablename="'team'" type="teams"></display-table>
</body>
</html>