<?php
if (isset($_POST['date'])) {
    $u = $_POST['date'];
    # code...
    if ($u >= date("Y-m-d")) {
        echo 'Correct';
        echo "<script>$('#submit').prop('disabled', false);</script>";
        echo "<script>$('#sd').css('border-bottom', '2px solid green')</script>";
        echo "<script>$('#sh').css('color', '2px solid #34F458')</script>";
    } else {
        echo 'Incorrect';
        echo "<script>$('#sd').css('border-bottom', '2px solid #F90A0A')</script>";
        echo "<script>$('#sh').css('color', '2px solid #F90A0A')</script>";
        echo "<script>$('#submit').prop('disabled', true);</script>";
    }
}
