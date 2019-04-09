angular.module("root").
    directive("displayQuery",["$http","$interval",function($http,$interval){
        return {
            templateUrl:function(elem,attr){                  
                if(attr.type==="players")
                    return "htm/display.htm";
                else if(attr.type==="match")
                    return "htm/display_match.htm";
                else if(attr.type==="livematch_static")
                    return "htm/display_livematch_static.htm";
                else if(attr.type==="livematch_dynamic")
                    return "htm/display_livematch.htm";
                else if(attr.type==="teamviewer_match")
                    return "htm/teamviewer_match.htm";
            },
            scope:{
                query:"=query",
                refresh:"=refresh"          
            },
            link:function(scope,elem,attrs){                   
                console.log("link");
                function temp(newVal,oldVal){
                    console.log("http");
                    //console.log(JSON.stringify(scope.query));  
                    //console.log(typeof(scope.query));
                    $http({
                        url:"php/display_query.php",
                        method:"POST",
                        data:JSON.stringify({query:scope.query})
                    }).then(function(response){     
                        //console.log(JSON.stringify(response.data));                                                      
                        scope.allRows=response.data.allRows;                                               
                        scope.header=response.data.fields;   
                        scope.init();                  
                    },function(reject){
                        console.log("err"+JSON.stringify(reject));
                    });
                } 
                scope.$watch("query",function(newVal,oldVal){
                    temp(newVal,oldVal);
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
                if(attrs.type==="match" || attrs.type==="teamviewer_match"){
                    scope.click=function(mid){
                        console.log(mid);
                        window.location.assign("livematch.php?mid="+mid);
                    }
                }   
                else if(attrs.type==="livematch_dynamic"){
                    scope.data=[];
                    var prev=scope.data.slice();
                    $interval(function(){
                        if(prev.length!=scope.data.length){
                            scope.refresh=true;                            
                        }
                        prev=scope.data.slice();
                        console.log("refresh");                        
                        temp(0,0);                        
                    },1000);
                }          
                else if(attrs.type==="livematch_static"){
                    scope.$watch("refresh",function(newVal,oldVal){
                        console.log("static refresh");
                        temp(0,0);
                        scope.refresh=false;
                    })
                }    
            }
        }
    }]);