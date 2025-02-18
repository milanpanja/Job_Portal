<?php
session_start();
unset($_SESSION['USER_ID']);
    echo'<script>window.location.href ="user-login.php"</script>';
    exit();

?>
