<!DOCTYPE html>
<html>
    <head>        
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>                   
        <link rel="stylesheet" type="text/css" href="css/tablestyle.css">
        <script src="js/display.js"></script>          
    </head>
    <body>
        <?php
            session_start();
            echo "current-user:".$_SESSION['username'];
        ?>
        <div ng-app="display" ng-controller="displayController" ng-init="display('player')">    
            <div ng-include="'display.htm'"></div>        
        </div>
    </body>
</html> 