<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<html>
    <head>        
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>                   
        <link rel="stylesheet" type="text/css" href="css/tablestyle.css">
        <script>
            angular.module("root",[]);
        </script>        
        <script src="js/display_table.js"></script>          
    </head>
    <body ng-app="root">
        <?php
            session_start();
            if(COUNT($_SESSION)!=0)
                echo "current-user:".$_SESSION['username'];
        ?>        
        <display-table tablename="'player'"></display-table>              
    </body>
</html> 