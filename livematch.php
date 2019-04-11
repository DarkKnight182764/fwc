<!DOCTYPE <!DOCTYPE html>
<html>
<head>    
    <meta charset="utf-8">
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
        app.controller("ctrl",["$scope",function($scope){
            $scope.mid=<?php
                echo $_GET["mid"];?>;            
            $scope.query1="SELECT * FROM fmatch_view WHERE mid="+$scope.mid+";";
            $scope.query2="SELECT * FROM livematch_view WHERE mid="+$scope.mid+";";
            $scope.refresh=false;
        }]);
    </script>
    <script src="js/display_query.js"></script>
    <script src="js/navbar.js"></script>
    <link rel="stylesheet" href="css/matches.css">
    <style>
        .lv_col_t1{
            text-align:right;            
        }
        .lv_col_t2{
            text-align:left;            
        }
        .lv_col_score{
            text-align:center; 
            font-weight:bold;
        }
        .lv_col_t1,.lv_col_t2,.lv_col_score{
            border-bottom:1px solid black;
        }
        .lv_outer{
            font-style:italic;
        }
    </style>    
</head>
<body>            
    <div ng-app="root" ng-controller="ctrl" class="container">
        <navbar active="#matches"></navbar>
        <display-query type="livematch_static" refresh="refresh" query="query1"></display-query>
        <display-query type="livematch_dynamic" refresh="refresh" query="query2"></display-query>        
    </div>
</body>
</html>