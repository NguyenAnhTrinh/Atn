<?php
class connect{
    public  $server;
    public $user;
    public $password;
    public $dbname;
    public function __construct(){
        $this->server ="localhost";//co28d739i4m2sb7j.cbetxkdyhwsb.us-east-1.rds.amazonaws.com
        $this->user="root";//tlfmtsvsrevkwg8e
        $this->password ="";//d42zaablhnmmb5lx
        $this->dbname ="atn";//mivo8hytx174ndxigit 
    }
    //option1 mysql
    function connectToMySQL():mysqli{
        $conn_my = new mysqli($this->server,$this->user,$this->password,$this->dbname);
        if ($conn_my->connect_error){
            die ("failed". $conn_my->connect_error);
        }else{
            // echo "connect thanh cong";
        }
        return $conn_my;
    }
    //option2
    function connectToPDO():PDO{
        try{
            $conn_pdo = new PDO("mysql:host=$this->server; dbname=$this->dbname",$this->user,$this->password);
            // echo "connect from pdo";
        }catch(PDOException $e){
            die ("Faile $e");
        }
        return $conn_pdo;
    }
}
// $c = new connect();
// $c->connectToMySQL();
// $c->connectToPDO();
?>

