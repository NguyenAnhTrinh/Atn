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
                    include_once 'connect1.php';
                    $c=new connect();
                    $dblink = $c->connectToMySQL();
                    $pid = $_GET['id'];
                    $sql= "select * from `at0510_product` where pid = '$pid'";
                    $re = $dblink->query($sql);
                    $row=$re->fetch_assoc();
                    

    // if (isset($_POST['BtnEdit'])) {
    //     $Id = isset($_POST['Id']) ? trim($_POST['Id']) : '';
    //     $Name = isset($_POST['Name']) ? trim($_POST['Name']) : '';
    //     $img = isset($_POST['img']) ? trim($_POST['img']) : '';


    //     $Price = isset($_POST['Price']) ? trim($_POST['Price']) : '';
    //     $Status = isset($_POST['Status']) ? trim($_POST['Status']) : '';
    //     $Des = isset($_POST['Des']) ? trim($_POST['Des']) : '';
    //     $Quantity = isset($_POST['Quantity']) ? trim($_POST['Quantity']) : '';
    //     $Cat = isset($_POST['Cat_Id']) ? trim($_POST['Cat_Id']) : '';

    //     $result = '';
    //     if ($Id == " ") {
    //         $result .= "User name lenght must from 4 to 10 characters <br>";
    //         $_POST['usrName'] = '';
    //     }
    //     if ($Name == " ") {
    //         $result .= "Password lenght must form 6 to 20 characters<br>";
    //     }

    //     if ($Price == " ") {
    //         $result .= "Confirm Password is not confirm with password!!!<br>";
    //     }

    //     if ($result == '') {
    //         include_once 'connect1.php';
    //         $c = new connect();
    //         $dblink = $c->connectToPDO();
    //         // $Name=$_GET['search']??'';
    //         $sql = "INSERT INTO `at0510_product`( `pid`, `Name`, `Price`, `Status`,`Description`,`Image`,`Quantity`,`Cat_ID`)
    //         Value(?,?,?,?,?,?,?,?)";
    //         $re = $dblink->prepare($sql);
    //         $signup = $re->execute(array("$Id", "$Name", "$Price", "$Status", "$Des","$img", "$Quantity", "$Cat"));

    //         if ($signup) {
    //             echo "Signup Successful";
    //             header('location:Manager.php');
    //         } else {
    //             echo "Failed!!";
    //         }
    //     }
    //     echo $result ?? '';
    // }


    ?>
    <form id="form1" method="POST" action="Edit.php" role="form">
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
                <input type="text" value="<?= $row['pid']?>" placeholder="Id" name="Id" required disabled>
                <input type="text" value="<?= $row['Name']?>" placeholder="Name" name="Name" required>
                <input type="text" value="<?= $row['Price']?>" placeholder="Price" name="Price" required>
                <input type="file"  placeholder="img" name="img">
                <!-- <input type="text" value="<?= $row['Status']?>"placeholder="Status" name="Status" required> -->
                <select style = " margin-top : 20px; margin-bottom: 50px; padding: 5px" name="Status" id="Status">
                    <option value="1">Still for sale</option>
                    <option value="0">Out of stock</option>
                    <!-- <option value="l01">Louis Vuitton</option> -->
                    <!-- <option value="audi">Audi</option> -->
                </select>
                <input type="text" value="<?= $row['Description']?>" placeholder="Des" name="Des" required>
                <input type="text"  value="<?= $row['Quantity']?>" placeholder="Quantity" name="Quantity" required>

                <select style = " margin-top : 20px; margin-bottom: 50px; padding: 5px" name="Cat_Id" id="Cat_Id">
                    <option value="v01">Versace</option>
                    <option value="c01">Chanel</option>
                    <option value="l01">Louis Vuitton</option>
                    <!-- <option value="audi">Audi</option> -->
                </select>
                <button type="submit" value="Edit" name="BtnEdit">Edit</button>

                <a href="Manager.php" style="text-align: center; text-decoration: none; padding-top: 20px;">
                    <p style="color:black">Back to Manager <i class="bi bi-box-arrow-left"></i></p>
                </a>
            </div>
    </form>

</body>

</html>