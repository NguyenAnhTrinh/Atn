<?php
 
include_once("connect1.php"); 
session_start();
//if(isset($_SESSION['user']) && isset($SESSION['user'])); 
$c= new connect();
  $dblink = $c->connectToPDO();
  if(isset($_GET['btnBuy'])){ 
    //Check if user logged into website 
    $user_id = $_SESSION['user_id'];
         $sqlSelect1= "SELECT  SUM(cquantity * Price) as sum FROM at0510_product p, nat05_cart c WHERE udi =? and c.pid =p.pid "; 
         $re= $dblink->prepare($sqlSelect1); 
        
         $re->execute(array("$user_id")); 
         $row =$re->fetch(PDO::FETCH_BOTH);

         
         $total = $row['0'];
         
         $query ="INSERT INTO `tbl_bill`( `Total`, `uid`) VALUES (?,?)";
        $re= $dblink->prepare($query);
        $re->execute(array($total,"$user_id"));

           $sqlSelect1= "select max(bid) as max from `tbl_bill`";
           $re= $dblink->prepare($sqlSelect1);
           $re->execute(array());
          $row = $re->fetch(PDO::FETCH_BOTH);
         
          $bid = $row['0'];
          $sqlSelect1= "SELECT * FROM nat05_cart WHERE udi =? "; 
             $re= $dblink->prepare($sqlSelect1); 
             $re->execute(array("$user_id")); 
             $rows = $re->fetchAll(PDO::FETCH_BOTH);
             if ($re->rowCount()>0){  
              foreach($rows as $r){
                $pid = $r['pid'];
                $query= "INSERT INTO `tbl-billdetail`( `bid`, `pid`, `bquan`) VALUES ($bid, ?, ?)";
                $re= $dblink->prepare($query);
                $re->execute(array("$pid",$r['cquantity']));
              }
            header('location:Bill.php');
            
                
             }
          

          
          
  // } 
 

}
       
?>