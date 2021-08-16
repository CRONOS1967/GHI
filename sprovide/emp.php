            <!-- /navbar-inner -->
            <?php include 'navbar.php';
            ?>
            <div class="wrapper">
                <div class="container">
                    <!-- /navbar -->
                    <?php include 'sidebar.php'; ?>
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
                                    <h3>DataTables</h3>
                                </div>
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
                                            <?php while ($res = mysqli_fetch_assoc($query)) : ?>
                                                <tr class="odd gradeX">
                                                   
                                                    <td><?php echo $res['Fname'] . " " . $res['Lname']; ?></td>
                                                    <td><?php echo $res['Email']; ?></td>
                                                    <td class="center"> <?php echo $res['Phone']; ?></td>
                                                    <td><?php echo $res['DateOfReg']; ?></td>
                                                    <td class="center"><?php echo $res['NumOfFam']; ?></td>
                                                    <td class="center"><a class="btn-warning btn-small" href="regemp.php?edit=<?php echo $res['idUsers']; ?>">Edit</a><a class="btn btn-small" href="npost.php?add=<?php echo $res['idC']; ?>">Add</a>  <!-- <a class="btn-danger btn-small" href="">Delete</a></td> -->
                                                </tr>
                                            <?php endwhile; ?>
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                            <!--/.module-->

                        </div>
                        <!--/.content-->
                    </div>
                    <!--/.span9-->
                </div>
            </div>
            </div>

            <!--/.wrapper-->

            <?php include 'footers.php'; ?>