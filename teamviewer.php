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
    <link rel="stylesheet" type="text/css" href="css/players.css">
    <link rel="stylesheet" type="text/css" href="css/matches.css">
    <script>
        var tid=<?php echo $_GET["tid"];?>;
        var tname="<?php echo $_GET["tname"];?>";
        console.log(tname);
        var app=angular.module("root",[]);
        app.controller("ctrl",["$scope",function($scope){
            $scope.username="<?php if(COUNT($_SESSION)!=0)echo $_SESSION['username'];?>";
            $scope.playerQuery="SELECT * FROM players_view WHERE tname='"+tname+"';";
            $scope.matchQuery="SELECT * FROM fmatch_view WHERE t1name='"+tname+"' OR t2name='"+tname+"'; ORDER BY start_date";
            $scope.headerQuery="SELECT * FROM team WHERE tid="+tid+";";
            $scope.update=function(type){
                $scope.playerQuery="SELECT * FROM players_view WHERE type='"+type+"' AND tname='"+tname+"';";
            }
        }]);        
    </script>
    <script src="js/display_query.js"></script>    
    <script src="js/navbar.js"></script>
    <style>
        * {
            box-sizing: border-box;
        }

        .card-img-top {
            border-radius: 0;
        }

        .border-gradient {
            border-image-slice: 1;
            border-width: 5px;
        }
        .container-fluid {            
            padding: 3em;
            text-align: center;
        }

        .inline {
            display: inline;
        }
        .btn{
            border-radius:0;
        }        
    </style>
</head>
<body ng-app="root" ng-controller="ctrl"> 
    <navbar active="#teams" username="username"></navbar> 
    
    <display-query type="team-header" query="headerQuery"></display-query>

    <!--Players-->    
    <div class="container" style="margin-top:3em;margin-bottom:3em">
        <h1 class="display-4" style="border-bottom: 1px solid black;padding:0.4em;">Players</h1>
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
    <display-query type="players" query="playerQuery"></display-query>

    <!--Matches-->
    <div class="container" style="margin-top:3em;margin-bottom:3em">
        <h1 class="display-4" style="border-bottom: 1px solid black;padding:0.4em;">Matches</h1>
    </div>
    <display-query type="teamviewer_match" query="matchQuery"></display-query>    
</body>
</html>