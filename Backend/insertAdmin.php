<?php
            include 'Backend.php';
            $cobj = new Backend;
            $conn = $cobj->connection();
            $data = array();
            if (isset($_POST['submit'])) {
                $data[0] = null;
                $data[1] = $_POST['uname'];
                $data[2] = $_POST['fname'];
                $data[3] = $_POST['lname'];
                $data[4] = $_POST['add'];
                $data[5] = $_POST['ph'];
                $data[6] = $_POST['mail'];
                $data[7] = 'admin';
                $data[8] = $_POST['sex'];
                $data[9] = password_hash($_POST['uname'], PASSWORD_DEFAULT);
                $cobj->setAttrs($conn,'Users',$data);
                $q = $cobj->insert();
                $data1=array();
                $data1[0]="E".$q;
                $data1[1]= $q;
                $data1[2]="active";
                $cobj->setAttrs($conn,'Employees',$data1);
                $cobj->insert();
                header("location:http://" . $_SERVER['HTTP_HOST'] . "/GHI/admin/emp.php?q='succuss'");
            }

            ?>