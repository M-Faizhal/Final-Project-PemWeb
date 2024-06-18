<?php
session_start();

if (isset($_GET['confirm']) && $_GET['confirm'] == 'yes') {
    session_destroy();
    echo "<script>location='index.php'</script>";
} else {
    echo "<script>
    if (confirm('Apakah anda yakin untuk logout?')) {
        location.href='?confirm=yes';
    } else {
        location.href='index.php';
    }
    </script>";
}
?>