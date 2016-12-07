<?php
$id = $_POST['id'];
$value = $_POST['value'];
list($field, $id) = explode('_', $id);
// 連接mysql
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "relax";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
mysqli_set_charset($conn,"utf8");
mysqli_select_db($conn, "relax");
mysqli_query($conn,"UPDATE roomorder SET $field='$value' WHERE orderID='$id'");
echo $value;
?>
