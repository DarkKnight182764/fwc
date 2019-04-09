<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/players.css">
    <link rel="stylesheet" type="text/css" href="css/matches.css">
    <script>
        var tid=<?php echo $_GET["tid"];?>;
        var tname="<?php echo $_GET["tname"];?>";
        console.log(tname);
        var app=angular.module("root",[]);
        app.controller("ctrl",["$scope",function($scope){
            $scope.playerQuery="SELECT * FROM players_view WHERE tname='"+tname+"';";
            $scope.matchQuery="SELECT * FROM fmatch_view WHERE t1name='"+tname+"' OR t2name='"+tname+"';";
        }]);        
    </script>
    <script src="js/display_query.js"></script>    
</head>
<body ng-app="root" ng-controller="ctrl">  
    <div style="border:1px solid black">  
        <h2>Players</h2>
        <display-query type="players" query="playerQuery"></display-query>
        <h2>Matches</h2>
        <display-query type="teamviewer_match" query="matchQuery"></display-query>
    </div>
</body>
</html>