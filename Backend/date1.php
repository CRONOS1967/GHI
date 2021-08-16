<?php
if (isset($_POST['date'])) {
    $u = $_POST['date'];
    # code...
    if ($u >= date("Y-m-d")) {
    
        echo 'Incorrect';
        echo "<script>$('#submit').prop('disabled', true);</script>";
    } else {
        echo 'Correct';
        echo "<script>$('#submit').prop('disabled', false);</script>";
    }
}
