<?php require_once 'headers.php';
require '../Backend/Backend.php';
$obj = new Backend;
$conn = $obj->connection();
$result = $obj->fetch($conn, 'Users', $_SESSION['id'], 'idUsers');

?>
<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                <i class="icon-reorder shaded"></i></a><a class="brand" href="index.php">GONDAR HEALTH INSURANCE </a>
            <div class="nav-collapse collapse navbar-inverse-collapse">


                <ul class="nav pull-right">
                    <!-- <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown
                                <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Item No. 1</a></li>
                                    <li><a href="#">Don't Click</a></li>
                                    <li class="divider"></li>
                                    <li class="nav-header">Example Header</li>
                                    <li><a href="#">A Separated link</a></li>
                                </ul>
                            </li> -->
                    <li><a><?php echo $retVal = (isset($result['Username'])) ? $result['Username'] : null; ?>(<?php echo $retVal = (isset($result['Role'])) ? $result['Role'] : null; ?>)  </a></li>
                    <li class="nav-user dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="../uploads/<?php echo $retVal = (isset($result['pic'])) ? $result['pic'] : null; ?>"  class="nav-avatar" />
                            <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <!-- <li><a href="#">Your Profile</a></li>
                                    <li><a href="#">Edit Profile</a></li> -->
                            <li><a href="accountset.php">Account Settings</a></li>
                            <li class="divider"></li>
                            <li><a href="../Backend/logout.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.nav-collapse -->
        </div>
    </div>
</div>