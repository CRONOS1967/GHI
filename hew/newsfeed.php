            <!-- /navbar-inner -->
            <?php include 'navbar.php';
            // include '../Backend/Backend.php';
            $obj = new Backend;
            $conn = $obj->connection();
            $rows = $obj->fetchnews($conn, 'News');
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
                                    <h3>News Feed</h3>
                                </div>
                                <div class="module-body">
                                    <div class="stream-list">
                                        <!-- <div class="media stream new-update">
                                            <a href="#">
                                                <i class="icon-refresh shaded"></i>
                                                11 updates
                                            </a>
                                        </div> -->
                                        <?php foreach ($rows as $row) :
                                            $res = $obj->fetch($conn, 'Employees', $row['postedBy'], 'idE');
                                            $result = $obj->fetch($conn, 'Users', $res['idUsers'], 'idUsers');

                                        ?>
                                            <div class="media stream">
                                                <a href="#" class="media-avatar medium pull-left">
                                                    <img src="../uploads/<?php echo $retVal = (isset($result['pic'])) ? $result['pic'] : null; ?>">
                                                    <h6 class="stream-author offset4">
                                                        <?php echo $result['Username']; ?>
                                                    </h6>
                                                </a>
                                                <div class="media-body module-head">
                                                    <div class="stream-headline">
                                                        <div class="offset3">
                                                            <h4><?php echo $row['Ntitle']; ?></h4>
                                                        </div>
                                                        <div class="stream-text">
                                                            <?php echo $row['Ndetail']; ?>
                                                        </div>
                                                        <div class="offset6">
                                                            <h6 class="stream-author">
                                                                <?php echo $row['Dofp']; ?></h6>
                                                        </div>
                                                        <a type="submit" href="npost.php?edit=<?php echo $row['idN']; ?>" class="offset7 btn btn-large">Edit</a>
                                                    </div>
                                                    <!--/.stream-headline-->
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                        <!--/.media .stream-->

                                        <!--/.media .stream-->

                                        <div class="media stream load-more">
                                            <a href="#">
                                                <i class="icon-refresh shaded"></i>
                                                show more...
                                            </a>
                                        </div>
                                    </div>
                                    <!--/.stream-list-->
                                </div>
                                <!--/.module-body-->
                            </div>
                            <!--/.module-->

                        </div>
                        <!--/.content-->
                    </div>
                    <!--/.span9-->
                </div>
            </div>

            <script>
                function give() {
                    var fname = $("#FirstName").val();
                    document.getElementById("UserName").value = fname;
                    validate();

                }

                function validate() {
                    var us = $("#UserName").val();
                    console.log(us);
                    jQuery.ajax({
                        url: "../Backend/cheakuser.php",
                        data: 'username=' + us,
                        type: "POST",
                        success: function(response) {
                            $("#result").html(response);
                        },
                        error: function(error) {
                            console.log("error");
                        }
                    });

                }
            </script>
            <!--/.container-->
            </div>

            <!--/.wrapper-->
            <?php include 'footers.php'; ?>