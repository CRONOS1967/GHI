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
                    }

                    ?>
                    <!--/.span3-->
                    <div class="span9">
                        <div class="content">
                            <div class="module">
                                <div class="module-head">
                                    <h3>Service Provider Registeration Forms</h>
                                </div>
                                <div class="module-body">
                                <?php echo $retVal = (isset($_SESSION['msg'])) ? $_SESSION['msg'] : null ; ?>
                                    <br />
                                    <form class="form-horizontal row-fluid" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                        <fieldset class="row-fluid">
                                            <legend>Service Provider Info</legend>
                                            <div class="span5">
                                                <label class="control-label" for="First Name">First Name</label>
                                                <div class="controls">
                                                    <input type="text" required value="<?php echo $retVal = (isset($res['Fname'])) ? $res['Fname'] : null; ?>" id="form_fname" name="fname" placeholder="Please Enter First Name">
                                                    <span style="color: red;" id="fname_error_message"></span>
                                                </div>
                                            </div>
                                            <div class="span5">
                                                <label class="control-label" for="Last Name">Last Name</label>
                                                <div class="controls">
                                                    <input type="text" onblur="validate()" value="<?php echo $retVal = (isset($res['Lname'])) ? $res['Lname'] : null; ?>" id="form_sname" required name="lname" placeholder="Please Enter Last Name">
                                                    <span style="color: red;" id="sname_error_message"></span>
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
                                            <div class="span5">
                                                <label class="control-label" for="UserName">Hospital Name</label>
                                                <div class="controls">
                                                    <input type="text" name="hname" value="<?php echo $retVal = (isset($res['Username'])) ? $res['Username'] : null; ?>" id="UserName" required placeholder="Please Enter Hospital Name">
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
                                            <legend>Work Info</legend>
                                            <div class="span5">
                                                <label class="control-label" for="UserName">Starting Date</label>
                                                <div class="controls">
                                                    <input type="date" onblur="sval()" name="sdate" value="<?php echo $retVal = (isset($res['Username'])) ? $res['Username'] : null; ?>" id="sd" required>
                                                    <span class="help-inline" id="sh"></span>
                                                </div>
                                            </div>
                                            <div class="span5">
                                                <label class="control-label" for="UserName">Ending Date</label>
                                                <div class="controls">
                                                    <input type="date" onblur="lastval()" name="edate" value="<?php echo $retVal = (isset($res['Username'])) ? $res['Username'] : null; ?>" id="ed" required>
                                                    <span class="help-inline" id="eh"></span>
                                                </div>
                                            </div><br><br><br>
                                            <div class="span6">
                                                <label class="control-label" for="Password">Contract description</label>
                                                <div class="controls">
                                                    <input type="text" id="text" name="detail" required placeholder=" ">
                                                    <span class="help-inline"></span>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <fieldset class="row-fluid">
                                            <!-- <legend>Work Role</legend>
                                            <div class="control-group span5">
                                                <label class="control-label" for="basicinput">Role</label>
                                                <div class="controls">
                                                    <select tabindex="1" data-placeholder="Select here.." class="span12" id="role" name="role">
                                                        <option>Select here..</option>
                                                        <option value="cord">Cordinator</option>
                                                        <option value="HO">Health Officer</option>
                                                        <option value="EW">Extension Worker</option>
                                                        <option value=""></option> 
                                                    </select>
                                                </div>
                                            </div> -->
                                            <!-- <div class="span5 offset5">
                                                <label class="control-label">Status</label>
                                                <div class="span2">
                                                    <label class="radio">
                                                        <input type="radio" name="sts" id="sts1" value="active" checked="">
                                                        Active
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="sts" id="sts2" value="disable">
                                                        Inactive
                                                    </label>
                                                </div>
                                            </div> -->
                                        </fieldset>
                                        <fieldset class="row-fluid">
                                            <legend>Contact Info</legend>
                                            <div class="span5">
                                                <label class="control-label" for="Address">Address</label>
                                                <div class="controls">
                                                    <input type="text" id="Address" value="<?php echo $retVal = (isset($res['Address'])) ? $res['Address'] : null; ?>" required name="add" placeholder="Please Enter Address">
                                                    <span class="help-inline"></span>
                                                </div>
                                            </div>
                                            <div class="span5">
                                                <label class="control-label" for="Email">Email</label>
                                                <div class="controls">
                                                    <input type="email" onkeyup="valmail()" id="Email" value="<?php echo $retVal = (isset($res['Email'])) ? $res['Email'] : null; ?>" name="mail" required placeholder="Please Enter Email">
                                                    <span class="help-inline"></span>
                                                </div>
                                            </div>
                                            <div class="span6">
                                                <label class="control-label" for="Phone Number">Phone Number</label>
                                                <div class="controls">
                                                    <input type="number" min="99999999" max="999999999" id="Phone Number" name="ph" value="<?php echo $retVal = (isset($res['Phone'])) ? $res['Phone'] : null; ?>" required placeholder="Please Enter Phone Number">
                                                    <span class="help-inline"></span>
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
                        url: "../Backend/date.php",
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

                function lastval() {
                    var sd = document.getElementById("ed").value;
                    jQuery.ajax({
                        url: "../Backend/date.php",
                        data: 'date=' + sd,
                        type: "POST",
                        success: function(response) {
                            $("#eh").html(response);
                        },
                        error: function(error) {
                            console.log("error");
                            $("#eh").html('unable to connect');
                        }
                    });
                }
            </script>
            <!--/.container-->
            </div>
            <?php
            $data = array();
            if (isset($_POST['submit'])) {
                $data[0] = null;
                $data[1] = $_POST['uname'];
                $data[2] = $_POST['fname'];
                $data[3] = $_POST['lname'];
                $data[4] = $_POST['add'];
                $data[5] = $_POST['ph'];
                $data[6] = $_POST['mail'];
                $data[7] = 'Sprovider';
                $data[8] = $_POST['sex'];
                $data[9] = 'user.png';
                $data[10] = password_hash($_POST['uname'], PASSWORD_DEFAULT);
                $cobj->setAttrs($conn, 'Users', $data);
                // echo $cobj->check_insert_query();
                $q = $cobj->insert();
                if ($q == false) {
                    echo (mysqli_error($conn));
                } else {
                    $data1 = array();
                    $data1[0] = "SP" . $q;
                    $data1[1] = $_POST['hname'];
                    $data1[2] = $_POST['sdate'];
                    $data1[3] = $_POST['edate'];
                    $data1[4] = $_POST['detail'];
                    $data1[5] = $q;

                    $cobj->setAttrs($conn, 'Sproviders', $data1);
                    if ($cobj->insert()) {
                        # code...
                        $_SESSION['msg'] = '<div class="alert alert-success">
                       <button type="button" class="close" data-dismiss="alert">×</button>
                       <strong>Well done!</strong> You have Regesterd New Service Provider Succesfully :) 
                   </div>';
                    }
                }
                // header('location:emp.php');
            }
            if (isset($_POST['update'])) {
                $q = "UPDATE Users SET Username='" . $_POST['uname'] . "', Fname='" . $_POST['fname'] . "', Lname='" . $_POST['lname'] . "', Address='" . $_POST['add'] . "', Phone=" . $_POST['ph'] . ", Email='" . $_POST['mail'] . "', Role ='" . $_POST['role'] . "', Sex='" . $_POST['sex'] . "' WHERE idUsers=" . $_SESSION['edit'] . ";";
                mysqli_query($conn, $q) or die(mysqli_error($conn));
                $q = "UPDATE Employees SET Status='" . $_POST['sts'] . "' WHERE idUsers=" . $_SESSION['edit'] . ";";
                mysqli_query($conn, $q) or die(mysqli_error($conn));
            }

            ?>
            <!--/.container-->
            </div>
            <!--/.wrapper-->
            <?php include 'footers.php'; ?>