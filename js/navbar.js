angular.module("root").
    directive("navbar",["$http",function($http){
        return({
            templateUrl:"htm/navbar.htm",
            scope:{
                username:"=username"
            },
            link:function(scope,elem,attr){
                var myEl = angular.element( document.querySelector(attr.active) );
                myEl.addClass('active');
                console.log(scope.username);
                scope.res=true;                
                scope.isLoggedIn=function(){
                    if(scope.username.length==0)
                        return false;
                    else
                        return true;
                }
                scope.submit=function(createAcc){                
                    if(createAcc){
                        console.log("Creating new account");
                        if(scope.cAPassword==scope.cARepeatPassword){
                            $http({  
                                url:"php/insert.php",
                                method:"POST",
                                data:JSON.stringify({query:"INSERT INTO user(username,password) VALUES ('"+scope.cAUsername+
                                "','"+scope.cAPassword+"')",username:scope.cAUsername})                            
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
                        }
                    }
                    else{
                        $http({
                            url:"php/validate.php",
                            method:"POST",
                            data:JSON.stringify({username:scope.eAUsername,password:scope.eAPassword})                         
                        }).then(function(response){   
                            console.log(response.data);
                            var temp=JSON.parse(response.data);
                            if(temp){
                                console.log(response.data);
                                scope.res=true;                            
                                window.location.assign(window.location.href);                        
                            }
                            else{
                                scope.res=false;
                            }                        
                        });
                    }
                }
                scope.logOut=function(){
                    $http({  
                        url:"php/logout.php",                                                
                    }).then(function(response){
                        console.log(response.data);
                        window.location.assign(window.location.href);                        
                    });
                }
            }
        });
    }]);