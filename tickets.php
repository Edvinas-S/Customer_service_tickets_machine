<?php require_once('./includes/config.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your ticket</title>
    <link rel="shortcut icon" href="<?php echo APP_ROOT ?>img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo APP_ROOT ?>css/tickets.css">
    <link rel="stylesheet" href="<?php echo APP_ROOT ?>css/button.css">
</head>
    <body>
        <input type="button" class="button" value="X" onclick="self.close()">        
        <?php 
        // get waiting line count
        if(isset($_POST['sp1_id'])){ 
            $sqlWaiting = "SELECT Count(spec_1) AS waiting FROM specialists;";
        };
        if(isset($_POST['sp2_id'])){ 
            $sqlWaiting = "SELECT Count(spec_2) AS waiting FROM specialists;";
        };
        if(isset($_POST['sp3_id'])){ 
            $sqlWaiting = "SELECT Count(spec_3) AS waiting FROM specialists;";
        };
        if($_SERVER['REQUEST_METHOD']=='GET') {
            $serialEntered = $_GET['check_ID'];
            $sql_ID = "SELECT spec_ID FROM customers WHERE serial_number = $serialEntered;";
            $result_ID = mysqli_query($conn, $sql_ID);
            if (mysqli_num_rows($result_ID) == 0) {
                header('Location: '. APP_ROOT);
                exit();
            } else {
                if (mysqli_num_rows($result_ID) > 0) {
                    while($row = mysqli_fetch_assoc($result_ID)) {
                        $spec_ID = $row['spec_ID'];
                        $sqlWaiting = "SELECT Count(spec_$spec_ID) AS waiting FROM specialists;";
                    }
                }
            }
        };
        $resultWaiting = mysqli_query($conn, $sqlWaiting);
            if (mysqli_num_rows($resultWaiting) > 0) {
                while($row = mysqli_fetch_assoc($resultWaiting)) {
                    $waiting = $row['waiting'];
                }
            }
            // show new ticket
            if($_SERVER['REQUEST_METHOD']=='POST') {
            if(isset($_POST['sp1_id'])){ 
                $sql = "SELECT spec_ID, MAX(serial_number) AS serial FROM customers WHERE Spec_ID=1;";
            };
            if(isset($_POST['sp2_id'])){ 
                $sql = "SELECT spec_ID, MAX(serial_number) AS serial FROM customers WHERE Spec_ID=2;";
            };
            if(isset($_POST['sp3_id'])){ 
                $sql = "SELECT spec_ID, MAX(serial_number) AS serial FROM customers WHERE Spec_ID=3;";
            };
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<table>
                        <tr>
                            <th>Your specialist number is: </th>
                            <th>Your ticket number is: </th>
                            <th>Action: </th>
                        </tr>
                        <tr>
                            <td>". $row["spec_ID"] ."</td>
                            <td>". $row["serial"] ."</td>
                            <td>
                                <form action='includes/functions.php' method='post'><button type='submit' name='deleteTicket'>CANCEL</button><input type='hidden' name='serial' value='".$row["serial"]."'></form>
                            </td>
                        </tr>
                    </table>";
                }
                echo "<p class='waiting'>In front of you to this specialist are waiting:".($waiting - 1)."</p>";
            } else {
                echo "<span>ERROR</span>";
            }
        }

        // get ticket information
        if($_SERVER['REQUEST_METHOD']=='GET') {
            $serialEntered = $_GET['check_ID'];
            $sql = "SELECT * FROM customers WHERE serial_number=$serialEntered;";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<table>
                        <tr>
                            <th>Your specialist number is: </th>
                            <th>Your ticket number is: </th>
                            <th>Action: </th>
                        </tr>
                        <tr>
                            <td>". $row["spec_ID"] ."</td>
                            <td>". $row["serial_number"] ."</td>
                            <td>
                                <form action='includes/functions.php' method='post'><button type='submit' name='cancelTicket'>CANCEL</button><input type='hidden' name='serial' value='".$row["serial_number"]."'></form>
                            </td>
                        </tr>
                    </table>";
                }
                echo "<p class='waiting'>In front of you to this specialist are waiting:".($waiting - 1)."</p>";
            } else {
                echo "<span>ERROR ticket does not exist<br>
                    <a class='button' href=".APP_ROOT.">Back</a></span>";
            }
        }
        ?>
    <?php
    // Close connection
    mysqli_close($conn);
    ?>
    </body>
</html>