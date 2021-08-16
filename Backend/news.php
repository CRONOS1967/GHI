<?php

if (isset($_POST['submit'])) {
    $data[0] = null;
    $data[1] = $_POST['title'];
    $data[2] = $_POST['detail'];
    $data[3] = date("Y-m-d")." ".date('h:i:s');
    $data[4] = $_SESSION['empid'];
    $cobj->setAttrs($conn, 'News', $data);
    $cobj->insert();
}
if (isset($_GET['edit'])) {
    $result = $cobj->fetch($conn, 'News', $_GET['edit'], 'idN');
    $_SESSION['nid'] =$_GET['edit'];
    $title = $result['Ntitle'];
    $detail = $result['Ndetail'];
    
}
if (isset($_POST['update'])) {
  
    $title = $_POST['title'];
    $detail = $_POST['detail'];
    $query = "UPDATE News SET Ntitle ='$title' , Ndetail = '$detail', Dofp='".date("Y-m-d")." ".date('h:i:s')."' WHERE idN=".$_SESSION['nid'].";";
    $res = mysqli_query($conn, $query) or die(mysqli_error($conn));
}
