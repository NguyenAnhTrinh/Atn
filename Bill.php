<!DOCTYPE html>
<html>
    <head>
        <link rel ="icon" href ="../images/775307.png">
        <meta name = "viewport" content ="width=device-width, initial-scale =1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" 
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"
         integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>

         <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
          integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

          <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/fontawesome.min.css" integrity="sha512-giQeaPns4lQTBMRpOOHsYnGw1tGVzbAIHUyHRgn7+6FmiEgGGjaG0T2LZJmAPMzRCl+Cug0ItQ2xDZpTmEc+CQ==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"></script>
            <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
            <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel = "stylesheet">
    </head>
    <style>
        body{
           
            background: linear-gradient(to right, pink,blue);
        }
        
        article{
            padding-top: 30px;
            margin: 40px;
            background-color: #fff;
            height: auto;
            text-align: center;
        }
       
       
        
       
        
    </style>
    <?php
 
 include_once("connect1.php"); 
 session_start();
 //if(isset($_SESSION['user']) && isset($SESSION['user'])); 
 $c= new connect();
   $dblink = $c->connectToPDO();
   
     //Check if user logged into website 
     $user_id = $_SESSION['user_id'];
             
            
             $sqlSelect1= "select max(bid) as max from `tbl_bill`";
             $re= $dblink->prepare($sqlSelect1);
             $re->execute(array());
            $row = $re->fetch(PDO::FETCH_BOTH);
           
            $bid = $row['0'];
             


     
     ?>
    <body>
        <article >
            <h1>Successful purchase</h1>
            <hr>
            <p>Code orders : <?=$row['0']?></p>
            <?php 
             $sqlSelect1= "Select * from ny2408_user where udi = $user_id "; 
             $re= $dblink->prepare($sqlSelect1); 
            
             $re->execute(array()); 
             $row =$re->fetch(PDO::FETCH_BOTH);?>
             <div class="infor bg-white ">
             <p> Customer's Name : <?=$row['1']?></p>
            <p> Customer's Phone : <?=$row['4']?></p>
            <p>Customer's Address : <?=$row['7']?></p>
             </div>
            <hr>
            <div class="bill">
                <table class="table">
                <tr> 
                                        <th>Productname</th>
                                         <th>Quantity</th>
                                          <th>Price</th>
                                           <th>Into money</th>
                                           
                </tr>
                                        <?php 
                                        $sqlSelect = "SELECT * FROM nat05_cart c, at0510_product p WHERE c.pid=p.pid and udi=$user_id"; 
                                        $stmt1 = $dblink->prepare($sqlSelect); 
                                        $stmt1->execute(array($user_id));
                                         $rows = $stmt1->fetchAll(PDO:: FETCH_BOTH); 
                                        foreach($rows as $row) { 
                                            ?>  
                                            <tr> 
                                            
                                            <td><?=$row['Name']?></td> 
                                            <td> 
                                            <input id="form1" min="0" name="quantity" value="<?=$row['cquantity']?>" type="number" class="form-control form-control-sm" />
                                        </td> 
                                        <td><h6 class="mb-0"><span>$</span><?=$row['Price']?> </h6></td>
                                        
                                       <?php 
                                            }?>
                                            <?php 
                                        $sqlSelect = "SELECT price*cquantity as sum FROM `nat05_cart` c,at0510_product p WHERE p.pid = c.pid and udi = $user_id"; 
                                        $stmt1 = $dblink->prepare($sqlSelect); 
                                        $stmt1->execute(array($user_id));
                                         $rows = $stmt1->fetchAll(PDO:: FETCH_BOTH); 
                                        foreach($rows as $row) {
                                         ?>
                                         <td><?=$row['sum']?></td>
                                         
                                        <?php 
                                        }?>


                                     </tr>
                                     <tr>
                                        <td colspan="3">Total</td>
                                        <?php 
                                        $c=new connect();
                                        $dblink = $c->connectToMySQL();
                                        
                                        $sql= "SELECT SUM(cquantity * Price) as sum FROM at0510_product p, nat05_cart c WHERE udi =$user_id and c.pid =p.pid;";
                                        $re = $dblink->query($sql);
                                       $row1 =$re->fetch_row(); ?>
                                        <td><?= $row1[0]?></td>
                                     </tr>
                                              
                </table> 
                
                </div>
            </div>
            <h6 class="mb-0"><a href="index.php" class="text-body">Back to shop <i class="bi bi-box-arrow-left me-2"></i></a></h6> 

        </article>

    </body>
   
    </html> 
    