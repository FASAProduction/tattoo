<?php
        $tgl = date('d-m-Y');
        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=Log of Three False on " . $tgl . ".xls");
        ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Log of Three False Guests</title>
    </head>
    <body>
        <table border="1">
            <tr>
                <th>IP Address</th>
                <th>Browsers</th>
                <th>Operating System</th>
                <th>Date and Time</th>
            </tr>
            <?php
            foreach($logg as $loo):
            ?>
            <tr>
                <td><?php echo $loo->ip_address; ?></td>
                <td><?php echo $loo->browsers; ?></td>
                <td><?php echo $loo->os; ?></td>
                <td><?php echo $loo->datess . " -> " . $loo->timess; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </body>
</html>