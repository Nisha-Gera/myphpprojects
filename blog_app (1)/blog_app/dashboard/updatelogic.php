<?php
include '../database/database.php';

$id = $_POST['post_id'];
echo $id;
// id: post_id,
                       
$title = $_POST['title'];
echo $title;
$image = $_POST['image'];
echo $image;
$post = $_POST['post'];
echo $post;
// delete data query
$query="UPDATE blog_data SET title = '$title', image ='$image' , post = '$post' WHERE post_id='$id' ";
echo $query;
$result= mysqli_query($conn,$query);
// print_r($result);

    if($result){
      // header("Location: mypost.php");
      echo 1;
    }else{
      echo 0;
    }

