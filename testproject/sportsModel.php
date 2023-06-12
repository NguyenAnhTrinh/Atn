<?php
    
    class sportsModel
    {
        // set database config for mysql
        function __construct($consetup)
        {
            $this->host = $consetup->host;
            $this->user = $consetup->user;
            $this->pass =  $consetup->pass;
            $this->db = $consetup->db;                              
        }
        // open mysql data base
        public function open_db()
        {
            
            try{
                $this->condb = new PDO("mysql:host=$this->host;
                dbname=$this->db",$this->user,$this->pass);
                $this->condb->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e){
                die("Failed $e");
            }
        }
        // close database
        public function close_db()
        {
            $this->condb = null;
        }   

        // insert record
        public function insertRecord($obj)
        {
            try
            {   
                $this->open_db();
                $query=$this->condb->prepare("INSERT INTO sports (category,name)
                   VALUES (?, ?)");
                
                $query->execute(array($obj->category,$obj->name));
                $lastId = $this->condb->lastInsertId();
                $this->close_db();
                return $lastId;
            }
            catch (Exception $e) 
            {
                $this->close_db();  
                throw $e;
            }
        }
        //update record
        public function updateRecord($obj)
        {
            try
            {   
                $this->open_db();
                $query=$this->condb->prepare("UPDATE sports SET category=?,
          name=? WHERE id=?");
                
                $query->execute(array($obj->category,$obj->name,$obj->id));
                
                
                $this->close_db();
                return true;
            }
            catch (Exception $e) 
            {
                $this->close_db();
                throw $e;
            }
        }
         // delete record
        public function deleteRecord($id)
        {   
            try{
                $this->open_db();
                $query=$this->condb->prepare("DELETE FROM sports WHERE id=?");
                
                $query->execute(array($id));
                $this->close_db();
                return true;    
            }
            catch (Exception $e) 
            {
                $this->close_db();
                throw $e;
            }       
        }   
        // select record     
        public function selectRecord($id)
        {
            try
            {
                $this->open_db();
                if($id>0)
                {   
                    $query=$this->condb->prepare("SELECT * FROM sports WHERE id=?");
                    $query->execute(array($id));
                }
                else
                {
                    $query=$this->condb->prepare("SELECT * FROM sports");   
                    $query->execute();
                }                       
                $this->close_db();                
                return $query;
            }
            catch(Exception $e)
            {
                $this->close_db();
                throw $e;   
            }
            
        }
    }

?>
