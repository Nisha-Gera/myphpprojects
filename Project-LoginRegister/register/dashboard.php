<?php 
session_start();
$email   = $_SESSION["email"];
print_r($email);
 
// $password = $_SESSION["password"];
// print_r($password);

include '../database/database.php';

$query ="SELECT * FROM registration_data where email = '$email' ";
$result = mysqli_query($conn,$query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<button> <a href="../logout/logout.php"> Logout</a> </button>
<h1>data</h1>
<table>

<tr>
<td>Id</td>
<td>Fname</td>
<td>Lname</td>
<td>Email</td>    
<td>image</td>
</tr>
 
<tr>

    <?php

    while($row = mysqli_fetch_assoc($result))
    {
        ?>
    <td> <?php echo $row['id'] ?> </td>
    <td> <?php echo $row['fname']?></td>
    <td> <?php echo $row['lname']?></td>
    <td> <?php echo $row['email']?></td>
    <td> <img src='<?php echo $row['image']; ?>'height="100px" width="100px"> </td>
    <td>  </td>
    </tr>
<?php
}
    ?>


</table>
</body>
</html>

<!-- 

include '../database/database.php';

$sql = "SELECT * FROM REGISTRATION_DATA";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["id"]. " - Name: " . $row["fname"]. " " . $row["lname"]. "<br>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?-->