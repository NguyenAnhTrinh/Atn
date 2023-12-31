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
        background: linear-gradient(to right, pink, blue);
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
    require 'connect1.php';
    session_start();
    if (isset($_POST['btnLogin'])) {
        if (isset($_POST['pass']) && isset($_POST['usrName'])) {
            $pass = $_POST['pass'];
            $usrName = $_POST['usrName'];
            $c = new connect();
            $dblink = $c->connectToPDO();
            $sql = "select * from user where UserName =? and Pass =?";
            $stmt = $dblink->prepare($sql);
            $re = $stmt->execute(array("$usrName", "$pass"));
            $numrow = $stmt->rowCount();
            $row = $stmt->fetch(PDO::FETCH_BOTH);
            if ($numrow == 1) {
                echo "Login Successfully!";
                $_SESSION['UserName'] = $row['UserName'];
                $_SESSION['uid'] = $row['UserID'];
                $_SESSION['sup'] = $row['Store_ID'];

                header("location:index.php");
            } else {
                echo "Wrong Username or Password ";
            }
        } else {
            echo "Please enter your info";
        }
    }



    ?>
    <form id="form1" method="POST" action="login.php" role="form">
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
                <h1>Login</h1>
                <input type="text" placeholder="Username" name="usrName" required>
                <input type="password" placeholder="Password" name="pass" required>
                <button type="submit" value="Login" name="btnLogin">Login</button>

                <div style="display:flex;
                 margin-top: 30px;
                 flex-direction: row;
                 align-items: center;">
                </div>
                <div style="background-color:gray;
                 height: 1px;
                 width:100%;
                 "></div>
                <a href="#">
                    <div style="color:blue;
                     text-align: center;">Forgot Password?</div>
                </a>
            </div>


            <div style=" 
                       align-items: stretch;
                       align-content: center;
                       flex-direction: column;
                       flex-wrap: nowrap;
                       justify-content: center;
                       background-color: white;
                       border: 1px solid rgb(219,219,219);
                       font-family: -apple-system;
                       padding: 10px;
                       text-align: center;" class="mt-3">
                Don't have an account?<a href="signup2.php">Sign up</a>
            </div>

            <a href="index.php" style="text-align: center; text-decoration: none; padding-top: 20px;">
                <p style="color:black">Back to Homepage <i class="bi bi-box-arrow-left"></i></p>
            </a>
        </div>
    </form>

</body>

</html>