            <!-- /navbar-inner -->
            <?php include 'navbar.php'; ?>



            <!-- /navbar -->
            <?php include 'sidebar.php'; ?>
            <!--/.span3-->
            <div class="span9">
                <div class="btn-controls">
                    <div class="btn-box-row row-fluid">
                        <a href="#" class="btn-box big span4"><i class="icon-ambulance"></i><b id="emp"></b>
                            <p class="text-muted">
                                Service Providers Avalable</p>
                        </a>
                        <a href="#" class="btn-box big span4"><i class="icon-bell"></i><b id="user"></b>
                            <p class="text-muted">
                                Next Payment </p>
                        </a>
                    </div>
                    <!--/.content-->
                </div>
                <!--/.span9-->
            </div>
            <?php include '../include/news.php'; ?>
            </div>
            <!--/.container-->
            </div>
            <!--/.wrapper-->
            <script>
                window.addEventListener('onload', users());

                function users() {
                    xhttp = new XMLHttpRequest();
                    console.log(xhttp);
                    xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            document.getElementById("emp").innerHTML = this.responseText;
                        }
                    };
                    xhttp.open("POST", "../Backend/mangemp.php?", true);
                    xhttp.send();

                    xhtt = new XMLHttpRequest();
                    xhtt.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            document.getElementById("user").innerHTML = this.responseText;
                        }
                    };
                    xhtt.open("POST", "../Backend/remdate.php?", true);
                    xhtt.send();
                }
            </script>
            <?php include 'footers.php'; ?>