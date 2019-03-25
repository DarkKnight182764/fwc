angular.module("root").
    directive("displayTable",["$http",function($http){
        return {
            templateUrl:"display.htm",
            scope:{
                tablename:"=tablename",                
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
            }
        }
    }]);