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
                $data[3] = date('Y m d H:i:s');
                $data[3] = $_SESSION['user'];
                $cobj->setAttrs($conn, 'Reports', $data);
                $cobj->insert();
            }
            $sql = "SELECT * FROM Reports WHERE Rby = '".$_SESSION['user']."'";
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
                                    <h3>Write Report</h3>
                                </div>
                                <div class="module-body">

                                    <form class="form-horizontal row-fluid" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                        <fieldset class="row-fluid">
                                            <legend>Title</legend>
                                            <div class="span5">
                                                <label class="control-label" for="User Name">Title</label>
                                                <div class="controls">
                                                    <input name="title" type="text" id="User Name" value="<?php if (isset($title)) : echo $title;
                                                                                                            endif; ?>" required placeholder="Please Enter User Name">
                                                    <span class="help-inline"></span>
                                                </div>
                                            </div>

                                        </fieldset>
                                        <fieldset class="row-fluid">
                                            <legend>Details</legend>
                                            <div class="control-group">
                                                <label class="control-label" for="basicinput">Textarea</label>
                                                <div class="controls">
                                                    <textarea name="detail" class="span8" required rows="5"><?php if (isset($detail)) : echo $detail;
                                                                                                            endif; ?></textarea>
                                                </div>
                                            </div>

                                        </fieldset>
                                        <?php if (isset($_GET['edit'])) : ?>
                                            <button class="offset9 btn btn-large" type="submit" name="update">
                                                Edit
                                            </button>
                                        <?php else : ?>
                                            <button type="submit" name="submit" class="offset9 btn btn-large">Post</button>
                                        <?php endif; ?>
                                    </form>
                                </div>
                            </div>
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
                                                <!-- <th>Action</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while ($res = mysqli_fetch_assoc($query)) : ?>
                                                <tr class="odd gradeX">

                                                    <td><?php echo $res['idReports']; ?></td>
                                                    <td class="center"><?php echo $res['Rtitle']; ?></td>
                                                    <td><?php echo $res['Detail']; ?></td>
                                                 
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