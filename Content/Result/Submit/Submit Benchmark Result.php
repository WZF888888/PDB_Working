<?php
    session_start();
    $CSS_Login_True = "";
    $CSS_Login_False = "";
    if(isset($_SESSION["Login"])){
        if($_SESSION["Username"] != NULL){

        }
    }
    else{
        $CSS_Login_False = "style='Display:none'";
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
        <header>

        </header>
        <div class="Display-Area">
            <div class="User-Not-Login">
                <h2>It seems like you're not currently logged in.</h2>
                <p>Hello User! Thank you for your interest in submitting your benchmark results with us. To do so, you'll need to log in first. However, if you have privacy concerns, we offer an option to submit the results anonymously.</p>
            </div>
            <div class="User-Login-OK">
                <div class="Submit-Form">
                    <form>
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
                    </form>
                </div>
            </div>
        </div>
        <footer>

        </footer>
    </body>
</html>

