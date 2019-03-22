<?php    
    class ret{
        public $fields;
        public $allRows;
        function __construct($f,$ar){            
            $this->fields=$f;
            $this->allRows=$ar;
        }
    }
    $servername="localhost";
    $username="root";
    $password="harshit2000";
    $conn=new mysqli($servername,$username,$password);
    if($conn->connect_error){
        //echo "error";
        die();
    }            
    $rec=json_decode(file_get_contents("php://input"));
    //var_dump($rec);    
    $q=("SELECT * FROM ".$rec->tablename);
    if($conn->query("USE fwc")){
        if($res=$conn->query($q)){
            echo json_encode(new ret($res->fetch_fields(),$res->fetch_all()));
            flush();
            die();
        }
    }        
    //var_dump($res);        
    //echo json_encode($res->fetch_fields())."\n";
    //echo json_encode($res->fetch_row());        
    //var_dump($temp);            
?>