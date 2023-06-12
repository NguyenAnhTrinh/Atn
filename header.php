<?php
session_start();
ob_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel ="icon" href ="images/775307.png">
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
            <title>YTSeller</title>
    </head>
    <style>
        .dropdown:hover .dropdown-menu{
            display: block;
            background-color: #fff;
        
        }
        h1{
            font-size: 20px;
           
        }
        footer .header p:nth-child(2){
            color: red;
        }
        footer{
            border-bottom: 1px solid black ;
        }
        late{
            padding-left: 340px;
        }
        body .carousel-item {
            height: 150px;
        }
        article{
            padding-top: 10px;
        }
        nav a:hover{
            border-bottom: 1px solid white;
        }
        
       
    </style>
    <body  style ="">
    <nav class ="navbar navbar-expand-md navbar-dark bg-black" >
                <a href="homepage.php" class = "navbar-brand">
                    <img src="images/logoATN.jpg" width="60px" height="40px">
                </a>
                <button class="navbar-toggler" type = "button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
                    <span class = "navbar-toggler-icon"></span>
                </button>
                <div class = "collapse navbar-collapse" id="navbarMain">
                    <div class="navbar-nav">
                        <a href ="../simpleweb/homepage.php" class ="nav-link active">
                        Home    
                        </a>
                        <a href ="../simpleweb/sale.php" class ="nav-link active">
                            Sale  
                        </a>
                        <a href ="../simpleweb/contact.php" class ="nav-link active">
                            Contact 
                        </a>
                        <div class="dropdown">
                            <a class = "nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                                Brand
                            </a>
                            <div class="dropdown-menu">

                            <?php
             include_once 'connect1.php';
             $c=new connect();
             $dblink = $c->connectToMySQL();
             $sql= "select *  from `tb_cat`";
             $re = $dblink->query($sql);
            //  $row1 =$re->fetch_row();
            //  echo $row1[2];
            //  $re->data_seek(0);
            
                while($row=$re->fetch_assoc()):
            ?>
                            <a class = "dropdown-item" href="productbrand.php?id=<?=$row['CatID']?>"><?=$row['CatName']?></a>
             
                            <?php endwhile; ?>
                               
                            
                            </div>
                           
                        </div>
                        <?php
                        if (isset($_SESSION['UserName'])):
                           // if (isset($_COOKIE['ccusername'])):
                         ?>
                        <a href ="../simpleweb/Manager.php" class ="nav-link active">
                        Manager    
                        </a>
                        <?php 
                        else:
                        ?>
                        <a href ="../simpleweb/Manager.php" class ="nav-link active" hidden>
                        Manager    
                        </a>
                        <?php
                    endif;
                     ?>
                    </div>
                    <div class ="navbar-nav mx-auto">
                        <form action="Search.php">
                        <div class="input-group input-group-sm">
                            
                                <span class="input-group-text" id="inputGroup-sizing-sm" name="btnSearch"><i class="bi bi-search"></i></span>
                                <input type="text" class="form-control" aria-label="Sizing example input" 
                                name ="search" aria-describedby="inputGroup-sizing-sm" placeholder="Search.." id ="search">
                                <!-- <input type ="search" placeholder="Search.." > -->
                                <button type="submit" name="btnSearch" style="background-color:white;" >Search</button>
                            </div></form>
                        
                    </div>
                    <div class="navbar-nav ms-auto">
                    <?php
                        if (isset($_SESSION['UserName'])):
                           // if (isset($_COOKIE['ccusername'])):
                         ?>
                        <a href ="#" class = "nav-item nav-link" ><i class="bi bi-person-circle"></i>Wellcome, <?=$_SESSION['UserName']?></a>
                        <a href ="logout.php" class = "nav-item nav-link" > Logout <i class="bi bi-box-arrow-left"></i></a>
                        <a href = "addtocart2.php" style ="color:#fff ; font-size: 25px; padding-right: 10px;" ><i class="bi bi-cart-check"></i></a>
                        <?php 
                        else:
                        ?>
                    
                        <a href ="../simpleweb/login.php" class = "nav-item nav-link" ><i class="bi bi-person-circle"></i>Login,</a>
                        <a href ="../simpleweb/signup2.php" class = "nav-item nav-link" > Registration</a>
                        <?php
                    endif;
                     ?>
                      
                    </div>
                   
                    
            </div>
        </nav>