<?php
    session_start()
?>
<html>
    <head>
        <link rel = "stylesheet" type = "text/css" href = "/Content/System/CSS/Nav-Bar.css" />
        <link rel = "stylesheet" type = "text/css" href = "/Content/System/CSS/Database.css" />
        <link rel = "stylesheet" type = "text/css" href = "/Content/System/CSS/Footer.css" />
        <title>All Processors | PerformanceDatabases.com</title>
    </head>
    <body>
        <div class = "Display-Area">
            <?php
                require_once dirname( __DIR__ ) . "\..\System\Config\Info-Databases-Config.php";
                $SQL_Connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
                $SQLforAllCPU = "Select * From performancedatabases_cpu_database";
                $result = mysqli_query($SQL_Connection,$SQLforAllCPU);
                $RowsNum = mysqli_num_rows($result);
            ?>
            <div class = "NewUpdateCPU">
                <h2>List All CPUs In Our Database</h2>
                <table>
                    <tr>
                        <td>Model</td>
                        <td>Core / Thread</td>
                        <td>L3 Cache</td>
                        <td>Base Clock / Max Boost / Max All Core Boost</td>
                        <td>Update Date</td>
                    </tr>
                    <?php
                        for($i = 0;$i < $RowsNum;$i++){
                            $row = mysqli_fetch_assoc($result);
                            echo "<tr>";
                                echo "<td>$row[CPUName]</td>";
                                echo "<td></td>";
                                echo "<td></td>";
                                echo "<td></td>";
                                echo "<td></td>";
                            echo "</tr>";
                        }
                    ?>
                </table>
            </div>
        </div>
    </body>
</html>