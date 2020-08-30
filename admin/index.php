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
        <a class="button logout" href="<?php echo ADMIN; ?>?logout">Logout</a><br>
        <h1>Hello, <?php echo $_SESSION['user'] ?></h1>
        <main>
            <table>
                <tr>
                    <th>Ticket serial number:</th>
                    <th>Actions:</th>
                </tr>
                <?php
                    // print to html all customers to this specialist 
                    if($_SESSION['user'] == 'spec1') {
                        $specialist = 'spec_1';
                    };
                    if($_SESSION['user'] == 'spec2') {
                        $specialist = 'spec_2';
                    };
                    if($_SESSION['user'] == 'spec3') {
                        $specialist = 'spec_3';
                    };
                    $sql = "SELECT $specialist FROM specialists WHERE $specialist IS NOT NULL;";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>
                                    <td>" . $row["$specialist"] ."</td>
                                    <td>
                                        <form action='' method='post'><input class='button' type='button' value='To invite'><input class='button' type='button' value='Cancel invitation'><input class='button' type='button' value='Complete'></form>
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
        </main>
    </body>
</html>