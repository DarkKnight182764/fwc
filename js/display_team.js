angular.module("root").
    directive("displayTeam",["$http",function($http){
        return {
            templateUrl:"display_team.htm",
            scope:{
                tablename:"=tablename",                
                teamname:"="
            },
            link:function(scope){                  
                $http({
                    url:"php/display.php",
                    method:"POST",
                    data:JSON.stringify({tablename:scope.tablename})
                }).then(function(response){     
                    console.log(JSON.stringify(response.data));                                                      
                    scope.allRows=response.data.allRows;                                               
                    scope.header=response.data.fields;                     
                });                                    
                scope.isImg=function(str){
                    if(str.indexOf("/")!=-1)
                        return true;
                    else    
                        return false;
                }
                scope.click=function(index){
                    console.log(index);
                    console.log(JSON.stringify(scope.allRows[index]));
                    scope.teamname=scope.allRows[index][1];
                }
            }
        }
    }]);