<?php
    session_start();
    $CSS_Login_True = "style='Display:none'";
    $CSS_Login_False = "style='Display:none'";
    if(isset($_SESSION["Login"])){
        if($_SESSION["Username"] != NULL){
            $CSS_Login_True = "style='Display:block'";
        }
    }
    else{
        $CSS_Login_False = "style='Display:block'";
    }
?>
<html>
    <head>
        <link rel = "stylesheet" type = "text/css" href = "/Content/System/CSS/Nav-Bar.css" />
        <link rel = "stylesheet" type = "text/css" href = "/Content/System/CSS/Submit.css" />
        <link rel = "stylesheet" type = "text/css" href = "/Content/System/CSS/Footer.css" />
        <title>Submit Benchmark Result | PerformanceDatabases.com</title>
    </head>
    <body>
        <div class="Nav-Bar">
            <ul>
                <li style="background-color:rgb(5,170,110)">
                    <a href="/Content/Home.php">Home</a>
                </li>
            </ul>
        </div>
        <div class="Display-Area">
            <div class="User-Not-Login" <?php echo $CSS_Login_False?>>
                <h2>It seems like you're not currently logged in.</h2>
                <p>Hello User! Thank you for your interest in submitting your benchmark results with us. To do so, you'll need to log in first. However, if you have privacy concerns, we offer an option to submit the results anonymously.</p>
                <a href="/Content/System/User-Access/Login.php"><button>Login</button></a>
            </div>
            <div class="User-Login-OK" <?php echo $CSS_Login_True?>>
                <div class="Submit-Form">
                    <form>
                        <label>Benchmark Software:</label>
                        <select>
                            <option value = "Please Select" selected>Please Select</option>
                            <option value = "CPUz 17.01.64">CPU-Z Benchmark Version 17.01.64</option>
                            <option value = "CPUz 19.01.64B">CPU-Z Benchmark Version 19.01.64 (Beta)</option>
                            <option value = "CPUz 19.01.64AVX2">CPU-Z Benchmark Version 19.01.64 AVX2 (Beta)</option>
                            <option value = "Cinebench R23 Single">Cinebench R23 Single Core</option>
                            <option value = "Cinebench R23 Multi">Cinebench R23 Multiple Core</option>
                            <option value = "Cinebench R20 Single">Cinebench R20 Single Core</option>
                            <option value = "Cinebench R20 Multi">Cinebench R20 Multiple Core</option>
                            <option value = "Cinebench R15 Single">Cinebench R15 Single Core</option>
                            <option value = "Cinebench R15 Multi">Cinebench R15 Multiple Core</option>
                            <option value = "3DMark">3DMark</option>
                        </select>
                        <input id = "BenchmarkResult-Input" type="text">
                    </form>
                    <input type = "checkbox"><p>Yes, I have read and accepted the <a href="/Content/System/Policy/Submit-Benchmark-Policy.php">Privacy Policy.</a></p>
                    <button id = "Login" onclick="">Submit</button>
                </div>
            </div>
        </div>
        <div class="Footer">
            <p class = "CopyRight">&copy 2018 - <?php echo date("Y") ?> PerformanceDatabases.com. All Rights Reserved.</p>
        </div>
    </body>
</html>

