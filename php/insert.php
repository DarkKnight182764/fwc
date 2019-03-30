<?php
    $servername="localhost";
    $username="root";
    $password="harshit2000";
    $result;
    //echo "start";
    $conn=new mysqli($servername,$username,$password);
    if($conn->connect_error){
        $result=false;
        echo (json_encode($result));        
        die();
    }
    $ip=json_decode(file_get_contents("php://input"));
    if(isset($ip->username)){
        session_start();
        $_SESSION["username"]=$ip->username;    
    }
    $q="USE fwc;";
    $q.=$ip->query.";";
    //echo $q;
    if($conn->multi_query($q)){
        $result=true;
        echo (json_encode($result));        
    }
    else{
        $result=false;
        echo (json_encode($result));        
    }
    flush();
?>