<?php
    session_start();
?>
<html>
    <head>
        <!-- CSS -->
        <link rel = "stylesheet" type = "text/css" href = "/Content/System/CSS/Nav-Bar.css" />
        <link rel = "stylesheet" type = "text/css" href = "/Content/System/CSS/UserAccess.css" />
        <link rel = "stylesheet" type = "text/css" href = "/Content/System/CSS/Footer.css" />
        <script src = "/Content/System/User-Access/UserAccessValidation.js"></script>
        <title>Login | Performancedatabases.com</title>
    </head>
    <?php
        if(isset($_SESSION["Login"])){
            if($_SESSION["Username"] != NULL){
                //Alert+Redirect
                echo "<script>alert('Already Login! Redirect to Homepage.');window.location.href = '/Content/Home.php'</script>";
            }
        }
    ?>
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
            <div class = "Login-Window">
                <h3>Login to PerformanceDatabases.com</h3>
                <div class = "Login">
                    <form action = "" method="Post">
                        <input class = "Input" id = "inputL1" type = "text" placeholder="  Username" name="username">
                        <input class = "Input" id = "inputL2" type = "password" placeholder="  Password" name="password">
                    </form>
                    <input class = "Button" id = "Login" type = "submit" value ="Login" onclick="Validationlogin()"/>
                    <a href = "Register.php"><input class = "Button" id = "Register" type = "button" value ="Register" onclick="ValidationRegister()"/></a>
                    <p class = "Forget">If you forget your password. <a href = "/Content/System/User-Access/FindMyPassword.php">Click here</a></p>
                </div>
            </div>
        </div>
        <div class = "Footer">
            <p>&copy 2018 - <?php echo date("Y") ?> Performancedatabases.com. All Rights Reserved.</p>
            <p>Your Current path : <a href="/Content/Home.php">Home</a>/<a href="/Content/System/User-Access/Login.php">UserAccess/Login</a><p>
            <a href = "/Content/Sitemap.html">Website Map</a>
        </div>
    </body>
</html>