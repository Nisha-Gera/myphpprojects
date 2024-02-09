<?php
include("./database/database.php");;
$studentid = $_POST['id'];
// echo $studentid;
// die();

$sql = "DELETE FROM student where id = $studentid ";
// echo $sql;
// die();
$result = mysqli_query($conn, $sql);
// echo $result;

if($result){
    echo 1;
}
else{
    echo 0;
}
