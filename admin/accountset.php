            <!-- /navbar-inner -->
            <?php include 'navbar.php';
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
                                    <h3>Account Settings</h3>
                                </div>
                                <div class="module-body">
                                   
                                    <fieldset class="row-fluid form-horizontal row-fluid">
                                        <legend>Personal Info</legend>
                                        <div class=" span5">
                                            <label class="control-label" for="First Name">First Name</label>
                                            <div class="controls">
                                                <input type="text" readonly required value="<?php echo $retVal = (isset($result['Fname'])) ? $result['Fname'] : null; ?>" id="FirstName" name="fname" placeholder="Please Enter First Name">
                                                <span class="help-inline"></span>
                                            </div>
                                        </div>
                                        <div class="span5">
                                            <label class="control-label" for="Last Name">Last Name</label>
                                            <div class="controls">
                                                <input type="text" id="Last Name" value="<?php echo $retVal = (isset($result['Lname'])) ? $result['Lname'] : null; ?>" readonly required name="lname" placeholder="Please Enter Last Name">
                                                <span class="help-inline"></span>
                                            </div>
                                        </div>
                                        <div class="span5">
                                            <label class="control-label" for="Last Name">Gender</label>
                                            <div class="controls">
                                                <input type="text" id="Gender" readonly value="<?php echo $retVal = (isset($result['Sex'])) ? $result['Sex'] : null; ?>" required name="sex" placeholder="Gender">
                                                <span class="help-inline"></span>
                                            </div>
                                        </div>
                                        <div class="span5">
                                            <div class="controls">
                                                <form id="imgs" action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="return false">
                                                    <input class="offset5" type="file" name="img" id="">
                                                    <button type="submit" class="offset9 btn btn-mini" onclick="upload()">upload</button>
                                                </form>
                                                <img src="../uploads/<?php echo $retVal = (isset($result['pic'])) ? $result['pic'] : null; ?>" class="nav-avatar" />
                                            </div>
                                        </div>
                                    </fieldset>
                                    <form class="form-horizontal row-fluid" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                        <fieldset class="row-fluid">
                                            <legend>Sign In Info</legend>
                                            <?php
                                            if (isset($_POST['changepass'])) :
                                                $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
                                                $q = "update Users set Pass='$pass' where idUsers=" . $result['idUsers'] . ";";
                                                mysqli_query($conn, $q) or die(mysqli_error($conn));
                                            ?>
                                                <div class="alert alert-success">
                                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                                    <strong>Well done!</strong> You Have Changed Your Password :)
                                                </div>
                                            <?php
                                            endif;
                                            ?>
                                            <div class="row span10">
                                                <div class="span1">
                                                    <label class="control-label" for="NewPassword">New Password</label>
                                                    <div class="controls">
                                                        <input type="password" id="NewPassword" required placeholder="Please Enter Password">
                                                        <span class="help-inline"></span>
                                                    </div>
                                                    <div class="span">
                                                        <label class="control-label" for="Password">Confirm Password</label>
                                                        <div class="controls">
                                                            <input type="password" id="Password" onkeyup="validate()" name="pass" required placeholder="Please Enter Password">
                                                            <span class="help-inline" id="help"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" name="changepass" id="pass" class="offset9 btn btn-large">Change Password</button>
                                        </fieldset>
                                    </form>
                                    <!-- <form class="form-horizontal row-fluid" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                        <fieldset class="row-fluid">
                                            <legend>Contact Info</legend>
                                            <div class="span5">
                                                <label class="control-label" for="Address">Address</label>
                                                <div class="controls">
                                                    <input type="text" id="Address" value="<?php echo $retVal = (isset($result['Address'])) ? $result['Address'] : null; ?>" required name="add" placeholder="Please Enter Address">
                                                    <span class="help-inline"></span>
                                                </div>
                                            </div>
                                            <div class="span6">
                                                <label class="control-label" for="Email">Email</label>
                                                <div class="controls">
                                                    <input type="email" id="Email" onkeyup="valmail()" name="mail" value="<?php echo $retVal = (isset($result['Email'])) ? $result['Email'] : null; ?>" required placeholder="Please Enter Email">
                                                    <span class="help-inline" id="res"></span>
                                                </div>
                                            </div>
                                            <div class="span6">
                                                <label class="control-label" for="Phone Number">Phone Number</label>
                                                <div class="controls">
                                                    <input type="number" id="Phone Number" min="99999999" max="999999999" value="<?php echo $retVal = (isset($result['Phone'])) ? $result['Phone'] : null; ?>" name="ph" required placeholder="Please Enter Phone Number">
                                                    <span class="help-inline"></span>
                                                </div>
                                            </div>
                                            <button type="submit" name="submit" id="submit" class="offset9 btn btn-large">Change Info</button>
                                        </fieldset>
                                    </form> -->
                                </div>
                            </div>
                        </div>
                        <!--/.content-->
                    </div>
                    <!--/.span9-->
                </div>
            </div>


            <script>
                function upload() {
                    fetch('../Backend/upload.php',{
                        method:"POST",
                        body: new FormData(document.getElementById('imgs'))
                    })
                }

                function validate() {
                    var n = document.getElementById('NewPassword').value;
                    var nn = document.getElementById('Password').value;
                    if (n == nn) {
                        $('#pass').prop('disabled', false);
                        document.getElementById('help').innerHTML = 'Match';
                    } else {
                        $('#pass').prop('disabled', true);
                        document.getElementById('help').innerHTML = 'no Match';
                    }
                }
            </script>
            <!--/.container-->
            </div>

            <!--/.wrapper-->
            <?php include 'footers.php'; ?>