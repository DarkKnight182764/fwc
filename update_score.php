<!DOCTYPE html>
<html>
    <?php
        session_start();
        if(count($_SESSION)){
            if(strcmp($_SESSION["username"],"admin")!=0){
                die("You cannot access this page");
            }
        }                
    ?>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script>
            var app=angular.module("root",[]);
            app.controller("ctrl",["$scope",function($scope){
                $scope.getString=function(date){
                   return (date.getFullYear()+"-"+(date.getMonth()+1)+"-"+date.getDate());
                }      
                $scope.inc=86400000;
               $scope.date=new Date(2019,0,1);  //1st jan 2019
               $scope.dates=[];
               for(var i=0;i<100;i++){
                   var temp=new Date($scope.date.getTime()+i*$scope.inc);
                    $scope.dates[i]=$scope.getString(temp);
                }
                //console.log(JSON.stringify($scope.dates));               
                $scope.update=function(tempdate){
                    $scope.query="SELECT * FROM fmatch_view WHERE start_date='"+tempdate+"';";                
                }                          
            }]);
        </script>
        <script src="js/display_update_score.js"></script>
        <link rel="stylesheet" href="css/matches.css">
    </head> 
    <body>
        <div ng-app="root" ng-controller="ctrl">
            <div ng-repeat="tempdate in dates">
                {{update(tempdate)}}                                             
                <display-update-score query="query"></display-update-score>
            </div>
        </div>
    </body>
</html>