<?php
session_start();

session_destroy();
echo "<script>alert('Anda Logout');</script>";
echo "<script>location='index.php'</script>";
?>