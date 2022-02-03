<?php
$con=mysqli_connect("localhost","root","","b-pay");

if (mysqli_connect_errno()) {
    
    echo "Failed to connect to MySQL! Please contact the admin.";
    return;
}

?>