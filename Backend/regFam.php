<?php
session_start();
include 'Backend.php';
$cobj = new Backend;
$conn = $cobj->connection();
$data = array();
if (isset($_POST['submit'])) {
    $data[0] = null;
    $data[1] = $_POST['fname'];
    $data[2] = $_POST['lname'];
    $data[3] = $_SESSION['add'];
    $cobj->setAttrs($conn, 'Families', $data);
    // echo $cobj->check_insert_query();
    $cobj->insert();
    if ($_SESSION['fam']==1) {
        # code...
        header('location:../hew/regemp.php');
    }else{
        $_SESSION['fam']--;
        header('location:../hew/npost.php');
    }
}
if (isset($_POST['update'])) {
    $que = "UPDATE Families SET FName='" . $_POST['fname'] . "',LName='" . $_POST['lname'] . "' WHERE idFamilies=" . $_SESSION['edit'] . "";
    mysqli_query($conn, $que) or die(mysqli_error($conn));
}
