<?php
session_start();
include '../database/database.php';
if (isset($_GET['editid'])) {
    $editid = $_GET['editid'];
    $_SESSION['editid'] = $editid;
    $sql = "SELECT * from student_data where s_id = '$editid' ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Register Form</title>

</head>

<body>
    <?php include '../header.php' ?>
    <div class="body">
        <div class="heading">
            <h1>Student Registration form </h1>
            <p>Enter details carefully</p>
        </div>
        <form action="updatelogic.php" method="POST" enctype="multipart/form-data">
            <div>
                <label for="picture">Enter your Picture:</label>
                <input type="file" name="uploadFile" value="<?php $row['picture'] ?>">
            </div>

            <div>
                <label for="name">Enter your Name:</label>
                <input type="text" name="name" value="<?php echo $row['name'] ?>">
            </div>

            <div>
                <label for="email">Enter your Email:</label>
                <input type="email" name="email" value="<?php echo $row['email'] ?>">
            </div>

            <div>
                <label for="password">Enter Password:</label>
                <input type="password" name="password" value="<?php echo $row['password'] ?>">
            </div>

            <div>
                <label for="number">Enter you Phone Number:</label>
                <input type="number" name="number" value="<?php echo $row['phone_no'] ?>">
            </div>

            <div>
                <label for="gender">Specify your Gender:</label>
                <input type="radio" name="gender" value=> Male
                <input type="radio" name="gender" value=> Female
                <input type="radio" name="gender" value=> Others
            </div>

            <div>
                <label for="hobbies">Hobbies</label>
                <input type="checkbox" name="hobbies[]" value=value="Singing"> Singing
                <input type="checkbox" name="hobbies[]" value=value="Dancing"> Dancing
                <input type="checkbox" name="hobbies[]" value=value="Cricket"> Cricket
                <input type="checkbox" name="hobbies[]" value=value="Yoga"> Yoga
            </div>

            <div class="standard">
                <label for="standard">Choose your standard:</label>
                <select name="standard" id="standard">
                    <option value="11th">11th</option>
                    <option value="12th">12th</option>
                </select>
            </div>

            <div>
                <input type="submit" name="update" id="update">
            </div>
        </form>
    </div>

</body>

</html>