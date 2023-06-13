<?php
require_once 'header.php'
?>
    <h1>Product List</h1>
    <button style ="border-radius:10px;
    margin-bottom : 20px;
    background:rgb(0, 149,246,0.3);
    border:1px solid white;
    " ><a href ="./AddPro.php">Add New Item</a></button>
    <button style ="border-radius:10px;
    margin-bottom : 20px;
    background:rgb(0, 149,246,0.3);
    border:1px solid white;
    " ><a href ="./AddSt.php">Add to Shop</a></button>
    <table class="table">
        <thead>
            <tr>
                <!-- <th>No.</th> -->
                <!-- <th>ID Product</th> -->
                <th>Name</th>
                <th>Price</th>
                <th>User</th>

                <th>Actions</th>
                <!-- <th>Actions</th> -->
            </tr>
        </thead>
        <tbody>
        <?php
             include_once 'connect1.php';
             $c=new connect();
             if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    // print_r ($_SESSION);
             $dblink = $c->connectToMySQL();
            //  if (isset($_SESSION['UserName']))
                $uid = $_SESSION['uid'];
    $sup =  $_SESSION['sup'] ;

            //  $dblink = $c->connectToPDO();
             $sql= "SELECT * FROM `inventory` i inner join `user` u on i.Uid = u.UserID inner join `shops` s on s.StoreID = u.Store_ID inner join `toys` t on t.ProID = i.ProID where i.StoreID = $sup";
             $re = $dblink->query($sql);
            //  $re->execute(array("$Id"));
             if($re->num_rows>0):
                while($row=$re->fetch_assoc()):
            ?>
            <tr>
            
                <!-- <td><?= $row['pid']?></td> -->
                <td><?= $row['ProName']?></td>
                <!-- <td><img src="images/<?= $row['Image']?>" class="card-img-top"  width="15px" height="70px"></td> -->

                <!-- <td><?= $row['Name']?></td> -->
                <td><?= $row['Price']?> $</td>
                <td><?= $row['UserName']?> </td>
                <td><?= $row['UpdatePro']?> </td>

                    
                </td>
            </tr>
            <?php
             
            endwhile;
        
             else:
             echo "Not found";
             
             endif;
             ?> 
       
        </tbody>
    </table>


    <?php
require_once 'footer.php'
?>

