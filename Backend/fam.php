<?php
require_once 'Backend.php';
$obj = new Backend;
$conn = $obj->connection();

$sql = "SELECT * FROM Families";
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);
// $response = $count;
echo $count;