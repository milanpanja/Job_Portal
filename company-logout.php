<?php
session_start();
unset($_SESSION['COMPANY_ID']);
    echo'<script>window.location.href ="company-login.php"</script>';
    exit();

?>
