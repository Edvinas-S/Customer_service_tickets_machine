<?php 
// check connection
$conn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
if(!$conn){
    die( "Sorry! There seems to be a problem connecting to database.");
};



?>