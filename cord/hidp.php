            <!-- /navbar-inner -->
            <?php include 'navbar.php';

            // include '../Backend/Backend.php';
            $cobj = new Backend;
            $conn = $cobj->connection();
            $data = array();
            $id = array();
            // require '../Backend/news.php';
            ?>


            <div class="wrapper">
                <div class="container">

                    <!-- /navbar -->
                    <?php include 'sidebar.php'; ?>
                    <!--/.span3-->
                    <div class="span9">
                        <div class="content">
                            <div class="module">
                                <?php
                                if (isset($_GET['edit'])) {
                                    # code...
                                    $sql="UPDATE Customers SET DateOfReg='".date('Y-m-d')."' WHERE idC='".$_GET['edit']."'";
                                    mysqli_query($conn,$sql) or die(mysqli_error($conn));
                                }
                                $sql = "SELECT * FROM Customers JOIN Users on Customers.idUsers = Users.idUsers";
                                $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                                ?>
                                <div class="module-body">
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
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while ($res = mysqli_fetch_assoc($query)) : 
                                                $d1=strtotime("+1 Years",strtotime($res['DateOfReg']));
                                                $d2=ceil(($d1-time())/60/60/24);
                                                if ($d2 <= 0):
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
                                                    <td><a  class="btn btn-success" href="?edit=<?php echo $res['idC']; ?>">Renew ID</a></td>
                                                </tr>
                                            <?php endif; endwhile; ?>
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