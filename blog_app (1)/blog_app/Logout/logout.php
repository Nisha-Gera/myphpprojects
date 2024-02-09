<?php
include '../database/database.php';

session_start();
session_unset();
session_destroy();

header("Location: ../login/loginForm.php")
?>