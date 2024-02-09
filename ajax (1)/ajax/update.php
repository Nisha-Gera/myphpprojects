<?php
include './database/database.php';

$id = $_POST['id'];
// echo $id;

$name = $_POST['name'];
// echo $name;

$email = $_POST['email'];
// echo $email;

$address = $_POST['address'];
// echo $address;

$sql = "UPDATE student SET name='$name', email ='$email', address= '$address' where id ='$id' ";

$result = mysqli_query($conn, $sql);

if ($result) {
    echo 1;
} else {
    echo 0;
}
?>