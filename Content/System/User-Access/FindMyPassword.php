<?php 
    
?>
<html>
    <head>
        <!-- CSS -->
        <link rel = "stylesheet" type = "text/css" href = "/Content/System/CSS/Nav-Bar.css" />
        <link rel = "stylesheet" type = "text/css" href = "/Content/System/CSS/UserAccess.css" />
        <link rel = "stylesheet" type = "text/css" href = "/Content/System/CSS/Footer.css" />
        <title>Forget Password | Performancedatabases.com</title>
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
            <div class = "ForgetPassword-Window">
                <h3>Reset Password to PerformanceDatabases.com</h3>
                <div class = "ForgetPassword">
                    <form action = "" method="Post">
                        <input class = "Input" id = "inputL1" type = "email" placeholder="  Email" name="email">
                    </form>
                    <input class = "Button" id = "Forget" type = "submit" value ="Find My Password"/>
                    <p class = "Forget">If you remember the password and want to login. <a href = "/Content/System/User-Access/login.php">Click here</a></p>
                </div>
            </div>
        </div>
        <div class = "Footer">
            <p>&copy 2018 - <?php echo date("Y") ?> Performancedatabases.com. All Rights Reserved.</p>
            <p>Your Current path : <a href="/Content/Home.php">Home</a>/<a href="/Content/System/User-Access/FindMyPassword.php">UserAccess/Find My Password</a><p>
            <a href = "/Content/Sitemap.html">Website Map</a>
        </div>
    </body>
</html>