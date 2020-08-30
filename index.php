<?php require_once('./includes/config.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home screen</title>
    <link rel="shortcut icon" href="<?php echo DIR ?>img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo DIR ?>css/index.css">
    <link rel="stylesheet" href="<?php echo DIR ?>css/button.css">
</head>
    <body class="bodySelect">
        <nav class="navSelect">
            <a class="button loginbutton" href="<?php echo DIR ?>login.php" target="_blank" rel="noopener noreferrer">Login</a>
        </nav>
        <main class="mainSelect">
            <h1 class="h1Select">You are in a waiting lobby</h1>
            <h3 class="h3Select">Please select specialist you came to:</h3>
            <div class="selectSpec">
                <div class="inLineSelect">
                    <form action="<?php echo DIR ?>tickets.php" method="POST" target="_blank" rel="noopener noreferrer"><label>Specialist-1</label><input type="hidden" name="sp1_id" value="1"><button type="submit">Wait in line</button></form>
                    <form action="<?php echo DIR ?>calendar.php" method="POST" target="_blank" rel="noopener noreferrer"><input type="hidden" name="sp1_pick" value="1"><button type="submit">Pick a time</button></form>
                </div>
                <div class="inLineSelect">
                    <form action="<?php echo DIR ?>tickets.php" method="POST" target="_blank" rel="noopener noreferrer"><label>Specialist-2</label><input type="hidden" name="sp2_id" value="2"><button type="submit">Wait in line</button></form>
                    <form action="<?php echo DIR ?>calendar.php" method="POST" target="_blank" rel="noopener noreferrer"><input type="hidden" name="sp2_pick" value="2"><button type="submit">Pick a time</button></form>
                </div>
                <div class="inLineSelect">
                    <form action="<?php echo DIR ?>tickets.php" method="POST" target="_blank" rel="noopener noreferrer"><label>Specialist-3</label><input type="hidden" name="sp3_id" value="3"><button type="submit">Wait in line</button></form>
                    <form action="<?php echo DIR ?>calendar.php" method="POST" target="_blank" rel="noopener noreferrer"><input type="hidden" name="sp3_pick" value="3"><button type="submit">Pick a time</button></form>
                </div>
                <div class="checkID">
                    <form action="<?php echo DIR ?>tickets.php" method="get" target="_blank" rel="noopener noreferrer"><input type="number" name="check_ID" placeholder="ticket" min="000000" max="99999" required><button type="submit">Check your ticket</button></form>
                </div>
            </div>
        </main>
    <?php
    // Close connection
    mysqli_close($conn);
    ?>
    </body>
</html>