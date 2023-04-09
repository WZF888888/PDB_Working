<?php
    $Server_Load = sys_getloadavg();
    $Server_Load_1min = $Server_Load[0];
    $Server_Load_5min = $Server_Load[1];
    $Server_Load_15min = $Server_Load[2];
?>
<html>
    <body>
        <div class = "Server_Load">
            <p>Main Server Load:</p>
            <table>
                <tr>

                </tr>
            </table>
            <p>Backup Server Load:</p>
            <p>SQL Server Load:</p>
        </div>
    </body>
</html> 