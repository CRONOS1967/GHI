<?php
require_once 'Backend.php';
$obj = new Backend;
$conn = $obj->connection();
$u = $_POST['username'];
$sql = "SELECT Username FROM Users WHERE Username = '$u'";
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);
$response = [];
if ($count ==1 || $count>1) {
    echo "<span style='color:green'> Correct</span>";
    echo "<script>$('#submit').prop('disabled', false);</script>";
} else {
    echo "<span style='color:red'>Incorrect User Name</span>";
    echo "<script>$('#submit').prop('disabled', true);</script>";
}
