<?php
session_start();
include '../database/database.php';

    //after insert or update 
$_SESSION['status'] = "You have successfully logged in!";

if (isset($_POST['submit'])) {

  $email = $_POST['email'];
  $password = $_POST['password'];

  $_SESSION['email'] = $email;

  $sql = "SELECT * from register_data where email = '$email' AND password = '$password' ";

  $result = mysqli_query($conn, $sql);

  ?>
  <?php
  while ($row = mysqli_fetch_assoc($result)) {
    ?>

    <input type="hidden" name="name" value="<?php echo $row['name'];
    $_SESSION['name'] = $row['name'] ?>">
  <?php } ?>

  <?php

  if (mysqli_num_rows(mysqli_query($conn, $sql)) > 0) {

   header("Location: ../dashboard/dashboard.php");

  } else {
    echo "error:" . mysqli_error($conn);
  }

  mysqli_close($conn);

}
?>
<!--  -->