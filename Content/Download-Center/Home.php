<?php
// SQL Config File for Download Center
require_once dirname(__DIR__) . "/System/Config/Download_Database_Config.php";
$CSS_Login_Disable = "";
$CSS_Logout_Disable = "";
$CSS_Display_Area_App_Many = "";
$CSS_Display_Area_App_0 = "";
$AppTypes = [];
$AppVendors = [];
$App_Number = 0;
session_start();

if (isset($_SESSION['Login'])) {
    if ($_SESSION['Login'] == true) {
        $CSS_Login_Disable = "style='display:none;'";
    }
} else {
    $CSS_Logout_Disable = "style='display:none;'";
}

$SQL_Connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
$SQL_Statement = "SELECT * FROM performancedatabases_download";

// Get Total App Number from SQL
$result = mysqli_query($SQL_Connection, $SQL_Statement);
$RowsNum = mysqli_num_rows($result);
$App_Number = $RowsNum;

// Check App Number if app num is 0 display class "Display-Area-App-0"
if ($App_Number == 0) {
    $CSS_Display_Area_App_Many = "style='display:none;'";
} else {
    $CSS_Display_Area_App_0 = "style='display:none;'";
}

// Get unique App Types
$typesQuery = "SELECT DISTINCT AppType FROM performancedatabases_download";
$typesResult = mysqli_query($SQL_Connection, $typesQuery);
while ($row = mysqli_fetch_assoc($typesResult)) {
    $AppTypes[] = $row['AppType'];
}
// Get unique App Vendors
$vendorsQuery = "SELECT DISTINCT AppVendor FROM performancedatabases_download";
$vendorsResult = mysqli_query($SQL_Connection, $vendorsQuery);
while ($row = mysqli_fetch_assoc($vendorsResult)) {
    $AppVendors[] = $row['AppVendor'];
}

// Check if search parameters are submitted
if (isset($_GET['SoftwareType']) && isset($_GET['SoftwareVendor'])) {
    $selectedType = $_GET['SoftwareType'];
    $selectedVendor = $_GET['SoftwareVendor'];
    // Build SQL query with search parameters
    if ($selectedType === "All" && $selectedVendor === "All") {
        // Display all apps
        $searchQuery = "SELECT * FROM performancedatabases_download";
    } elseif ($selectedType === "All") {
        // Display apps with selected vendor
        $searchQuery = "SELECT * FROM performancedatabases_download WHERE AppVendor = '$selectedVendor'";
    } elseif ($selectedVendor === "All") {
        // Display apps with selected type
        $searchQuery = "SELECT * FROM performancedatabases_download WHERE AppType = '$selectedType'";
    } else {
        // Display apps with selected type and vendor
        $searchQuery = "SELECT * FROM performancedatabases_download WHERE AppType = '$selectedType' AND AppVendor = '$selectedVendor'";
    }

    $result = mysqli_query($SQL_Connection, $searchQuery);
    $RowsNum = mysqli_num_rows($result);
    $App_Number_Display = $RowsNum;
} else {
    // No search parameters submitted, display all apps
    $searchQuery = "SELECT * FROM performancedatabases_download";
    $result = mysqli_query($SQL_Connection, $searchQuery);
    $RowsNum = mysqli_num_rows($result);
    $App_Number_Display = $RowsNum;
}
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Meta -->
    <meta charset="UTF-8">
    <meta content="text/html">
    <meta name="keywords" content="Download Center">
    <!-- Website Title -->
    <title>Download Center - Performancedatabases.com</title>
    <!-- CSS Link -->
    <link rel="stylesheet" type="text/css" href="/Content/System/CSS/Nav-Bar.css"/>
    <link rel="stylesheet" type="text/css" href="/Content/System/CSS/Footer.css"/>
    <link rel="stylesheet" type="text/css" href="/Content/System/CSS/Download-Center.css"/>
    <!-- Font Link -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <script>
        function updateVendors() {
            var selectedType = document.getElementById("SoftwareType").value;
            var vendorsSelect = document.getElementById("SoftwareVendor");
            vendorsSelect.innerHTML = "";
            vendorsSelect.innerHTML = "<option value='All'>All</option>";
            <?php
            foreach ($AppVendors as $vendor) {
                echo "if ('$selectedType' === 'All' || '$selectedType' === '$vendor') {";
                echo "vendorsSelect.innerHTML += '<option value=\"$vendor\">$vendor</option>'";
                echo "}";
            }
            ?>
        }
    </script>
