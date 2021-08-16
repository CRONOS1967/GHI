<?php 
session_start();
// require '../Routing.php';
if (isset($_SESSION['role']) && $_SESSION['role']=='Sprovider') {
} else {
    header("location:http://" . $_SERVER['HTTP_HOST'] . "/GHI/login.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/style2.css">
    <link rel="stylesheet" href="../assets/css/style3.css">
    <link rel="stylesheet" href="../assets/css/style4.css">
    <link rel="stylesheet" href="../assets/css/theme.css">
    <link rel="stylesheet" href="../assets/images/icons/css/font-awesome.css">
</head>
<body>