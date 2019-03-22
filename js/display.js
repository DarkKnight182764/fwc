var app=angular.module("display",[]);
app.controller("displayController",function($scope,$http){       
    $scope.display=function(tn){                    
        $scope.tablename=tn;        
        $http({
            url:"php/display.php",
            method:"POST",
            data:JSON.stringify({tablename:$scope.tablename})
        }).then(function(response){    
            console.log(JSON.stringify(response.data));                                                      
            $scope.allRows=response.data.allRows;                                               
            $scope.header=response.data.fields;                                              
        });                    
    }             
});