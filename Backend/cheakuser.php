<?php
require_once 'Backend.php';
$obj = new Backend;
$conn = $obj->connection();
$u = $_POST['username'];
$sql = "SELECT Username FROM Users WHERE Username like '".$u."%'";
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);
$response = [];
if ($count>=1) {
    // echo "<span style='color:red'> Sorry this user name is already taken</span>";
    echo $count++;
    // echo "<script>$('#submit').prop('disabled', true);</script>";
} else {
  
    // echo "<span style='color:green'> Avalable</span>";
    // echo "<script>$('#submit').prop('disabled', false);</script>";
// echo 't';
}
