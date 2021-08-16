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
                            $sql = "SELECT * FROM Reports";
                            $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                            ?>
                            <div class="module">
                                <div class="module-head">
                                    <h3>Reports</h3>
                                </div>
                                <div class="module-body table">
                                    <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Report ID</th>
                                                <th>Title</th>
                                                <th>Details</th>
                                                <th>Date</th>
                                                <th>Report by</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while ($res = mysqli_fetch_assoc($query)) : ?>
                                                <tr class="odd gradeX">
                                                    <td><?php echo $res['idReports']; ?></td>
                                                    <td><?php echo $res['Rtitle']; ?></td>
                                                    <td><?php echo $res['Detail']; ?></td>
                                                    <td class="center"> <?php echo $res['Rdate']; ?></td>
                                                    <td class="center"><?php echo $res['Rby']; ?></td>
                                                    <!-- <td class="center"><?php echo $res['Status']; ?></td>
                                                    <td class="center"><a class="btn-warning btn-small" href="regemp.php?edit=<?php echo $res['idUsers']; ?>">Edit</a> <a class="btn-danger btn-small" href="../Backend/resetPass.php?reset=<?php echo $res['idUsers']; ?>&un=<?php echo $res['Username']; ?>">Reset Password</a></td> -->
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