<?php
require_once('includes/session.php');
session_destroy();
header("Location:lev3/index.php?message=You have logged out.");
?>

