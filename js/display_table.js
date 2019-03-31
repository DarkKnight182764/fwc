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
                    //console.log(JSON.stringify(response.data)+"\n");                                                      
                    scope.allRows=response.data.allRows;                                               
                    scope.header=response.data.fields;  
                    scope.init();                   
                    //console.log(JSON.stringify(scope.assoc));                    
                });                                                      
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