            <!-- /navbar-inner -->
            <?php include 'navbar.php'; ?>



            <!-- /navbar -->
            <?php include 'sidebar.php'; ?>
            <!--/.span3-->
            <div class="span9">
                <div class="btn-controls">
                    <div class="btn-box-row row-fluid">
                        <a href="#" class="btn-box big span4"><i class="icon-user"></i><b id="user"></b>
                            <p class="text-muted">
                                Customers </p>
                        </a>
                        <a href="#" class="btn-box big span4"><i class="icon-group"></i><b id="fam">15</b>
                                        <p class="text-muted">
                                            Family menbers</p>
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
                    xhtt = new XMLHttpRequest();
                    xhtt.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            document.getElementById("user").innerHTML = this.responseText;
                        }
                    };
                    xhtt.open("POST", "../Backend/cus.php?", true);
                    xhtt.send();
                    xhtt = new XMLHttpRequest();
                    xhtt.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            document.getElementById("fam").innerHTML = this.responseText;
                        }
                    };
                    xhtt.open("POST", "../Backend/fam.php?", true);
                    xhtt.send();
                }
            </script>
            <?php include 'footers.php'; ?>