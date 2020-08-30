<?php require_once('./includes/config.php') ?>

<?php
// Initialize the session
session_start();
?>

<?php 
// Check if the user is already logged in, if yes then redirect
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("Location:". ADMIN);
    exit;
}
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    //login
    login($conn, $username, $password);

    // Close connection
    mysqli_close($conn);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="shortcut icon" href="<?php echo DIR ?>img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo DIR ?>css/login.css">
    <link rel="stylesheet" href="<?php echo DIR ?>css/button.css">
</head>
<body class="bodySelect">
    <div class="login">
        <div class="error">
            <span><?php echo $username_err ?></span>
            <span><?php echo $password_err ?></span>
        </div>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label>Username</label><br><input type="text" placeholder="spec1 or 2 or 3" name="username" value="<?php echo $username; ?>"/><br>
            <label>Password</label><br><input type="password" placeholder="spec1 or 2 or 3" name="password"/><br>
            <button type="submit" name="login" >Login</button>
        </form>
    </div>
</body>
</html>