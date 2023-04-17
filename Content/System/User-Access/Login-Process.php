<?php
    session_start();
    $Process_MSG = "";
    $Error_MSG = "";
    $UserRole = "Client";
    $UserLoginCheck = "";
    $Pass_in_Username = "";
    $Pass_in_Password = "";
    $Username = "";
    if (!isset($_GET['Username']) || !isset($_GET['Password'])){
        echo "Shit";
    }
    else{
        $Pass_in_Username = $_GET['Username'];
        $Pass_in_Password = $_GET['Password'];
        $Username = $Pass_in_Username;
        require_once dirname( __DIR__ ) . "/Config/User-Access-Config.php";
        $SQL_Connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        $SQL_Statement = "Select * From performancedatabases_user where UserName = '".$Pass_in_Username."' and UserPassword = '".$Pass_in_Password."'";
        echo $SQL_Statement;
        //Check User Details
        $result = mysqli_query($SQL_Connection,$SQL_Statement);
        $RowsNum = mysqli_num_rows($result);
        if($RowsNum == 0){
            $Error_MSG = "Username and Password Does not match in our databases, Please check again.";
            $UserLoginCheck = "Not_OK";
        }
        else{
            $UserLoginCheck = "OK";
            echo $UserLoginCheck;
            Set_Session($UserLoginCheck,$Pass_in_Username);
        }
    }
    if(Set_Session($UserLoginCheck,$Username) == "Error"){
        $Error_MSG = "Error, Something went wrong, Please try again later!";
    }
    function Set_Session($UserLoginCheck,$Username){
        if($UserLoginCheck == "OK" and $Username != null){
            $_SESSION["Login"] = "True";
            $_SESSION["Username"] = $Username;
            $_SESSION["Login-Time"] = date("l jS \of F Y h:i:s A");
            $_SESSION["Role"] = "Client";
        }
        else{
            if($UserLoginCheck == "Not_OK"){
                $_SESSION["Login"] = "False";
                $_SESSION["Role"] = "Visitor";
            }
            else{
                return "Error";
            }
        }
    }
?>

<html>
    <head>
        <!-- CSS -->
        <link rel = "stylesheet" type = "text/css" href = "/Content/System/CSS/Nav-Bar.css" />
        <link rel = "stylesheet" type = "text/css" href = "/Content/System/CSS/UserAccess.css" />
        <link rel = "stylesheet" type = "text/css" href = "/Content/System/CSS/Footer.css" />
        <title>Processing | Performancedatabases.com</title>
    </head>
    <body>
        <div class="Nav-Bar">
            <ul>
                <li style="background-color:rgb(5,170,110)">
                    <a href="/Content/Home.php">Home</a>
                </li>
                <li style="float:right">
                    <a href="/Content/System/User-Access/Register.php">Register</a>
                </li>
            <ul>
        </div>
        <div class = "Display-Area">
            <div class = "Processing-Window">
                <h1><?php echo $Error_MSG?></h1>
            </div>
        </div>
        <div class = "Footer">
            <p>&copy 2018 - <?php echo date("Y") ?> Performancedatabases.com. All Rights Reserved.</p>
        </div>
    </body>
</html>