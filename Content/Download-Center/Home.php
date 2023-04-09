<?php
    //SQL Config File for Download Center
    require_once dirname( __DIR__ ) . "/System/Config/Download_Database_Config.php";
    $CSS_Login_Disable = "";
    $CSS_Logout_Disable = "";
    $CSS_Display_Area_App_Many = "";
    $CSS_Display_Area_App_0 = "";
    $AppTypes = [];
    $AppVendor = [];
    $App_Number = 0;
    session_start();
    if(isset($_SESSION['Login'])){
        if($_SESSION['Login'] == True){
            $CSS_Login_Disable = "style='Display:none'";
        }
    }
    else{
        $CSS_Logout_Disable = "style='Display:none'";
    }
    $SQL_Connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    $SQL_Statement = "Select * From performancedatabases_download";
    //Get App Number from SQL
    $result = mysqli_query($SQL_Connection,$SQL_Statement);
    $RowsNum = mysqli_num_rows($result);
    $App_Number = $RowsNum;
    //Check App Number if app num is 0 display class "Display-Area-App-0"
    if($App_Number == 0){
        $CSS_Display_Area_App_Many = "style='Display:none;'";
    }
    else{
        $CSS_Display_Area_App_0 = "style='Display:none;'";
    }
?>
<html>
    <body>
        <head>
            <!-- Meta -->
            <meta charset = "UTF-8">
            <meta content = "text/html">
            <meta name = "keywords" content = "Download Center">
            <!-- Website Title -->
            <title>Download Center - Performancedatabases.com</title>
            <!-- CSS Link -->
            <link rel = "stylesheet" type = "text/css" href = "/Content/System/CSS/Nav-Bar.css" />
            <link rel = "stylesheet" type = "text/css" href = "/Content/System/CSS/Footer.css" />
            <link rel = "stylesheet" type = "text/css" href = "/Content/System/CSS/Download-Center.css" />
        </head>
        <div class="Nav-Bar">
            <ul>
                <li style="background-color:rgb(5,170,110)">
                    <a href="/Content/Home.php">Home</a>
                </li>
                <li <?php echo $CSS_Login_Disable ?>style="float:right">
                    <a href="/Content/System/User-Access/Login.php">Login</a>
                </li>
                <li <?php echo $CSS_Logout_Disable ?>style="float:right">
                    <a href="/Content/System/User-Access/Logout.php">Logout</a>
                </li>
            </ul>
        </div>
        <div class = "Display-Area">
            <div class = "Display-Area-App-0" <?php echo $CSS_Display_Area_App_0 ?>>
                <div class = "No-APP">
                    <h2>Sorry</h2>
                    <p>There is no apps currently in the download center.</p>
                    <p>We are updating the website, please visit later.</p>
                </div>
            </div>
            <div class = "Display-Area-App-Many" <?php echo $CSS_Display_Area_App_Many ?>>
                <h3>More Apps Comming up! There are <?php echo $App_Number ?> apps current in our site.</h3>
                <div class = "Search-Parameters">
                    <div class = "Tag-Search-Parameters">
                        <h2>Search Parameters</h2>
                    </div>
                    <div class = "Search-Parameters-Box">
                        <label for="SoftwareType">Software Type:</label>
                        <select id = "SoftwareType" onchange="">
                            <option value = "">All</option>
                            <?php
                            for($i = 0 ; $i < count($AppTypes) ; $i++){
                                echo "<option value = '".$AppTypes[$i]."'>".$AppTypes[$i]."</option>";
                            }
                            ?>
                        </select>
                        <label for="SoftwareVendor">Software Vendor:</label>
                        <select id = "SoftwareVendor" onchange="">
                            <option value = "">All</option>
                            <?php
                            for($e = 0 ; $e < count($AppTypes) ; $e++){
                                echo "<option value = '".$AppTypes[$e]."'>".$AppTypes[$e]."</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class = "Most-Popular-Software">
                    <!-- For Loop the most 10 pop apps -->
                    <?php
                        for($o = 0;$o < $App_Number;$o++){
                            $row = mysqli_fetch_assoc($result);
                            echo "<div class = 'App-Details'>";
                                echo "<div class = 'App-Image'>";
                                    echo "<img src = '/Content/Image/Download/$row[AppName].png' alt = 'Software-Image' width = '200px' height = '200px'>";
                                echo "</div>";
                                echo "<div class = 'App-Details-Text'>";
                                    echo "<p>App Name : $row[AppName]</p>";
                                    echo "<p>App Type : $row[AppType]</p>";
                                    echo "<p>App Size : $row[AppSize] MB</p>";
                                    echo "<p>App Vender : $row[AppVender]</p>";
                                    echo "<p>App Description : $row[AppDescription]</p>";
                                    echo "<p style='float:right'>>> More Details</p>";
                                echo "</div>";
                            echo "</div>";
                        }
                    ?>
                    </div>
                <div class = "Recent-Update">

                </div>
            </div>
        </div>
        <div class = "Footer">
            <p class = "CopyRight">&copy 2018 - <?php echo date("Y") ?> Performancedatabases.com. All Rights Reserved.</p>
            <p class = "Path">Your Current path : <a href="/Content/Home.php">Home</a>/<a href="/Content/Download-Center/Home.php">Download Center/Download Center Home</a><p>
            <a href = "/Content/Sitemap.html">Website Map</a>
        </div>
    </body>
</html>