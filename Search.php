<?php
require_once 'header.php'
?>
<article class="container-fluid">
  <h2>Result for "<?= $_GET['search'] ?>"</h2>
  <div class="row">

    <?php
    include_once 'connect1.php';
    $c = new connect();
    $dbsearch = $c->connectToPDO();
    if (isset($_SESSION['UserName'])) {
      $sup =  $_SESSION['sup'];
    }
    $sup = 1;

    $Name = $_GET['search'] ?? '';
    $sql = "SELECT * FROM `inventory` i inner join `user` u on i.Uid = u.UserID inner join `shops` s 
    on s.StoreID = u.Store_ID inner join `toys` t on t.ProID = i.ProID where i.StoreID = $sup and ProName Like ?";
    $re = $dbsearch->prepare($sql);
    $re->execute(array("%$Name%"));
    $rows = $re->fetchAll(PDO::FETCH_BOTH);
    foreach ($rows as $r) :

    ?>
      <div class="card col-12 col-sm-6 col-md-4" style="width: 21rem;">

        <a href="detail.php?id=<?= $r['ProID'] ?>" style="text-decoration:none;">
          <img src="images/<?= $r['img'] ?>" class="card-img-top" alt="..." width="340" height="150">
          <div class="card-body">
            <p class="card-text" style="text-decoration:none;
                            color:black"><?= $r['ProName'] ?></p>

            <a href="#" class="btn btn-primary"><i class="bi bi-cart3"><?= $r['ProPrice'] ?>$</i></a>
          </div>
        </a>

      </div>
    <?php
    endforeach;
    ?>
  </div>
  </div>
</article>

<?php
require_once 'footer.php'
?>