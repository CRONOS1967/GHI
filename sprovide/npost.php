           <!-- /navbar-inner -->
           <?php 
            include 'navbar.php';

            // include '../Backend/Backend.php';
            $cobj = new Backend;
            $conn = $cobj->connection();
            if (isset($_GET['add'])) {
                // $res = $cobj->fetch($conn, 'Customers', $_GET['add'], 'idC');
                $_SESSION['add'] = $_GET['add'];
                // $_SESSION['edit1'] = $_GET['idC'];
            }
            if (isset($_GET['edit'])) {
                $res = $cobj->fetch($conn, 'Families', $_GET['edit'], 'idFamilies');
                $_SESSION['edit'] = $_GET['edit'];
                // $_SESSION['edit1'] = $_GET['idC'];
            }
            ?>
           <div class="wrapper">
               <div class="container">

                   <!-- /navbar -->
                   <?php include 'sidebar.php'; ?>
                   <!--/.span3-->
                   <div class="span9">
                       <div class="content">
                           <div class="module" id="myDIV">
                               <div class="module-head">
                                   <h3>Family Registeration Form</h3>
                               </div>
                               <div class="module-body">
                                   <form class="form-horizontal row-fluid" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                       <fieldset class="row-fluid">
                                           <legend>Personal Info</legend>
                                           <div class="span5">
                                               <label class="control-label" for="First Name">First Name</label>
                                               <div class="controls">
                                                   <input type="text" required value="<?php echo $retVal = (isset($res['FName'])) ? $res['FName'] : null; ?>" id="FirstName" name="fname" placeholder="Please Enter First Name">
                                                   <span class="help-inline"></span>
                                               </div>
                                           </div>
                                           <div class="span5">
                                               <label class="control-label" for="Last Name">Last Name</label>
                                               <div class="controls">
                                                   <input type="text" onblur="validate()" value="<?php echo $retVal = (isset($res['LName'])) ? $res['LName'] : null; ?>" id="LastName" required name="lname" placeholder="Please Enter Last Name">
                                                   <span class="help-inline"></span>
                                               </div>
                                           </div>
                                       </fieldset>
                                       <?php if (isset($_GET['edit'])) : ?>
                                           <!-- <input hidden name="id" value="<?php echo $retVal = (isset($res['idUsers'])) ? $res['idUsers'] : null; ?>"> -->
                                           <button type="submit" name="update" id="submit" class="offset9 btn btn-large">Update</button>
                                       <?php else : ?>

                                           <button type="submit" name="submit" id="submit" class="offset9 btn btn-large"><a></a> Register</button>
                                       <?php endif; ?>
                                   </form>
                               </div>
                           </div>
                       </div>
                       <!--/.content-->
                   </div>
                   <!--/.span9-->
               </div>
           </div>
           <script>

           </script>

           <!--/.container-->
           </div>
           <!--/.wrapper-->
           <?php
            $data = array();
            if (isset($_POST['submit'])) {
                $data[0] = null;
                $data[1] = $_POST['fname'];
                $data[2] = $_POST['lname'];
                $data[3] = $_SESSION['add'];
                $cobj->setAttrs($conn, 'Families', $data);
                    // echo $cobj->check_insert_query();
                    $cobj->insert();
            }
            if (isset($_POST['update'])) {
                $que = "UPDATE Families SET FName='".$_POST['fname'] ."',LName='". $_POST['lname']."' WHERE idFamilies=". $_SESSION['edit']."";
                mysqli_query($conn,$que) or die (mysqli_error($conn));
            }
            ?>
           <?php include 'footers.php'; ?>