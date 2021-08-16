<?php
session_start();
include 'Backend.php';
$cobj = new Backend;
$conn = $cobj->connection();
$data = array();
if (isset($_POST['submit'])) {
    $data[0] = null;
    $data[1] = $_POST['uname'];
    $data[2] = $_POST['fname'];
    $data[3] = $_POST['lname'];
    $data[4] = $_POST['add'];
    $data[5] = $_POST['ph'];
    $data[6] = $_POST['mail'];
    $data[7] = 'Cust';
    $data[8] = $_POST['sex'];
    $data[9] = 'user.png';
    $data[10] = password_hash($_POST['uname'], PASSWORD_DEFAULT);
    $cobj->setAttrs($conn, 'Users', $data);
    // echo $cobj->check_insert_query();
    $q = $cobj->insert();
    if ($q == false) {
        echo (mysqli_error($conn));
    } else {
        $data1 = array();
        $data1[0] = "CU" . $q;
        $data1[1] = $_POST['dob'];
        $data1[2] = $_POST['job'];
        $data1[3] = $_POST['eph'];
        $data1[4] = $_POST['fam'];
        $data1[5] = date('Y-m-d');
        $data1[6] = $q;
        $cobj->setAttrs($conn, 'Customers', $data1);
        // echo $cobj->check_insert_query();
        $_SESSION['fam'] = $_POST['fam'];
        $cobj->insert();
        $_SESSION['add'] = $data1[0];
        header('location:../hew/npost.php');
    }
    // header('location:emp.php');
}
if (isset($_POST['update'])) {
    $q = "UPDATE Users SET Username='" . $_POST['uname'] . "', Fname='" . $_POST['fname'] . "', Lname='" . $_POST['lname'] . "', Address='" . $_POST['add'] . "', Phone=" . $_POST['ph'] . ", Email='" . $_POST['mail'] . "', Sex='" . $_POST['sex'] . "' WHERE idUsers=" . $_SESSION['edit'] . ";";
    mysqli_query($conn, $q) or die(mysqli_error($conn));
    $q = "UPDATE Customers SET DOB='" . $_POST['dob'] . "', Job='" . $_POST['job'] . "', Emcontact=" . $_POST['eph'] . ", NumOfFam=" . $_POST['fam'] . " WHERE idUsers=" . $_SESSION['edit'] . ";";
    mysqli_query($conn, $q) or die(mysqli_error($conn));
    header('location:../hew/emp.php');
}
