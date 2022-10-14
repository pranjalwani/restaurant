<?php
date_default_timezone_set('Asia/Kolkata');
$con=mysqli_connect("localhost","root","","hotel");
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
?>