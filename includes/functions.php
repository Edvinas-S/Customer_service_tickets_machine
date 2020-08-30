<?php

// check connection
$conn = mysqli_connect('localhost', 'root', 'mysql', 'waiting_db');
if(!$conn){
    die( "Sorry! There seems to be a problem connecting to database.");
};

// disable MySql "Safe Updates Preference" to modify tables
$sql = 'SET SQL_SAFE_UPDATES = 0;';
mysqli_query($conn, $sql);

// login logic
function login($conn, $username, $password) {
    $username = strip_tags(mysqli_real_escape_string($conn, $username));
    $password = strip_tags(mysqli_real_escape_string($conn, $password));

    $hashed_password = md5($password.$username);

    // check if the user name and password combination exist in database
    $sql = "SELECT * FROM admin WHERE account = '$username' AND password = '$hashed_password'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) == 1) {
        // the username and password match,
        // set the session
        $_SESSION['loggedin'] = true;
        $_SESSION['user'] = $username;
                    
        // direct to admin
        header('Location:'. ADMIN);
        exit();
    }
}

// Authentication
function logged_in() {
    if($_SESSION['loggedin'] == true) {
        return true;
    } else {
        return false;
    }	
}

function login_required() {
    if(logged_in()) {	
        return true;
    } else {
        header('Location: '. ADMIN);
        exit();
    }	
}

// logout logic
function logout(){
    unset($_SESSION['loggedin']);
    header('Location: ' . DIR);
    exit();
}
if(isset($_GET['logout'])){
    logout();
}

// ADD customer to Specialist_1
function addSpec_1() {
    global $conn;
    $value = $_POST['sp1_id'];
    $sql_1 = "INSERT INTO customers (`spec_ID`) VALUES ($value);";
    mysqli_query($conn, $sql_1);
    $serialAsObject = mysqli_query($conn, "SELECT MAX(serial_number) FROM customers;");
    $serialAsArray = mysqli_fetch_array($serialAsObject);
    $serial = $serialAsArray['MAX(serial_number)'];
    $sql_2 = "INSERT INTO specialists (`spec_1`, `serial_number`) VALUES ($serial, $serial);";
    mysqli_query($conn, $sql_2);
}
if(isset($_POST['sp1_id'])){
    addSpec_1();
}

// ADD customer to Specialist_2
function addSpec_2() {
    global $conn;
    $value = $_POST['sp2_id'];
    $sql_1 = "INSERT INTO customers (`spec_ID`) VALUES ($value);";
    mysqli_query($conn, $sql_1);
    $serialAsObject = mysqli_query($conn, "SELECT MAX(serial_number) FROM customers;");
    $serialAsArray = mysqli_fetch_array($serialAsObject);
    $serial = $serialAsArray['MAX(serial_number)'];
    $sql_2 = "INSERT INTO specialists (`spec_2`, `serial_number`) VALUES ($serial, $serial);";
    mysqli_query($conn, $sql_2);
}
if(isset($_POST['sp2_id'])){
    addSpec_2();
}

// ADD customer to Specialist_3
function addSpec_3() {
    global $conn;
    $value = $_POST['sp3_id'];
    $sql_1 = "INSERT INTO customers (`spec_ID`) VALUES ($value);";
    mysqli_query($conn, $sql_1);
    $serialAsObject = mysqli_query($conn, "SELECT MAX(serial_number) FROM customers;");
    $serialAsArray = mysqli_fetch_array($serialAsObject);
    $serial = $serialAsArray['MAX(serial_number)'];
    $sql_2 = "INSERT INTO specialists (`spec_3`, `serial_number`) VALUES ($serial, $serial);";
    mysqli_query($conn, $sql_2);
}
if(isset($_POST['sp3_id'])){
    addSpec_3();
}
// CANCEL ticket number
function cancelSerial() {
    global $conn;
    $value = $_POST['serial'];
    $sql_1 = "DELETE FROM specialists WHERE serial_number = $value;";
    mysqli_query($conn, $sql_1);
    $sql_2 = "DELETE FROM customers WHERE serial_number = $value;";
    mysqli_query($conn, $sql_2);
}
if(isset($_POST['deleteTicket'])){
    cancelSerial();
    header("Location: http://localhost/0_test/");
}

?>