<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<style>
		.hor{
			display:inline-block
		}
	</style>
</head>
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
		$scope.stadiumQuery="SELECT * FROM stad_seats WHERE stad_name='"+"<?php echo $_GET["stadium"]?>"+"';";
		$scope.nums=[0,0,0,0];
		$scope.username="<?php if(COUNT($_SESSION)!=0)echo $_SESSION['username'];?>";
		$scope.update=function(index,val){
			if(val==-1){
				if($scope.nums[index]>0)
					$scope.nums[index]--;
			}
			else
				$scope.nums[index]++;				
		}
	}]);
</script>
<script src="js/navbar.js"></script>
<script src="js/display_query.js"></script>
<body ng-app="root" ng-controller="ctrl">
	<navbar active="#ticketing" username="username"></navbar>
	<display-query type="stadium" query="stadiumQuery"></display-query>
	<ul>
		<li ng-repeat="x in nums track by $index">
			<ul >
				<li class="hor">
					<input type="button" value="+" ng-click="update($index,1)">		
				</li>
				<li class="hor">
					acbn			
				</li>
				<li class="hor">
					<input type="button" value="-" ng-click="update($index,-1)">		
				</li>
				<li class="hor">
					{{nums[$index]}}
				</li>
			</ul>
		</li>		
	</ul>
</body>
</html>
