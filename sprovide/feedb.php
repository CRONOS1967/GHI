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
                $data[0]=null;
                $data[1]=$_POST['detail'];
                $data[2]=$_SESSION['user'];
                $cobj->setAttrs($conn,'Feedbacks',$data);
                $cobj->insert();
            }
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
                                    <h3>Feed Back</h3>
                                </div>
                                <div class="module-body">

                                    <form class="form-horizontal row-fluid" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
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
                                            <button type="submit" name="submit" class="offset9 btn btn-large btn-primary">Send</button>
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
            <?php include 'footers.php'; ?>