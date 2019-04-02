<!DOCTYPE <!DOCTYPE html>
<html>
<head>    
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
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
    <link rel="stylesheet" href="css/matches.css">
    <style>
        .lv_ul{
            text-align:center;
            margin:0px;
            font-size:15px;
        }
        .lv_li{            
            margin:0px;
        }
    </style>
</head>
<body>            
    <div ng-app="root" ng-controller="ctrl">
        <display-query type="livematch_static" refresh="refresh" query="query1"></display-query>
        <display-query type="livematch_dynamic" refresh="refresh" query="query2"></display-query>        
    </div>
</body>
</html>