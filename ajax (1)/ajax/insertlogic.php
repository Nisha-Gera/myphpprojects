<?php
include './database/database.php';
$name = $_POST['name'];
// echo $name;
$email = $_POST['email'];
// echo $email;
$address = $_POST['address'];
// echo $address;

$sql = "INSERT INTO student(name, email, address) VALUES('$name','$email','$address')";

$result = mysqli_query($conn, $sql);
if ($result) {
    echo 1;
} else {
    echo 0;
}
?>