<?php
session_start();

include '../database/database.php';
$editid= $_SESSION['editid'];

   echo $editid;
if(isset($_POST['update'])){   
 
    // $file = $_POST['file'];
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
    // print_r($_FILES['uploadFile']);
    $filename = $_FILES["uploadFile"]["name"];
    $tempname = $_FILES["uploadFile"]["tmp_name"];
    $folder = "../include/images/".$filename;
    // print_r($filename);
    // print_r ($folder);
    move_uploaded_file($tempname,$folder);

    $sql = "UPDATE student_data set picture='$folder',name='$name',email='$email',password='$password',phone_no = '$number',gender = '$gender',hobbies = '$hobby',standard = '$standard' where s_id = '$editid' ";
 

       if(mysqli_query($conn,$sql))
        
        {
        echo 'record successfully inserted!';
        header("Location: ../teacher/tch_dashboard.php");
          
        }
        else {
            echo "error:".mysqli_error($conn);;
        }
        mysqli_close($conn);

    }


    ?>