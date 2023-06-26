<?php
class connect{
    public  $server;
    public $user;
    public $password;
    public $dbname;
    public function __construct(){
        $this->server ="co28d73914m2sb7j.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
        $this->user="dd30cfsah871f59a";
        $this->password ="bfmyBqjcfj4ocabx";
        $this->dbname ="ggi47sxzfsulpb31";
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

