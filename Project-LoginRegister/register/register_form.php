<?php
include '../database/database.php';

$queryDepart = "SELECT * FROM dept";
$queryStandard = "SELECT * FROM standard";
$resultDepart = mysqli_query($conn, $queryDepart);
$resultStandard = mysqli_query($conn, $queryStandard);

// print_r($result );
// // $row = mysqli_fetch_assoc($result);
// while ($row = mysqli_fetch_assoc($result)) {
// // print_r($row);
// // echo '-----------------------------------------------------';
// foreach($row as $key) {
//     // print_r($key);
//     var_dump($key);
//     // foreach($key as $k1 => $v1) {
//         // print_r($v1);
//     // echo "key = ".$k1.", value =".$v1."";

//     // }
// }
// }


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

</head>

<body>

    <div class="body">
        <div class="heading">
            <h1>Registration form </h1>
        </div>
        <form action="register_logic.php" method="POST" enctype="multipart/form-data">
            <div>
                <label for="picture">Enter your Picture:</label>
                <input type="file" name="uploadFile" id="">
            </div> 

            <div>
                <label for="fname">Enter your First Name:</label>
                <input type="text" name="fname" id="">
            </div>

            <div>
                <label for="lname">Enter your Last Name:</label>
                <input type="text" name="lname" id="">
            </div>

            <div>
                <label for="email">Enter your Email:</label>
                <input type="email" name="email" id="">
            </div>

            <div>
                <label for="password">Enter Password:</label>
                <input type="text" name="password" id="">
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

            
            <div>
            <label for="department">Choose your Department:</label>
            <select name="department" id="department">
                <?php
                while ($row=mysqli_fetch_array ($resultDepart)) {  
                ?>
                <option value="<?php echo $row['dept_id']?>"><?php echo $row['dept_name']?></option>
                <?php
                }
                ?> 
            </select><br><br> 
        </div>

            <div>
                <label for="standard">Select your standard:</label>
                <select name="standard" id="standard">
                <?php
                while ($row=mysqli_fetch_array ($resultStandard)) {  
                ?>
                <option value="<?php echo $row['st_id']?>"><?php echo $row['st_name']?></option> 
                <?php
                }
                ?>  

                </select>
            </div>

            <div>
                <label for="remark">Enter your Remark:</label> <br>
                <textarea name="remark" id="" cols="30" rows="5"></textarea>
            </div>

            <div>
                <input type="submit" name="submit" id="submit">
            </div>
        </form>
    </div>

</body>

</html>