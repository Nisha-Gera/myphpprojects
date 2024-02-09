<?php
session_start();
include '../database/database.php';
// $email = $_SESSION['email'];

if(isset($_POST['submit'])){
    $post_id = $_POST['post_id'];
    echo $post_id;
    $comment_by = $_SESSION['name'];
    echo $comment_by;
    $comment  = $_POST['comment'];
    echo $comment;

    // die();

    $sql = "INSERT INTO comment_data(Post_id,comment,comment_by
    )VALUES('$post_id','$comment','$comment_by')";

    // $result = mysqli_query($conn,$sql);

    if (mysqli_query($conn, $sql)) {
        echo 'comment successfully inserted!';
    header("Location: allPost.php ");
    }
    } else {
        echo "error:" . mysqli_error($conn);
    }
    mysqli_close($conn);


 ?>

