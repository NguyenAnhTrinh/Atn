<?php include_once"header.php";
 include_once("connect1.php"); 
 //if(isset($_SESSION['user']) && isset($SESSION['user'])); 
 $c= new connect();
   $dblink = $c->connectToPDO();
    if(isset($_SESSION ['user_Name'])){ 
        //Check if user logged into website 
        $user_id = $_SESSION['user_id'];
         
        if(isset($_GET['pid'])){ 
            //When user add an item to shopping cart 
            $quantitychosse =$_GET['quantitybuy'];
            $p_id = $_GET['pid'];
             $sqlSelect1= "SELECT pid FROM nat05_cart WHERE udi =? AND pid=?"; 
             $re= $dblink->prepare($sqlSelect1); 
             $re->execute(array("$user_id", "$p_id")); 
             //check if the item has been added 
             if ($re->rowCount()==0){ 
                //The item could not be found in user's cart 
               
                $query = "INSERT INTO `nat05_cart`(`pid`, `cquantity`, `udi`) VALUES  (?,$quantitychosse,?)"; 
             }else{ 
                //Added by user 
                    $query = "UPDATE nat05_cart SET cquantity = cquantity + $quantitychosse where  pid=? and udi=?" ;
                } 
                    $stmt = $dblink->prepare($query); 
                    $stmt->execute(array("$p_id", "$user_id" )); 
                }else if(isset($_GET['del_id'])){
                        //when user want to delete an item to shopping cart
                         $cart_del = $_GET['del_id'];
                          $query = "DELETE FROM nat05_cart WHERE cid=?"; 
                         $stmt = $dblink->prepare($query); 
                         $stmt->execute(array($cart_del));
                     }
                        $sqlSelect = "SELECT * FROM nat05_cart c, at0510_product p WHERE c.pid=p.pid and udi=?"; 
                        $stmt1 = $dblink->prepare($sqlSelect); 
                        $stmt1->execute(array($user_id));
                         $rows = $stmt1->fetchAll(PDO:: FETCH_BOTH); 
                        }
                         
                         else{ 
                            header("Location: login.php"); 
                         }
                            ?> <div class="container">
                                 <h1 class="fw-bold mb-0 text-black">Shopping Cart</h1>
                                  <h6 class="mb-0 text-muted"><?=$stmt1->rowCount() ?> item(s)</h6>
                                   <table class="table">
                                     <tr> 
                                        <th>Productname</th>
                                         <th>Quantity</th>
                                          <th>Total</th>
                                           <th>Action</th>
                                         </tr> 
                                         <?php foreach($rows as $row) 
                                         { ?>  <tr> 
                                            
                                            <td><?=$row['Name']?></td> 
                                            <td> 
                                            <input id="form1" min="0" name="quantity" value="<?=$row['cquantity']?>" type="number" class="form-control form-control-sm" />
                                        </td> 
                                        <td><h6 class="mb-0"><span>$</span> <?=$row['cquantity']?> x <?=$row['Price']?> </h6></td>
                                     <td><a href="addtocart2.php?del_id=<?=$row['cid']?>" class="text-muted text-decoration-none"><i class="bi bi-trash-fill"></i></a>
                                </td>
                                               </tr>
                                               <?php 
                                            }?>
                                            </table> 
                                            <hr class="my-4"> 
                                            <div class="pt-5"> 
                                                <h6 class="mb-0"><a href="index.php" class="text-body">Back to shop <i class="bi bi-box-arrow-left me-2"></i></a></h6> 
                                            </div>
                                            <form action ="addtobill.php">
                                             <input type="submit" value="Buy" name="btnBuy" class ="btn btn-primary" >
                                            </form>



                                            <?php
                                            require_once 'footer.php';?>