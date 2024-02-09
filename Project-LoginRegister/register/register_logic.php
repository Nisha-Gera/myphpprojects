<?php
include '../database/database.php';

if (isset($_POST['submit'])) {

    $file = $_POST['file'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $number = $_POST['number'];
    $gender = $_POST['gender'];
    $hobbies = $_POST['hobbies'];
    $hobby = " ";
    foreach ($hobbies as $eachhobby) {
        $hobby .= $eachhobby . ',';
    }
    $department = $_POST['dept'];
    $standard = $_POST['standard'];
    $remark = $_POST['remark'];

    print_r($_FILES['uploadFile']);
    $filename = $_FILES["uploadFile"]["name"];
    $tempname = $_FILES["uploadFile"]["tmp_name"];
    $folder = "../fileupload/images/" . $filename;
    // print_r($filename);
    // print_r ($folder);
    move_uploaded_file($tempname, $folder);

    //   Project-LoginRegister/fileupload/images

    $sql = "INSERT INTO registration_data(fname,lname,email,number,gender,hobbies,dept,standard,remark,password,image) VALUES('$fname','$lname','$email','$number','$gender','$hobby','$department','$standard','$remark','$password','$folder') ";

    $sql1 = "INSERT INTO login_data(email, PASSWORD) Values ('$email','$password')";


    if (mysqli_query($conn, $sql)) {
        if (mysqli_query($conn, $sql1))
            echo 'record successfully inserted!';
        echo "<img src='$folder' height='300px' ?>";
        header("Location: ../login/login.php");
    } else {
        echo "error:" . mysqli_error($conn);
        ;
    }
    mysqli_close($conn);

}


?>