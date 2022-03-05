<?php
include('../conn.php');
session_start();
mysqli_query($conn, "update userlog set logout=NOW() where userlogid='" . $_SESSION['userlog'] . "'");
session_destroy();
header('location:home.html');