</head>
<body>
<div class="Nav-Bar">
    <ul>
        <li style="background-color:rgb(5,170,110)">
            <a href="/Content/Home.php">Home</a>
        </li>
        <li <?php echo $CSS_Login_Disable ?> style="float:right">
            <a href="/Content/System/User-Access/Login.php">Login</a>
        </li>
        <li <?php echo $CSS_Logout_Disable ?> style="float:right">
            <a href="/Content/System/User-Access/Logout.php">Logout</a>
        </li>
    </ul>
</div>
<div class="Display-Area">
    <div class="Display-Area-App-0" <?php echo $CSS_Display_Area_App_0 ?>>
        <div class="No-APP">
            <h2>Sorry</h2>
            <p>There are no apps currently in the download center.</p>
            <p>We are updating the website, please visit later.</p>
        </div>
    </div>
    <div class="Display-Area-App-Many" <?php echo $CSS_Display_Area_App_Many ?>>
        <h3>More Apps Coming up! There are <?php echo $App_Number ?> apps currently on our site.</h3>
        <div class="Search-Parameters">
            <div class="Tag-Search-Parameters">
                <h2>Search Parameters</h2>
            </div>
            <div class="Search-Parameters-Box">
                <form method="GET" action="">
                    <label for="SoftwareType">Software Type:</label>
                    <select id="SoftwareType" name="SoftwareType" onchange="updateVendors()">
                        <option value="All">All</option>
                        <?php
                        foreach ($AppTypes as $type) {
                            $selected = ($type === $selectedType) ? "selected" : "";
                            echo "<option value='$type' $selected>$type</option>";
                        }
                        ?>
                    </select>
                    <label for="SoftwareVendor">Software Vendor:</label>
                    <select id="SoftwareVendor" name="SoftwareVendor">
                        <option value="All">All</option>
                        <?php
                        foreach ($AppVendors as $vendor) {
                            $selected = ($vendor === $selectedVendor) ? "selected" : "";
                            echo "<option value='$vendor' $selected>$vendor</option>";
                        }
                        ?>
                    </select>
                    <button type="submit">Search</button>
                </form>
            </div>
        </div>
        <div class="Most-Popular-Software">
            <!-- For Loop the most 10 pop apps -->
            <?php
            for ($o = 0; $o < $App_Number_Display; $o++) {
                $row = mysqli_fetch_assoc($result);
                echo "<div class='App-Details'>";
                echo "<div class='App-Image'>";
                echo "<img src='/Content/Image/Download/$row[AppName].png' alt='Software-Image' width='200px' height='200px'>";
                echo "</div>";
                echo "<div class='App-Details-Text'>";
                echo "<p>App Name: $row[AppName]</p>";
                echo "<p>App Type: $row[AppType]</p>";
                echo "<p>App Size: $row[AppSize] MB</p>";
                echo "<p>App Version: $row[AppVersion]</p>";
                echo "<p>App Description: $row[AppDescription]</p>";
                echo "<a href='/Content/Download-Center/Software-Details.php?SoftwareName=$row[AppName]'><p style='float:right'>>> More Details</p></a>";
                echo "</div>";
                echo "</div>";
            }
            ?>
        </div>
        <div class="Recent-Update">

        </div>
    </div>
</div>
<div class="Footer">
    <p class="CopyRight">&copy; 2018 - <?php echo date("Y") ?> Performancedatabases.com. All Rights Reserved.</p>
    <p class="Path">Your Current path: <a href="/Content/Home.php">Home</a>/<a href="/Content/Download-Center/Home.php">Download Center/Download Center Home</a>
    </p>
    <a href="/Content/Sitemap.html">Website Map</a>
</div>
</body>
</html>
