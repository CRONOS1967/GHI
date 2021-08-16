<?php
require_once 'Backend.php';
$obj = new Backend;
$conn = $obj->connection();

$sql = "SELECT Username FROM Users WHERE Role != 'Cust' and Role !='Sprovider'";
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);
// $response = $count;
echo $count;

