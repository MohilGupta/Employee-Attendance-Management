<?php
session_start();
unset($_SESSION['userLoggedIn']);
unset($_SESSION['organisationId']);
header("Location:index.php");
?>