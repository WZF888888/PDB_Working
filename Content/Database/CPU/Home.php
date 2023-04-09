<?php
    session_start()
?>
<html>
    <head>
        <link rel = "stylesheet" type = "text/css" href = "/Content/System/CSS/Nav-Bar.css" />
        <link rel = "stylesheet" type = "text/css" href = "/Content/System/CSS/Database.css" />
        <link rel = "stylesheet" type = "text/css" href = "/Content/System/CSS/Footer.css" />
        <title>Processor | PerformanceDatabases.com</title>
    </head>
    <body>
        <div class = "Display-Area">
            <?php
                $SQLforNewUpdateCPU = "Select * From performancedatabases_cpu_database";

            ?>
            <div class = "NewUpdateCPU">
                <table>
                    <tr>
                        <td>Model</td>
                        <td>Core / Thread</td>
                        <td>L3 Cache</td>
                        <td>Base Clock / Max Boost / Max All Core Boost</td>
                        <td>Update Date</td>
                    </tr>
                    <?php
                        for($i = 0;$i < 10;$i++){
                            echo "<td>$row[Model]</td>";
                        }
                    ?>
                </table>
            </div>
        </div>
    </body>
</html>