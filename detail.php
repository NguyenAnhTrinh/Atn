<?php
require_once 'header.php'
?>
 <article>
            
                <div class="row pb-3">
                    <?php
                    include_once 'connect1.php';
                    $c=new connect();
                    $dblink = $c->connectToMySQL();
                    $pid = $_GET['id'];
                    $sql= "select * from `toys` t inner join `inventory` i on t.ProID = i.ProID where t.ProID = '$pid'";
                    $re = $dblink->query($sql);
                    $row=$re->fetch_assoc();
                    ?>
                    <img src ="images/<?= $row['img']?>" class ="col-sm-6 col-form-label" width="50px" height="250px" > 
                    <div class="col-sm-6">
                        <p><?= $row['ProName']?></p>
                        <!-- <p><?= $row['Quantity']?> products available</p> -->
                        <form action="addtocart2.php">
                            <div class="quantity" style="padding-bottom: 20px;" >
                                <p>Quantity</p>
                                <input type="number" style="border-radius:20px" value ="1" min ="1" max ="<?=$row['quantity']?>" name = "quantitybuy">
                            </div>
                            <input type ="hidden" name ="pid" value="<?=$ProID?>">
                            <input type = "submit" class ="btn btn-primary shop_button" name ="btnAdd" value ="Add to cart"/>
                        </form>
                    </div>
                </div>
        </article>
<?php
require_once 'footer.php'
?>
