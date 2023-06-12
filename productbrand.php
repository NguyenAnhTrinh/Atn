<?php
require_once 'header.php'
?>
<article class = "container-fluid">
            <div class="row">
            <?php
             include_once 'connect1.php';
             $c=new connect();
             $dblink = $c->connectToMySQL();
             $Cat_ID = $_GET['id'];
  $sup =  $_SESSION['sup'];

             $sql= "SELECT * FROM `inventory` i inner join `user` u on i.Uid = u.UserID inner join `shops` s on s.StoreID = u.Store_ID inner join `toys` t on t.ProID = i.ProID where i.StoreID ='$sup' and CatID ='$Cat_ID'";
             $re = $dblink->query($sql);
            //  $row1 =$re->fetch_row();
            //  echo $row1[2];
            //  $re->data_seek(0);
             if($re->num_rows>0):
                while($row=$re->fetch_assoc()):
            ?>

                <!-- <h1 id = "versace" style="text-align:center;">Versace</h1> -->
                <div class="card col-12 col-sm-6 col-md-4" style="width: 21rem;">
                    
                      <a href="detail.php?id=<?= $row['ProID']?>" style="text-decoration:none;">
                      <img src="images/<?= $row['img']?>" class="card-img-top" alt="..."  width="340" height="150">
                        <div class="card-body">
                          
                        
                            <p class="card-text" style="color:black"><?=$row['ProName'] ?></p>
                           
                        
                          <a href="#" class="btn btn-primary"><i class="bi bi-cart3"><?= $row['ProPrice']?>$</i></a>
                        </div>
                      </a>
                    
                  </div>
                  <?php
            endwhile;
             else:
             echo "Not found";
             endif;
             ?>
            </div>
</article>

<?php
require_once 'footer.php'
?>