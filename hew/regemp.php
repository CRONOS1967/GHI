            <!-- /navbar-inner -->
            <?php
            // session_start();
            include 'navbar.php';
            // include '../Backend/Backend.php'; 
            ?>
            <div class="wrapper">
                <div class="container">
                    <!-- /navbar -->
                    <?php include 'sidebar.php';
                    $cobj = new Backend;
                    $conn = $cobj->connection();
                    if (isset($_GET['edit'])) {
                        $res = $cobj->fetch($conn, 'Users', $_GET['edit'], 'idUsers');
                        $_SESSION['edit'] = $_GET['edit'];
                        $re = $cobj->fetch($conn, 'Customers', $_GET['edit'], 'idUsers');
                        // $_SESSION['edit1'] = $_GET['idC'];
                    }

                    ?>
                    <!--/.span3-->
                    <div class="span9">
                        <div class="content">
                            <div class="module">
                                <div class="module-head">
                                    <h3>Customer Registeration Form</h3>
                                </div>
                                <div class="module-body">

                                    <form class="form-horizontal row-fluid" action="../Backend/regCus.php" method="post">
                                        <fieldset class="row-fluid">
                                            <legend>Personal Info</legend>
                                            <div class="span5">
                                                <label class="control-label" for="First Name">First Name</label>
                                                <div class="controls">
                                                    <input type="text" required value="<?php echo $retVal = (isset($res['Fname'])) ? $res['Fname'] : null; ?>" id="form_fname" name="fname" placeholder="Please Enter First Name">
                                                    <span id="fname_error_message"></span>
                                                </div>
                                            </div>
                                            <div class="span5">
                                                <label class="control-label" for="Last Name">Last Name</label>
                                                <div class="controls">
                                                    <input type="text" onblur="validate()" value="<?php echo $retVal = (isset($res['Lname'])) ? $res['Lname'] : null; ?>" id="form_sname" required name="lname" placeholder="Please Enter Last Name">
                                                    <span class="error_form" id="sname_error_message"></span>
                                                </div>
                                            </div><br><br><br><br>
                                            <label class="control-label">Gender</label>
                                            <div class="span2">
                                                <label class="radio">
                                                    <input type="radio" name="sex" id="Male" value="Male" checked="">
                                                    Male
                                                </label>
                                                <label class="radio">
                                                    <input type="radio" name="sex" id="Female" value="Female">
                                                    Female
                                                </label>

                                            </div>

                                        </fieldset>
                                        <fieldset class="row-fluid">
                                            <legend>Sign In Info</legend>
                                            <div class="span5">
                                                <label class="control-label" for="UserName">User Name</label>
                                                <div class="controls">
                                                    <input type="text" hidden readonly name="uname" value="<?php echo $retVal = (isset($res['Username'])) ? $res['Username'] : null; ?>" id="UserName" required placeholder="Please Enter User Name">
                                                    <span class="help-inline" id="result"></span>
                                                </div>
                                            </div>
                                            <!-- <div class="span6">
                                                <label class="control-label" for="Password">Password</label>
                                                <div class="controls">
                                                    <input type="password" id="Password" name="pass" required placeholder="Please Enter Password">
                                                    <span class="help-inline"></span>
                                                </div>
                                            </div> -->
                                        </fieldset>
                                        <fieldset class="row-fluid">
                                            <legend>Contact Info</legend>
                                            <div class="row">

                                                <div class="span5">
                                                    <label class="control-label" for="Address">Address</label>
                                                    <div class="controls">
                                                        <input type="text" id="Address" value="<?php echo $retVal = (isset($res['Address'])) ? $res['Address'] : null; ?>" required name="add" placeholder="Please Enter Address">
                                                        <span class="help-inline"></span>
                                                    </div>
                                                </div>
                                                <div class="span5 offset1">
                                                    <label class="control-label" for="Email">Email</label>
                                                    <div class="controls">
                                                        <input type="email" onkeyup="valmail()" id="Email" value="<?php echo $retVal = (isset($res['Email'])) ? $res['Email'] : null; ?>" name="mail" required placeholder="Please Enter Email">
                                                        <span class="help-inline"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="span6">
                                                    <label class="control-label" for="Phone Number">Phone Number</label>
                                                    <div class="controls">
                                                        <input type="number" min="99999999" max="999999999" id="Phone Number" name="ph" value="<?php echo $retVal = (isset($res['Phone'])) ? $res['Phone'] : null; ?>" required placeholder="Please Enter Phone Number">
                                                        <span class="help-inline"></span>
                                                    </div>
                                                </div>
                                                <div class="span1">
                                                    <label class="control-label" for="eNumber">Emergency Phone Number</label>
                                                    <div class="controls">
                                                        <input type="number" min="99999999" max="999999999" id="eNumber" name="eph" value="<?php echo $retVal = (isset($res['Phone'])) ? $res['Phone'] : null; ?>" required placeholder="Please Enter Phone Number">
                                                        <span class="help-inline"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <fieldset class="row-fluid">
                                            <legend>Other Info</legend>
                                            <div class="row">
                                                <?php if (isset($_GET['edit'])) : ?>
                                                    <div class="span5">
                                                        <label class="control-label" for="sd">Date of Birth</label>
                                                        <div class="controls">
                                                            <input type="text" name="dob" value="<?php echo $retVal = (isset($re['DOB'])) ? $re['DOB'] : null; ?>" id="sd">
                                                            <span class="help-inline" id="sh"></span>
                                                        </div>
                                                    </div>
                                                <?php else : ?>
                                                    <div class="span5">
                                                        <label class="control-label" for="sd">Date of Birth</label>
                                                        <div class="controls">
                                                            <input type="date" onblur="sval()" name="dob" value="<?php echo $retVal = (isset($re['DOB'])) ? $res['DOB'] : null; ?>" id="sd" required>
                                                            <span class="help-inline" id="sh"></span>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                                <div class="span5 offset1">
                                                    <label class="control-label" for="job">Job</label>
                                                    <div class="controls">
                                                        <input type="text" name="job" value="<?php echo $retVal = (isset($re['Job'])) ? $re['Job'] : null; ?>" id="job" required placeholder="Please Enter User Name">
                                                        <span class="help-inline" id="result"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="span5">
                                                    <label class="control-label" for="fam">Number of Family</label>
                                                    <div class="controls">
                                                        <input type="number" min="0" max="5" id="fam" name="fam" value="<?php echo $retVal = (isset($re['NumOfFam'])) ? $re['NumOfFam'] : null; ?>" required placeholder="Please Enter Phone Number">
                                                        <span class="help-inline"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <?php if (isset($_GET['edit'])) : ?>
                                            <!-- <input hidden name="id" value="<?php echo $retVal = (isset($res['idUsers'])) ? $res['idUsers'] : null; ?>"> -->
                                            <button type="submit" name="update" id="submit" class="offset9 btn btn-large">Update</button>
                                        <?php else : ?>

                                            <button type="submit" name="submit" id="submit" class="offset9 btn btn-large"><a></a> Register</button>
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
                function validate() {
                    // var us = $("#UserName").val();
                    var fname = $("#form_fname").val();
                    var lname = $("#form_sname").val();
                    // console.log(fname)
                    var us = fname.concat('.', lname.substr(0, 3));
                    // console.log(us);
                    // us= 'admin';
                    document.getElementById("UserName").value = us;
                    jQuery.ajax({
                        url: "../Backend/cheakuser.php",
                        data: 'username=' + us,
                        type: "POST",
                        success: function(response) {
                            document.getElementById("UserName").value = $("#UserName").val().concat("", response);
                            console.log($("#UserName").val().concat("", response));
                        },
                        error: function(error) {
                            console.log("error");
                        }
                    });
                }

                function valmail() {
                    var us = $("#Email").val();
                    // console.log(us);
                    jQuery.ajax({
                        url: "../Backend/checkmail.php",
                        data: 'mail=' + us,
                        type: "POST",
                        success: function(response) {
                            $("#res").html(response);

                        },
                        error: function(error) {
                            console.log("error");
                            $("#res").html('unable to connect');
                        }
                    });

                }

                function sval() {
                    var sd = document.getElementById("sd").value;
                    jQuery.ajax({
                        url: "../Backend/date1.php",
                        data: 'date=' + sd,
                        type: "POST",
                        success: function(response) {
                            $("#sh").html(response);
                        },
                        error: function(error) {
                            console.log("error");
                            $("#sh").html('unable to connect');
                        }
                    });
                }
            </script>
            <!--/.container-->
            </div>
            
            <!--/.container-->
            </div>
            <!--/.wrapper-->
            <?php include 'footers.php'; ?>