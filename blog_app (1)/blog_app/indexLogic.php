<?php
session_start();
include './database/database.php';

//after insert or update 
$_SESSION['status'] = "You have successfully Registered!";

if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    // echo $name;

    $email = $_POST['email'];
    // echo $email;

    $password = $_POST['password'];
    // echo $password;

    $number = $_POST['number'];
    // echo $number;

    $sql = "INSERT INTO register_data(name,email,password,number)VALUES('$name','$email','$password','$number')";
    // echo $sql;
    // $result = mysqli_query($conn,$sql);

    if (mysqli_query($conn, $sql)) {
        $success = 1;

        // header("Location: ../dashboard/dashboard.php?success=" . $success);

        echo 'record successfully inserted!';
        header("Location: ./login/loginForm.php?success=" . $success);

    }
} else {
    echo "error:" . mysqli_error($conn);
}
mysqli_close($conn);


?>