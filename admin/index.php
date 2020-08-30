<?php require_once('../includes/config.php') ?>

<?php 
//You only see this if you login 
login_required() 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Specialist page</title>
    <link rel="shortcut icon" href="<?php echo DIR ?>img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo DIR ?>css/adminIndex.css">
    <link rel="stylesheet" href="<?php echo DIR ?>css/button.css">
</head>
    <body>
        <nav>
            <a class="button" href="department.php" target="_blank" rel="noopener noreferrer">Department screen</a>
            <a class="button" href="<?php echo ADMIN; ?>?logout">Logout</a>
        </nav> 
        <h1>Hello, <?php echo $_SESSION['user'] ?></h1>
        <main>
            <?php
                // see active customer
                if($_SESSION['user'] == 'spec1') {
                    $specActive = 'spec_1_active';
                };
                if($_SESSION['user'] == 'spec2') {
                    $specActive = 'spec_2_active';
                };
                if($_SESSION['user'] == 'spec3') {
                    $specActive = 'spec_3_active';
                };
                $sql = "SELECT serial_number, $specActive FROM specialists WHERE $specActive IS NOT NULL;";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    $displayButtons = 'display: none;';
                    while($row = mysqli_fetch_assoc($result)) {
                        $isActive = $row['serial_number'];
                    }
                } else {
                    $displayButtons = "";
                    $isActive = 'none';
                }
            ?>
            <table>
                <tr>
                    <th>Ticket serial number:</th>
                    <th>Actions:</th>
                </tr>
                <?php
                    // print to html all customers to this specialist 
                    if($_SESSION['user'] == 'spec1') {
                        $specialist = 'spec_1';
                        $specActive = 'spec_1_active';
                    };
                    if($_SESSION['user'] == 'spec2') {
                        $specialist = 'spec_2';
                        $specActive = 'spec_2_active';
                    };
                    if($_SESSION['user'] == 'spec3') {
                        $specialist = 'spec_3';
                        $specActive = 'spec_3_active';
                    };
                    $sql = "SELECT $specialist FROM specialists WHERE $specialist IS NOT NULL;";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>
                                    <td>" . $row["$specialist"] ."</td>
                                    <td>
                                        <form action='../includes/functions.php' method='post'><input style='$displayButtons' class='button' type='submit' name='invate' value='Invite'><input class='button' type='submit' name='cancelInvitation' value='Cancel invitation'><input class='button' type='submit' name='deleteTicket' value='Complete'>
                                            <input type='hidden' name='ticketNumber' value='". $row["$specialist"] ."'>
                                            <input type='hidden' name='specActive' value='". $specActive ."'></form>
                                    </td>
                                </tr>";
                        }
                    } else {
                        echo "<tr>
                                <td>there are none customers</td>
                                <td></td>
                            <tr>";
                    }
                ?>
            </table>
            <h3>Active meeting with ticket number: &nbsp; <?php echo $isActive ?></h3>
        </main>
    </body>
</html>