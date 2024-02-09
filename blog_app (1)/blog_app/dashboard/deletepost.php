<?php
include '../database/database.php';

$id = $_GET['post_id'];
// echo $id;
// delete data query
$query="DELETE from blog_data WHERE post_id=$id ";
// echo $query;
$result= mysqli_query($conn,$query);
// print_r($result);

    if($result){
      header("Location: mypost.php");
    }else{
      echo 0;
    }
?>