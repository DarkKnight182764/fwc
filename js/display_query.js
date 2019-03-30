angular.module("root").
    directive("displayQuery",["$http",function($http){
        return {
            templateUrl:"display.htm",
            scope:{
                query:"=query"                
            },
            link:function(scope){   
                scope.$watch("query",function(newVal,oldVal){
                    console.log(JSON.stringify(scope.query));  
                    console.log(typeof(scope.query));
                    $http({
                        url:"php/display_query.php",
                        method:"POST",
                        data:JSON.stringify({query:scope.query})
                    }).then(function(response){     
                        console.log(JSON.stringify(response.data));                                                      
                        scope.allRows=response.data.allRows;                                               
                        scope.header=response.data.fields;   
                        scope.init();                  
                    },function(reject){
                        console.log("err"+JSON.stringify(reject));
                    });                                    
                });
                scope.isImg=function(str){
                    if(str.indexOf("/")!=-1)
                        return true;
                    else    
                        return false;
                }
                scope.init=function(){
                    addRow=function(str,rownum){
                        for(var i=0;i<scope.allRows[rownum].length;i++){
                            str=str+"\""+scope.header[i].name+"\":";                            
                            str=str+"\""+scope.allRows[rownum][i]+"\"";                                                                                   
                            if(i!=scope.allRows[rownum].length-1)
                                str=str+",";
                        }                                        
                        return str;
                    };
                    var str="[";
                    for(var i=0;i<scope.allRows.length;i++){
                        str+="{";
                        str=addRow(str,i);
                        str+="}";
                        if(i!=scope.allRows.length-1)
                            str+=",";
                    }
                    str+="]";
                    console.log(str);
                    scope.data=JSON.parse(str);                    
                }   
            }
        }
    }]);