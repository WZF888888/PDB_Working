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
        <title>Register | PerformanceDatabases.com</title>
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
                    <a href="/Content/System/User-Access/Login.php">Login</a>
                </li>
            <ul>
        </div>
        <div class = "Display-Area">
            <div class = "Register-Window">
                <h3>Register to PerformanceDatabases.com</h3>
                <div class = "Register">
                    <form action = "" method="Post">
                        <input class = "Input" id = "inputL1" type = "email" placeholder = "  Email" name="email">
                        <input class = "Input" id = "inputL2" type = "number" placeholder = "  Phone" name="phonenumber">
                        <input class = "Input" id = "inputL3" type = "text" placeholder = "  Username" name="username">
                        <input class = "Input" id = "inputL4" type = "password" placeholder = "  Password" name="password1">
                        <input class = "Input" id = "inputL5" type = "password" placeholder = "  Repeat Password" name="password2">
                    </form>
                    <input class = "Button" id = "Register" type = "button" value = "Register"/>
                    <p class = "Forget">If you have the account, Please log in. <a href = "/Content/System/User-Access/Login.php">Click here</a></p>
                </div>
            </div>
        </div>
        <div class = "Footer">
            <p>&copy 2018 - <?php echo date("Y") ?> Performancedatabases.com. All Rights Reserved.</p>
            <p>Your Current path : <a href="/Content/Home.php">Home</a>/<a href="/Content/System/User-Access/Register.php">UserAccess/Register</a><p>
            <a href = "/Content/Sitemap.html">Website Map</a>
        </div>
    </body>
</html>