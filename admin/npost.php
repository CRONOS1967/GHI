            <!-- /navbar-inner -->
            <?php include 'navbar.php';

            // include '../Backend/Backend.php';
            $cobj = new Backend;
            $conn = $cobj->connection();
            $data = array();
            $id=array();
            require '../Backend/news.php';
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
                                    <h3>Post News</h3>
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