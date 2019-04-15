<?php
    session_start();
?>
<!DOCTYPE html>
<html>
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
<script>
	var app=angular.module("root",[]);
	app.controller("ctrl",["$scope",function($scope){
        $scope.username="<?php if(COUNT($_SESSION)!=0)echo $_SESSION['username']; ?>";
        console.log()
        var cat1=<?php echo $_GET['cat1']; ?>;
        var cat2=<?php echo $_GET['cat2']; ?>;
        var cat3=<?php echo $_GET['cat3']; ?>;
        var cat4=<?php echo $_GET['cat4']; ?>;
        var mid=<?php echo $_GET['mid']; ?>;
        $scope.query="INSERT INTO booking(uid,mid,cat1,cat2,cat3,cat4) VALUES((SELECT uid FROM user WHERE username='"+$scope.username+"'),"+mid+","+cat1+","+cat2+","+cat3+","+cat4+");";
        $http({  
            url:"php/insert.php",
            method:"POST",
            data:JSON.stringify({query:$scope.query})                            
        }).then(function(response){
            console.log(response.data);
            //console.log(JSON.stringify(response));                            
            console.log(response.data);
            var temp=JSON.parse(response.data);
            if(temp){
                console.log("Inserted");
                scope.res=true;   
                window.location.assign(window.location.href);
            }
            else{
                console.log("Err");
                scope.res=false;
            }
        });
	}]);
</script>
<script src="js/navbar.js"></script>
<script src="js/display_query.js"></script>
<link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" />      
<link rel="stylesheet" href="css/navbar.css">
<body ng-app="root" ng-controller="ctrl">
    <navbar active="#ticketing" username="username"></navbar>  
    <div ng-if="res">
        Your booking has been confirmed
    </div>
    <div ng-if="!res">
        Booking could not be done
    </div>
</body>
</html>