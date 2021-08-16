<?php
session_start();
include 'Backend.php';
$obj = new Backend;
$conn = $obj->connection();

if ($_GET['reset'] && $_GET['un']) {
    # code...
    // mysqli_query($conn,$query);
    $q = "UPDATE `Users` SET `Pass` = '" . password_hash($_GET['un'], PASSWORD_DEFAULT) . "' WHERE `Users`.`idUsers` =" . $_GET['reset'] . " AND `Users`.`Username` = '" . $_GET['un'] . "'; ";
    if (mysqli_query($conn, $q)) {
        # code...
        echo "<script>alert('Reseted succesfully')</script>";
    } else {
        echo "<script>alert('Try again')</script>";
    }
    if ($_SESSION['role'] == 'admin') {
        # code...
        header('location:../admin/emp.php');
    } elseif($_SESSION['role'] == 'cord'){
        header('location:../cord/spall.php');
    }
    else {
        header('location:../hew/emp.php');
    }
}
