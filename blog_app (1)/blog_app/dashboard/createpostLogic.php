<?php
session_start();
include '../database/database.php';

if (isset($_POST['submit'])) {
    
    $name  = $_POST['name'];
    $_SESSION['name']=$name;
    echo $name;
    // echo $email;

    $title = $_POST['title'];
    // echo $title;

    // print_r($_FILES["image"]);
    $filename = $_FILES["image"]["name"];

    // echo $filename;
    $tempname = $_FILES["image"]["tmp_name"];
    $folder = "../include/image/" . $filename;
    move_uploaded_file($tempname, $folder);

    $post = $_POST['post'];
    // echo $post;

    $sql = "INSERT INTO blog_data(posted_by,title,image,post)VALUES('$name','$title','$folder','$post')";
    // echo $sql;

    // $result = mysqli_query($conn,$sql);
    // echo $result;

    if (mysqli_query($conn, $sql)) {
        echo 'record successfully inserted!';
        header("Location: mypost.php ");
    }
} else {
    echo "error:" . mysqli_error($conn);
}
mysqli_close($conn);


?>