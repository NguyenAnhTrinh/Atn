<?php
require_once 'header.php'
?>
<baner height="300px">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" >
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner"  >
                  <div class="carousel-item active">
                    <img src="images/banner2.jpg" class="d-block w-100" alt="..." height="300px">
                  </div>
                  <div class="carousel-item">
                    <img src="images/banner3.jpg" class="d-block w-100" alt="..." height="300px">
                  </div>
                  <div class="carousel-item">
                    <img src="images/banner4.webp" class="d-block w-100" alt="..." height="150px">
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>  
        </baner>
      <article class = "container-fluid">
        <!-- mac nhat -->
        <!-- <h1 style ="text-align: center">
Top 3 highest priced products</h1> -->
            <div class="row">
            <?php
             include_once 'connect1.php';
             $c=new connect();
             $dblink = $c->connectToMySQL();
             $sup = 1;
             if (isset($_SESSION['UserName'])){
              $sup =  $_SESSION['sup'];
             }
            
             
             $sql= "SELECT * FROM `inventory` i inner join `user` u on i.Uid = u.UserID inner join `shops` s on s.StoreID = u.Store_ID inner join `toys` t on t.ProID = i.ProID where i.StoreID = $sup";
             $re = $dblink->query($sql);
            //  $row1 =$re->fetch_row();
            //  echo $row1[2];
            //  $re->data_seek(0);
             if($re->num_rows>0):
                while($row=$re->fetch_assoc()):
            ?>
                     
                
                  <div class="card col-12 col-sm-6 col-md-4" style="width: 21rem;">
                  <a href="detail.php?id=<?= $row['ProID']?>" style ="text-decoration: none;">
                      <img src="images/<?= $row['img']?>" class="card-img-top" alt="..."  width="340" height="150">
                      <div class="card-body">
                        <p class="card-text" style="color:black"><?= $row['ProName']?></p>
                        <a href="detail.php?id=<?= $row['ProID']?>" class="btn btn-primary"><i class="bi bi-cart3"><?= $row['ProPrice']?>$</i></a>
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