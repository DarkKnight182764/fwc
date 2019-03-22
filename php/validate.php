<?php
    $servername="localhost";
    $username="root";
    $password="harshit2000";
    $result=false;
    $conn=new mysqli($servername,$username,$password);
    if($conn->connect_error){
        $result=false;
        echo (json_encode($result));        
        flush();
        die();
    }
    $rec=json_decode(file_get_contents("php://input"));
    //echo file_get_contents("php://input");
    //echo $rec->username;
    session_start();
    $_SESSION["username"]=$rec->username;    
    $q="USE fwc;";
    if($conn->query($q)){
        $q="SELECT * FROM user WHERE username='$rec->username' AND password='$rec->password';";
       //echo $q;
        if($res=$conn->query($q)){
            if($res->num_rows>0){
                $result=true;
                //echo $res->num_rows();
                echo (json_encode($result)); 
                exit();       
            }
            else{                
                $result=false;
                echo (json_encode($result));
                exit();        
            }
        }
    }            
    $result=false;
    echo (json_encode($result));   
?>