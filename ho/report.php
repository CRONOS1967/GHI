            <!-- /navbar-inner -->
            <?php include 'navbar.php';
            // include '../Backend/Backend.php';
            $cobj = new Backend;
            $conn = $cobj->connection();
            $data = array();
            $id = array();
            // require '../Backend/news.php';
            if (isset($_POST['submit'])) {
                # code...
                $data[0] = null;
                $data[1] = $_POST['title'];
                $data[2] = $_POST['detail'];
                $data[3] = $_SESSION['user'];
                $cobj->setAttrs($conn, 'Reports', $data);
                $cobj->insert();
            }
            $sql = "SELECT * FROM Reports join Users on Reports.Rby = Users.Username";
            $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));

            ?>


            <div class="wrapper">
                <div class="container">

                    <!-- /navbar -->
                    <?php include 'sidebar.php'; ?>
                    <!--/.span3-->
                    <div class="span9">
                        <div class="content">
                          
                            <div class="module">
                                <div class="module-head">
                                    <h3>Pervious Reports</h3>
                                </div>
                                <div class="module-body table">
                                    <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Report Id</th>
                                                <th>Report Title </th>
                                                <th>Report</th>
                                                <th>Report By</th>
                                                <th>Time</th>
                                                <!-- <th>Action</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while ($res = mysqli_fetch_assoc($query)) : ?>
                                                <tr class="odd gradeX">

                                                    <td><?php echo $res['idReports']; ?></td>
                                                    <td class="center"><?php echo $res['Rtitle']; ?></td>
                                                    <td><?php echo $res['Detail']; ?></td>
                                                    <td><?php echo $res['Fname']." ".$res['Lname']; ?></td>
                                                    <td><?php echo $res['Rdate']; ?></td>
                                                    <!-- <td class="center"><a class="btn-warning btn-small" href="npost.php?edit=<?php echo $res['idFamilies']; ?>">Edit</a><a class="btn btn-small" href="npost.php?add=<?php echo $res['idC']; ?>">Add</a>  <a class="btn-danger btn-small" href="">Delete</a></td> -->
                                                </tr>
                                            <?php endwhile; ?>
                                        </tbody>

                                    </table>
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
            <?php include 'footers.php'; ?>