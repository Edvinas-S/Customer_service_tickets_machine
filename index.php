<?php require_once('./includes/config.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home screen</title>
    <link rel="stylesheet" href="<?php echo DIR ?>css/style.css">
</head>
    <body class="bodySelect">
        <main class="mainSelect">
            <h1 class="h1Select">You are in a waiting lobby</h1>
            <h3 class="h3Select">Please select specialist you came to:</h3>
            <div class="selectSpec">
                <form action="" method="POST"><label>Specialist-1</label><input type="hidden" name="sp1_id" value="1"><button type="submit">Print ticket</button></form>
                <form action="" method="POST"><label>Specialist-2</label><input type="hidden" name="sp2_id" value="2"><button type="submit">Print ticket</button></form>
                <form action="" method="POST"><label>Specialist-3</label><input type="hidden" name="sp3_id" value="3"><button type="submit">Print ticket</button></form>
            </div>
        </main>
    </body>
</html>