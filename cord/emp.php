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
                                    <strong>Well done!</strong> You have successfuly Regestred Another Adminstrator:)
                                </div>
                            <?php endif;
                            // require '../Backend/Backend.php';
                            $obj = new Backend;
                            $conn = $obj->connection();
                            $sql = "SELECT * FROM Customers JOIN Users on Customers.idUsers = Users.idUsers";
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
                                                <th>#</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Address</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>Date Of Regestration</th>
                                                <th>Remanig Dates</th>
                                                <!-- <th>Actions</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while ($res = mysqli_fetch_assoc($query)) :
                                                $d1=strtotime("+1 Years",strtotime($res['DateOfReg']));
                                                $d2=ceil(($d1-time())/60/60/24);
                                                ?>
                                                <tr>
                                                    <td><?php echo $res['idC']; ?></td>
                                                    <td><?php echo $res['Fname']; ?></td>
                                                    <td><?php echo $res['Lname']; ?></td>
                                                    <td><?php echo $res['Address']; ?></td>
                                                    <td><?php echo $res['Phone']; ?></td>
                                                    <td><?php echo $res['Email']; ?></td>
                                                    <td><?php echo $res['DateOfReg']; ?></td>
                                                    <td><?php echo $d2; ?></td>
                                                    <!-- <td><a class="btn btn-success" href="?edit=<?php echo $res['idC']; ?>">Renew ID</a></td> -->
                                                </tr>
                                            <?php   endwhile; ?>
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