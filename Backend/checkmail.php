<?php
require_once 'Backend.php';
$obj = new Backend;
$conn = $obj->connection();
$u = $_POST['mail'];
$sql = "SELECT Username FROM Users WHERE Email = '$u'";
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);
$response = [];
if ($count ==1 || $count>1) {
    echo "<span style='color:red'> Sorry this Email is already taken</span>";
    echo "<script>$('#submit').prop('disabled', true);</script>";
} else {
    echo "<span style='color:green'> Avalable</span>";
    echo "<script>$('#submit').prop('disabled', false);</script>";
}
