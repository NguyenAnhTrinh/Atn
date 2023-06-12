<?php
// require 'connect1.php';
//         include_once 'connect1.php';
//         $c=new connect();
//         $dblink = $c->connectToMySQL();
        // $pid = $_POST['Id'];
        $Id = isset($_POST['Id']) ? trim($_POST['Id']) : '';
        $Name = isset($_POST['Name']) ? trim($_POST['Name']) : '';
        $img = isset($_POST['img']) ? trim($_POST['img']) : '';


        $Price = isset($_POST['Price']) ? trim($_POST['Price']) : '';
        $Status = isset($_POST['Status']) ? trim($_POST['Status']) : '';
        $Des = isset($_POST['Des']) ? trim($_POST['Des']) : '';
        $Quantity = isset($_POST['Quantity']) ? trim($_POST['Quantity']) : '';
        $Cat = isset($_POST['Cat_Id']) ? trim($_POST['Cat_Id']) : '';

        $result = '';
        // if ($Id == " ") {
        //     $result .= "User name lenght must from 4 to 10 characters <br>";
        //     $_POST['usrName'] = '';
        // }
        if ($Name == " ") {
            $result .= "Password lenght must form 6 to 20 characters<br>";
        }

        if ($Price == " ") {
            $result .= "Confirm Password is not confirm with password!!!<br>";
        }

        if ($result == '') {
            include_once 'connect1.php';
            $c = new connect();
            $dblink = $c->connectToPDO();
            // $Name=$_GET['search']??'';
            $query = "UPDATE nat05_cart SET SET Name = $Name,
            Price = $Price,
            Status = $Status,
            Description = $Des,
            Image = $img,
            Quantity = $Quantity,
            Cat_ID = $Cat where  pid= ? " ;
            // $sql = "UPDATE `at0510_product` SET Name = $Name,
            // Price = $Price,
            // Status = $Status,
            // Description = $Des,
            // Image = $img,
            // Quantity = $Quantity,
            // Cat_ID = $Cat where  pid= $Id ";
            $re = $dblink->prepare($query);
            $re->execute(array("$Id"));

            if ($re) {
                echo "Signup Successful";
                header('location:Manager.php');
            } else {
                echo "Failed!!";
            }
        }
        echo $result ?? '';
    
    ?>