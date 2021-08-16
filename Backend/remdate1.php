<?php
session_start();
require_once 'Backend.php';
$obj = new Backend;
$conn = $obj->connection();

$sql = "SELECT Fdate FROM Sproviders WHERE idSproviders='" . $_SESSION['empid'] . "'";
$r = mysqli_query($conn, $sql);
$res = mysqli_fetch_assoc($r);

$d1 = strtotime("+1 Years", strtotime($res['Fdate']));
$d2 = ceil(($d1 - time()) / 60 / 60 / 24);
if ($d2 == 0) {
    echo "To day Last Day Of Contract";
} elseif ($d2 < 0) {
    echo "Late Contract DAte by " . abs($d2) . " days ago";
} else {
    echo "There are " . $d2 . " days until";
}
