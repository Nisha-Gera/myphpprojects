<?php
include '../database/database.php';
// if (isset()){

// }

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
        <form action="stu_logic.php" method="POST" enctype="multipart/form-data">
            <div>
                <label for="picture">Enter your Picture:</label>
                <input type="file" name="uploadFile" id="">
            </div>

            <div>
                <label for="name">Enter your Name:</label>
                <input type="text" name="name" id="">
            </div>

            <div>
                <label for="email">Enter your Email:</label>
                <input type="email" name="email" id="">
            </div>

            <div>
                <label for="password">Enter Password:</label>
                <input type="password" name="password" id="">
            </div>

            <div>
                <label for="number">Enter you Phone Number:</label>
                <input type="number" name="number" id="">
            </div>

            <div>
                <label for="gender">Specify your Gender:</label>
                <input type="radio" name="gender" id="" value="Male"> Male
                <input type="radio" name="gender" id="" value="Female"> Female
                <input type="radio" name="gender" id="" value="others"> Others
            </div>

            <div>
                <label for="hobbies">Hobbies</label>
                <input type="checkbox" name="hobbies[]" id="" value="Singing"> Singing
                <input type="checkbox" name="hobbies[]" id="" value="Dancing"> Dancing
                <input type="checkbox" name="hobbies[]" id="" value="Cricket"> Cricket
                <input type="checkbox" name="hobbies[]" id="" value="Yoga"> Yoga
            </div>

            <div class="standard">
                <label for="standard">Choose your standard:</label>
                <select name="standard" id="standard">
                    <option value="11th">11th</option>
                    <option value="12th">12th</option>
                </select>
            </div>

            <div>
                <input type="submit" name="submit" id="submit">
            </div>
        </form>
    </div>

</body>

</html>