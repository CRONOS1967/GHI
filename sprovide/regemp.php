            <!-- /navbar-inner -->
            <?php
            // session_start();
            include 'navbar.php';
            // include '../Backend/Backend.php'; 
            ?>
            <div class="wrapper">
                <div class="container">
                    <!-- /navbar -->
                    <?php include 'sidebar.php';
                    $cobj = new Backend;
                    $conn = $cobj->connection();
                    // if (isset($_GET['edit'])) {
                    //     $res = $cobj->fetch($conn, 'Users', $_GET['edit'], 'idUsers');
                    //     $_SESSION['edit'] = $_GET['edit'];
                    //     $re = $cobj->fetch($conn, 'Customers', $_GET['edit'], 'idUsers');
                    //     // $_SESSION['edit1'] = $_GET['idC'];
                    // }

                    ?>
                    <!--/.span3-->
                    <div class="span9">
                        <div class="content">
                            <?php if (isset($_GET['q'])) : ?>
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>Well done!</strong> You have successfuly Regesterd:)
                                </div>
                            <?php endif;
                            // require '../Backend/Backend.php';
                            $obj = new Backend;
                            $conn = $obj->connection();
                            $sql = "SELECT * FROM Customers join Users on Customers.idUsers = Users.idUsers";
                            $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));

                            ?>
                            <div class="module">
                                <div class="module-head">
                                    <h3>Patient Registeration</h3>
                                </div>
                                <div class="module">

                                    <div class="module-body table">
                                        <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Reg Date</th>
                                                    <th>Family Amount</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php while ($res = mysqli_fetch_assoc($query)) :
                                                    $d1 = strtotime("+1 Year", strtotime($res['DateOfReg']));
                                                    $d2 = ceil(($d1 - time()) / 60 / 60 / 24);
                                                    if ($d2 >= 0) :
                                                ?>
                                                        <tr class="odd gradeX">

                                                            <td><?php echo $res['Fname'] . " " . $res['Lname']; ?></td>
                                                            <td><?php echo $res['Email']; ?></td>
                                                            <td class="center"> <?php echo $res['Phone']; ?></td>
                                                            <td><?php echo $res['DateOfReg']; ?></td>
                                                            <td class="center"><?php echo $res['NumOfFam']; ?></td>
                                                            <td class="center"><a class="btn btn-primary" href="?add=<?php echo $res['idC']; ?>">Regester</a> <!-- <a class="btn-danger btn-small" href="">Delete</a></td> -->
                                                        </tr>
                                                <?php endif;
                                                endwhile; ?>
                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/.content-->
                    </div>
                    <!--/.span9-->
                </div>
            </div>


            <!--/.container-->
            </div>
            <?php
            $data = array();

            if (isset($_GET['add'])) {
                $sql = "SELECT * FROM Customers WHERE idC ='" . $_GET['add'] . "'";
                $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                $data[0] = null;
                $data[1] = $_GET['add'];
                $data[2] = date('Y-m-d H:i:s');
                $data[3] = $_SESSION['empid'];

                $cobj->setAttrs($conn, 'Patients', $data);
                // echo $cobj->check_insert_query();
                $q = $cobj->insert();
                // header('location:emp.php');
            }

            ?>
            <!--/.container-->
            </div>
            <!--/.wrapper-->
            <?php include 'footers.php'; ?>