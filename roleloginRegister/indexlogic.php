<?php
require_once "./database/database.php";
session_start();

if(isset($_POST['submit'])){
   $role = $_POST['role'];
   $_SESSION['role'] = $role;

    if($_SESSION['role'] == '2'){
        
        header("Location:./teacher/teacher_register.php " );

    }
    elseif($_SESSION['role'] == '3'){
    header("Location: ./student/student_register.php ");

    }
   
echo "done";
}
