<?php require_once('../includes/config.php') ?>

<?php login_required() ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="5">
    <title>Department screen</title>
    <link rel="shortcut icon" href="<?php echo DIR ?>img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo DIR ?>css/department.css">
    <link rel="stylesheet" href="<?php echo DIR ?>css/button.css">
</head>
    <body>
        <h1>Nearest 5 customers by ticket numbers</h1>
        <table>
            <tr><td>Specialist 1</td><td></td></tr>
            <tr>
                <?php // nearest 5 customers on specialist_1
                    $sqlActive = "SELECT serial_number, spec_1_active FROM specialists WHERE spec_1_active IS NOT NULL;";
                    $sqlGroup = "SELECT substring_index(group_concat(spec_1 SEPARATOR '; '), '; ', 5) AS spec_1 FROM specialists WHERE spec_1 IS NOT NULL;";
                    $resultActive = mysqli_query($conn, $sqlActive);
                    if (mysqli_num_rows($resultActive) > 0) {
                        while($row = mysqli_fetch_assoc($resultActive)) {
                            echo "<td>". $row['serial_number'] ."</td>";
                        }
                    } else { echo "<td>Available</td>"; }

                    $resultGroup = mysqli_query($conn, $sqlGroup);
                    if (mysqli_num_rows($resultGroup) > 0) {
                        while($row = mysqli_fetch_assoc($resultGroup)) {
                            echo "<td>". $row['spec_1'] ."</td>";
                        }
                    } else { echo "<td>No one waiting</td>"; }
                ?>
            </tr>
            <tr><td></td></tr>
            <tr><td>Specialist 2</td><td></td></tr>
            <tr>
                <?php // nearest 5 customers on specialist_2
                    $sqlActive = "SELECT serial_number, spec_2_active FROM specialists WHERE spec_2_active IS NOT NULL;";
                    $sqlGroup = "SELECT substring_index(group_concat(spec_2 SEPARATOR '; '), '; ', 5) AS spec_2 FROM specialists WHERE spec_2 IS NOT NULL;";
                    $resultActive = mysqli_query($conn, $sqlActive);
                    if (mysqli_num_rows($resultActive) > 0) {
                        while($row = mysqli_fetch_assoc($resultActive)) {
                            echo "<td>". $row['serial_number'] ."</td>";
                        }
                    } else { echo "<td>Available</td>"; }
                    
                    $resultGroup = mysqli_query($conn, $sqlGroup);
                    if (mysqli_num_rows($resultGroup) > 0) {
                        while($row = mysqli_fetch_assoc($resultGroup)) {
                            echo "<td>". $row['spec_2'] ."</td>";
                        }
                    } else { echo "<td>No one waiting</td>"; }
                ?>
            </tr>
            <tr><td></td></tr>
            <tr><td>Specialist 3</td><td></td></tr>
            <tr>
                <?php // nearest 5 customers on specialist_3
                    $sqlActive = "SELECT serial_number, spec_3_active FROM specialists WHERE spec_3_active IS NOT NULL;";
                    $sqlGroup = "SELECT substring_index(group_concat(spec_3 SEPARATOR '; '), '; ', 5) AS spec_3 FROM specialists WHERE spec_3 IS NOT NULL;";
                    $resultActive = mysqli_query($conn, $sqlActive);
                    if (mysqli_num_rows($resultActive) > 0) {
                        while($row = mysqli_fetch_assoc($resultActive)) {
                            echo "<td>". $row['serial_number'] ."</td>";
                        }
                    } else { echo "<td>Available</td>"; }
                    
                    $resultGroup = mysqli_query($conn, $sqlGroup);
                    if (mysqli_num_rows($resultGroup) > 0) {
                        while($row = mysqli_fetch_assoc($resultGroup)) {
                            echo "<td>". $row['spec_3'] ."</td>";
                        }
                    } else { echo "<td>No one waiting</td>"; }
                ?>
            </tr>
        </table>
    </body>
</html>