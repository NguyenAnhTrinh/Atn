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
    </head>
    <style>
        body{
            background: linear-gradient(to right, pink,blue);
        }
       
        h1{
            text-align: center;
        }
        a{
            text-decoration: none;
            align-content: center;
        }
     
     input{
        all:unset;
        padding: 10px;
        border: 1px solid rgb(219,219,219);
        margin-top: 10px;
     }
     button {
        border-radius :25px;
        
        margin-top:10px;
        background-color: lightblue;
     }

    </style>
    <body>  
    <?php
                if(isset($_POST['btnRegister'])){
                    $usrName = isset($_POST['usrName'])? trim($_POST['usrName']):'';
                    $pass = isset($_POST['pass'])? trim($_POST['pass']):'';
                    // $conpass = isset($_POST['conpass'])? trim($_POST['conpass']):'';
                    $phone = isset($_POST['phone'])? trim($_POST['phone']):'';
                    $email = isset($_POST['Email'])? trim($_POST['Email']):'';
                    $date = date('Y-m-d',strtotime($_POST['txtbirth']));
                    $conpass = isset($_POST['conpass'])? trim($_POST['conpass']):'';
                    $email = isset($_POST['Email'])? trim($_POST['Email']):'';
                    $Address = isset($_POST['Address'])? trim($_POST['Address']):'';
                    
                    $result= '';
                    if(strlen($usrName)<4 || strlen($usrName)>10){
                        $result .= "User name lenght must from 4 to 10 characters <br>";
                        $_POST['usrName'] = '';
                    }
                    if (strlen($pass)<6 || strlen($pass)>20){
                        $result .= "Password lenght must form 6 to 20 characters<br>";
                    }
                   
                    if($conpass != $pass){
                        $result .= "Confirm Password is not confirm with password!!!<br>";
                    }   
                    if(strlen($phone) !=10){
                        $result .= "number phone lneght must be 10 characters";
                        $_POST['phone']='';
                    }
                    if ($result ==''){
                        include_once 'connect1.php';
                    $c=new connect();
                    $dblink = $c->connectToPDO();
                    $Name=$_GET['search']??'';
                    $sql= "INSERT INTO `ny2408_user`( `Email`, `usrName`, `Address`, `pass`,`conpass`,`phone`, `txtbirth`)
                     Value(?,?,?,?,?,?,?)";
                    $re = $dblink->prepare($sql);
                    $signup = $re->execute(array("$email","$usrName","$Address","$pass","$conpass", "$phone","$date"));
                    
                    if($signup){
                        echo "Signup Successful";
                        header('location:login.php');
                    }else{
                        echo "Failed!!";
                    }
                }
                    echo $result ?? '';
                } 
               
                
                    ?>
         <form id = "form1" name="form1" method ="POST" onsubmit="return fromCheck()" action="signup2.php" class = "needs-validation">
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
                padding: 20px;" class = "mt-3"
                >
                 <h1>Sign Up</h1>
                 <input type="text" placeholder="Username" name = "usrName" required value="<?=$_POST['usrName'] ?? "" ;?>">
                 <input  type="password" placeholder="Password" name ="pass" required>
                     <input  type="password" placeholder="Confirm Password" name ="conpass" required>
                     <input  type="text" placeholder="Number Phone" name ="phone" required value="<?=$_POST['phone'] ?? "" ;?>">
                     <input  type="text" placeholder="Email" name ="Email" required value="<?=$_POST['Email'] ?? "" ;?>">
                     
                     
                     <input  type="date" placeholder="birthday" name ="txtbirth" required value="<?=$_POST['txtbirth'] ?? "" ;?>">
                     <input  type="text" placeholder="Address" name ="Address" required value="<?=$_POST['Address'] ?? "" ;?>">
                     <!-- <select style = " margin-top : 20px; margin-bottom: 50px; padding: 5px" name="Cat_Id" id="Cat_Id">
                    <option value="v01">Versace</option>
                    <option value="c01">Chanel</option>
                    <option value="l01">Louis Vuitton</option>
                    <option value="audi">Audi</option>
                </select> -->
                     <button type = "submit" name = "btnRegister" value ="Signup" >Sign Up</button>
                <a href="index.php" style ="text-align: center; text-decoration: none; padding-top: 20px;">
                    <p>Back to Homepage <i class="bi bi-box-arrow-left"></i></p>
                </a>
                 
                 
        </form>
       
    </body>
</html>