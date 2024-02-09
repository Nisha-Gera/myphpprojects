<?php
include '../database/database.php';

session_start();

if(isset($_POST['submit'])){

    $email   = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * from registration_data where email = '$email' AND password = '$password' ";

    $result= mysqli_query($conn,$sql);
   
    if(mysqli_num_rows(mysqli_query($conn,$sql))>0){
      
        // echo 'login successful!';

        while($row = mysqli_fetch_assoc($result))

        // Set session variables
        $_SESSION["email"] = $row['email'];
        $_SESSION["password"] = $row['password'];
       
        echo "Session variables are set!";

        header("Location: ../register/dashboard.php");

        }
        else {
            echo "error:".mysqli_error($conn);;
        }
    mysqli_close($conn);

    }
 ?>

