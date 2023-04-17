<?php 
    $CSS_Login_Disable = "";
    $CSS_Login_Username_Disable = "";
    $Username = "";
    session_start();
    if(isset($_SESSION['Login'])){
        if($_SESSION['Login'] == True){
            $CSS_Login_Disable = "style='Display:none'";
            $Username = $_SESSION["Username"];
        }
    }
    else{
        $CSS_Login_Username_Disable = "style='Display:none'";
    }
?>
<html>
    <head>
        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="/Content/System/CSS/Nav-Bar.css" />
        <link rel="stylesheet" type="text/css" href="/Content/System/CSS/Homepage.css" />
        <link rel="stylesheet" type="text/css" href="/Content/System/CSS/Footer.css" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
        <title>HomePage | Performancedatabases.com</title>
    </head>
    <body>
        <div class="Nav-Bar">
            <ul>
                <li style="background-color:rgb(5,170,110)">
                    <a href="/Content/Home.php">Home</a>
                </li>
                <li <?php echo $CSS_Login_Disable ?>style="float:right">
                    <a href="/Content/System/User-Access/Login.php">Login</a>
                </li>
                <li class = "Drop-Down" <?php echo $CSS_Login_Username_Disable ?>style="float:right">
                    <a href="/Content/System/User-Management/My-Profile.php"><?php echo $Username?></a>
                    <div class = "Drop-Down-Content">
                        <a href = "/Content/System/User-Access/Logout.php">Logout</a>
                        <a href = "/Content/System/User-Access/ChangePassword.php">Change my password</a>
                    </div>
                </li>
            <ul>
        </div>
        <div class="Display-Area">
            <div class="Search">
                <form>
                    <input class = "Search-index" type = "text" placeholder = "Type anything you want to search">
                </form>
            </div>
            <div class="Table">
                <table>
                    <tr>
                        <td>
                            <a href="/Content/Download-Center/Home.php">
                                <div class = "Table-Div">
                                    <p>Download Center</p>
                                </div>
                            </a>
                        </td>
                        <td>
                            <a href="/Content/Result/Submit/Submit Benchmark Result.php">
                                <div class = "Table-Div">
                                    <p>Submit Benchmark Result</p>
                                </div>
                            </a>
                        </td>
                        <td>
                            <a href="/Content/Result/Ranking/Ranking Home.php">
                                <div class = "Table-Div">
                                    <p>Benchmark Ranking</p>
                                </div>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="/Content/Database/CPU/Home.php">
                                <div class = "Table-Div">
                                    <p>CPU Spec Database</p>
                                </div>
                            </a>
                        </td>
                        <td>
                            <a href="/Content/Database/GPU/Home.php">
                                <div class = "Table-Div">
                                    <p>GPU Spec Database</p>
                                </div>
                            </a>
                        </td>
                        <td>
                            <a href="/Content/Database/SSD/Home.php">
                                <div class = "Table-Div">
                                    <p>SSD Spec Database</p>
                                </div>
                            </a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="Footer">
            <p class = "CopyRight">&copy 2018 - <?php echo date("Y") ?> Performancedatabases.com. All Rights Reserved.</p>
            <p class = "Path">Your Current Path : <a href="/Content/Home.php">Home</a><p>
            <a href = "/Content/Sitemap.html">Website Map</a>
            <a href = "/Content/Site%20Status.php.html">Site Status</a>
        </div>
    </body>
</html>