<?php
session_start();
include '../database/database.php';

$email = $_SESSION['email'];

if (empty($email)) {
    header("Location: ../login/loginForm.php");
    //   die('ERR...you are not logged in!');
}

$sql = "select name from register_data where email = '$email' ";
$result = mysqli_query($conn, $sql);

while ($row = (mysqli_fetch_array($result))) {
    $name = $row['name'];
}

// $_SESSION['name'] = $name;
// echo $name;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function () {
            $("#submit").click(function () {
                alert("Post created succesfully.");
            });
        });
    </script>
</head>

<body>
    <form action="createpostLogic.php" method="POST" enctype="multipart/form-data">
        <h4>Create Your Blog Post</h4>


        <input type="hidden" value="<?php echo $name ?>" name="name">

        <div><label for="">Enter Your Title:</label>
            <input type="text" name="title" id="title" placeholder="Enter here">
        </div>

        <div>
            <label for="picture">Enter Image (if any):</label>
            <input type="file" name="image" id="">
        </div>

        <div>
            <label for="">Enter you Content here:</label> <br>
            <textarea name="post" id="" cols="30" rows="20" type="text"></textarea>
        </div>

        <div>
            <input type="submit" value="Submit" name="submit" id="submit">
        </div>

    </form>

</body>

</html>