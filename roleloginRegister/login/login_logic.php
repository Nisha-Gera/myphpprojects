<?php
session_start();
include '../database/database.php';

if (isset($_POST['submit'])) {

    // header ('Location: ../teacher/tch_dashboard ');

    $email = $_POST['email'];
    $password = $_POST['password'];

    $_SESSION["email"] = $email;
    $_SESSION["password"] = $password;

    $sql = "SELECT r_id from login where email = '$email' AND password = '$password' ";
    echo $sql;


    // if ($role == '1') {
    //     $sql = "SELECT * from admin_data where email = '$email' AND password = '$password' ";
    // }
    // elseif($role == '2'){
    //     $sql = "SELECT * from teacher_data where email = '$email' AND password = '$password' ";
    // }
    // elseif($role == '3'){
    //     $sql = "SELECT * from student_data where email = '$email' AND password = '$password' ";
    // }
    // else {
    //     echo 'error!';
    // }

    $result = mysqli_query($conn, $sql);
    print_r($result);
    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
            $_SESSION['role_id'] = $row['r_id'];

            // die();
            // $_SESSION["email"] = $row['email'];
            // $_SESSION["password"] = $row['password'];

            // echo "Session variables are set!";

            if ($row['r_id'] == '1') {
                header("Location:../admin/admin_dashboard.php");
            } elseif ($row['r_id'] == '2') {
                // print_r($_SESSION["email"] );
                header("Location:../teacher/tch_dashboard.php");
            } elseif ($row['r_id'] == '3') {
                header("Location:../student/stu_dashboard.php");
            }

        }

    } else {
        echo "error:" . mysqli_error($conn);
    }

    mysqli_close($conn);

}
