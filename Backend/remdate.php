<?php
session_start();
require_once 'Backend.php';
$obj = new Backend;
$conn = $obj->connection();

$sql = "SELECT DateOfReg FROM Customers WHERE idC='" . $_SESSION['empid'] . "'";
$r = mysqli_query($conn, $sql);
$res = mysqli_fetch_assoc($r);

$d1 = strtotime("+1 Years", strtotime($res['DateOfReg']));
$d2 = ceil(($d1 - time()) / 60 / 60 / 24);
if ($d2 == 0) {
    echo "To day is the day you Pay";
} elseif ($d2 < 0) {
    echo "Late payment by " . abs($d2) . " days ago";
} else {
    echo "There are " . $d2 . " days until";
}
