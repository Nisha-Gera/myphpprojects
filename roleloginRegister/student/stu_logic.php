<?php
session_start();
include '../database/database.php';

$role = $_SESSION['role'] ;

if(isset($_POST['submit'])){   
    $file = $_POST['file'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $number = $_POST['number'];
    $gender = $_POST['gender'];
    $hobbies = $_POST['hobbies'];
    $standard = $_POST['standard'];
    $hobby = " ";
    foreach($hobbies as $eachhobby){
        $hobby.= $eachhobby.',';
    }
    print_r($_FILES['uploadFile']);
    $filename = $_FILES["uploadFile"]["name"];
    $tempname = $_FILES["uploadFile"]["tmp_name"];
    $folder = "../include/images/".$filename;
    print_r($filename);
    print_r ($folder);
    move_uploaded_file($tempname,$folder);

    $sql = "INSERT INTO student_data(picture,name,email,password,phone_no,gender,hobbies,standard,r_id) VALUES('$folder','$name','$email','$password','$number','$gender','$hobby','$standard','$role') ";

    $sql1 = "INSERT INTO login(r_id, email, password)
    VALUES($role,'$email','$password')";


    if(mysqli_multi_query($conn,$sql)){
        if(mysqli_query($conn,$sql1)){
        echo 'record successfully inserted!';
        header("Location: ../login/login.php ");
    
        }
        else {
            echo "error:".mysqli_error($conn);;
        }
        mysqli_close($conn);

    }}
    ?>