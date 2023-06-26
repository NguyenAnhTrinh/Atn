<!DOCTYPE html>
<html>

<head>
    <link rel="icon" href="../images/775307.png">
    <meta name="viewport" content="width=device-width, initial-scale =1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/fontawesome.min.css" integrity="sha512-giQeaPns4lQTBMRpOOHsYnGw1tGVzbAIHUyHRgn7+6FmiEgGGjaG0T2LZJmAPMzRCl+Cug0ItQ2xDZpTmEc+CQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
</head>
<style>
    body {
        /* background: linear-gradient(to right, pink, blue); */
    }

    h1 {
        text-align: center;
    }

    a {
        text-decoration: none;
        align-content: center;
    }

    input {
        all: unset;
        padding: 10px;
        border: 1px solid rgb(219, 219, 219);
        margin-top: 10px;
    }

    button {
        border-radius: 25px;

        margin-top: 10px;
        background-color: lightblue;
    }
</style>

<body>
    <?php
    // require 'connect1.php';

    if (!isset($_SESSION)) {
        session_start();
    }

    $shop =  $_SESSION['sup'];
    $udi = $_SESSION['uid'];
    if (isset($_POST['btnAdd'])) {
        $ProductName = isset($_POST['Productname']) ? trim($_POST['Productname']) : '';
        $Price = isset($_POST['Price']) ? trim($_POST['Price']) : '';
        $Date = date('Y-m-d', strtotime($_POST['txtbirth']));
        $Quantity = isset($_POST['Quantity']) ? trim($_POST['Quantity']) : '';
        $pricepro = $Price * 1.5;
        $result = '';
        if ($Price == " ") {
            $result .= "Confirm Password is not confirm with password!!!<br>";
        }
        if ($result == '') {
            include_once 'connect1.php';
            $c = new connect();
            $dblink = $c->connectToPDO();


            // $sql = "INSERT INTO `toys`( `ProID`, `ProName`, `ProPrice`, `img`,`CatID`,`Sid`)
            // Value(?,?,?,?,?,?)";
            // $re = $dblink->prepare($sql);
            // $signup = $re->execute(array("$Id", "$Name", "$pricepro", "$img", "$Cat", "$sup"));
            $sql1 = "INSERT INTO `inventory`( `StoreID`, `ProID`, `quantity`,`Price`, `Uid`,`UpdatePro`)
            Value(?,?,?,?,?,?)";
            $re = $dblink->prepare($sql1);
            $signu1 = $re->execute(array("$shop", "$ProductName", "$Quantity", "$pricepro", "$udi", "$Date"));



            if ($signu1) {
                echo "Signup Successful";
                header('location:Manager.php');
            } else {
                echo "Failed!!";
            }
        }

        echo $result ?? '';
    }



    ?>



    <!-- ?> -->
    <form id="form1" method="POST" action="AddSt.php" role="form">
        <div class="container col-12 col-lg-4 mx-auto">
            <div style="display: flex;
                align-items: stretch;
                align-content: center;
                flex-direction: column;
                flex-wrap: nowrap;
                justify-content: center;
                
                background-color: white;
                border: 1px solid rgb(219,219,219);
                font-family: -apple-system;
                padding: 20px;" class="mt-3">
                <!-- <h1>Login</h1> -->
                <!-- <input type="text" placeholder="Id" name="Id" required> -->
                <!-- <input type="text" placeholder="Name" name="Name" required>
             -->
             <select style=" margin-top : 20px; margin-bottom: 50px; padding: 5px" name="Productname" id="ProductName">
                    <?php
                    include_once 'connect1.php';
                    $c = new connect();
                    $dblink = $c->connectToMySQL();
                    $sql = "SELECT * FROM `toys`";
                    $re = $dblink->query($sql);
                    //  $re->execute(array("$Id"));
                    if ($re->num_rows > 0) :
                        while ($row = $re->fetch_assoc()) : ?>

                            <option value="<?= $row['ProID'] ?>"><?= $row['ProName'] ?></option>

                            <!-- <select style = " margin-top : 20px; margin-bottom: 50px; padding: 5px" name="Sup" id="Sup">
                    <option value="<?= $row['Sid'] ?>"><?= $row['SName'] ?></option>
                   
                </select> -->

                    <?php

                        endwhile;

                    else :
                        echo "Not found";

                    endif;

                    ?>
                </select>
                <input type="text" placeholder="Price" name="Price" required>
                <!-- <input type="file" placeholder="img" name="img" required> -->
                <input type="text" placeholder="Quantity" name="Quantity" required>
                
           
                <input type="date" placeholder="birthday" name="txtbirth" required value="<?= $_POST['txtbirth'] ?? ""; ?>">
                <button type="submit" value="Add" name="btnAdd">Add</button>
                <a href="Manager.php" style="text-align: center; text-decoration: none; padding-top: 20px;">
                    <p style="color:black">Back to Manager <i class="bi bi-box-arrow-left"></i></p>
                </a>
            </div>
    </form>

</body>

</html>