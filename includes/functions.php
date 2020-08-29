<?php 
// check connection
$conn = mysqli_connect('localhost', 'root', 'mysql', 'waiting_db');
if(!$conn){
    die( "Sorry! There seems to be a problem connecting to database.");
};

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
    header("Location: http://localhost/0_test");
}

?>