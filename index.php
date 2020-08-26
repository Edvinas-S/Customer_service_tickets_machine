<?php require_once('./includes/config.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home screen</title>
    <link rel="shortcut icon" href="<?php echo DIR ?>img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo DIR ?>css/style.css">
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
                    <form action="" method="POST"><label>Specialist-1</label><input type="hidden" name="sp1_id" value="1"><button type="submit">Wait in line</button></form>
                    <form action="" method="POST"><input type="hidden" name="sp1_id" value="1"><button type="submit">Pick a time</button></form>
                </div>
                <div class="inLineSelect">
                    <form action="" method="POST"><label>Specialist-2</label><input type="hidden" name="sp2_id" value="2"><button type="submit">Wait in line</button></form>
                    <form action="" method="POST"><input type="hidden" name="sp2_id" value="2"><button type="submit">Pick a time</button></form>
                </div>
                <div class="inLineSelect">
                    <form action="" method="POST"><label>Specialist-3</label><input type="hidden" name="sp3_id" value="3"><button type="submit">Wait in line</button></form>
                    <form action="" method="POST"><input type="hidden" name="sp3_id" value="3"><button type="submit">Pick a time</button></form>
                </div>
                <div class="checkID">
                    <form action="" method="post"><input type="text" placeholder="ticket numb." size="10" maxlength="3"><input type="hidden" name="check_ID"><button type="submit">Check your ticket</button></form>
                </div>
            </div>
        </main>
    </body>
</html>