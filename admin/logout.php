<?php
include("system/config.inc.php");
session_unset();
header("location:login.php?msg=logout");
die();
?>