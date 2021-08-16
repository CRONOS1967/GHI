<?php
// session_start();
// require 'Backend/Backend.php';
// $obj = new Backend;
// $conn = $obj->connection();
switch ($_SESSION['role']) {
    case 'admin':
        # code...
        $row = $obj->fetch($conn, 'Employees', $_SESSION['id'], 'idUsers');
        if ($row['Status'] == 'active') {
            # code...
            $_SESSION['empid'] = $row['idE'];
            header("location:http://" . $_SERVER['HTTP_HOST'] . "/GHI/admin/index.php");
        } else {
            echo "<script>alert('Your account Had been Deactivated Please Contact your Adminstrator');</script>";
        }
        break;
    case 'Cust':
        # code...
        $row = $obj->fetch($conn, 'Customers', $_SESSION['id'], 'idUsers');
        $_SESSION['empid'] = $row['idC'];
        header("location:http://" . $_SERVER['HTTP_HOST'] . "/GHI/cus/index.php");
        break;
    case 'cord':
        # code...
        $row = $obj->fetch($conn, 'Employees', $_SESSION['id'], 'idUsers');
        if ($row['Status'] == 'active') {
            $row = $obj->fetch($conn, 'Employees', $_SESSION['id'], 'idUsers');
            $_SESSION['empid'] = $row['idE'];
            header("location:http://" . $_SERVER['HTTP_HOST'] . "/GHI/cord/index.php");
        } else {
            echo "<script>alert('Your account Had been Deactivated Please Contact your Adminstrator');</script>";
        }
        break;
    case 'HO':
        # code...
        $row = $obj->fetch($conn, 'Employees', $_SESSION['id'], 'idUsers');
        if ($row['Status'] == 'active') {
            $row = $obj->fetch($conn, 'Employees', $_SESSION['id'], 'idUsers');
            $_SESSION['empid'] = $row['idE'];
            header("location:http://" . $_SERVER['HTTP_HOST'] . "/GHI/ho/index.php");
        } else {
            echo "<script>alert('Your account Had been Deactivated Please Contact your Adminstrator');</script>";
        }
        break;
    case 'EW':
        # code...
        $row = $obj->fetch($conn, 'Employees', $_SESSION['id'], 'idUsers');
        if ($row['Status'] == 'active') {
            $row = $obj->fetch($conn, 'Employees', $_SESSION['id'], 'idUsers');
            $_SESSION['empid'] = $row['idE'];
            header("location:http://" . $_SERVER['HTTP_HOST'] . "/GHI/hew/index.php");
        } else {
            echo "<script>alert('Your account Had been Deactivated Please Contact your Adminstrator');</script>";
        }
        break;
    case 'Sprovider':
        // $row = $obj->fetch($conn, 'Employees', $_SESSION['id'], 'idUsers');
        $row = $obj->fetch($conn, 'Sproviders', $_SESSION['id'], 'idUsers');
        $_SESSION['empid'] = $row['idSproviders'];
        header("location:http://" . $_SERVER['HTTP_HOST'] . "/GHI/sprovide/index.php");
        break;

    default:
        session_unset();
        session_destroy();
        header("location:http://" . $_SERVER['HTTP_HOST'] . "/GHI/login.php");
        break;
}
    // echo "<script> console.log(".$result['Fname'].")</script>";
