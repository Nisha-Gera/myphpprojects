<?php

session_start();
$role_id = $_SESSION['role_id'];

if (empty($role_id)) {
    header("Location: ../login/login.php");
    die('ERR...you are not logged in!');
}

$email = $_SESSION["email"];

// echo $email;

// $password = $_SESSION["password"];
// print_r($password);

include '../database/database.php';
$query = "SELECT * FROM student_data where email = '$email' ";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {

    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <style>
        a {
            text-decoration: none;

        }

        button {
            border-radius: 15px;
            float: right;
        }

        h1 {
            text-align: center;
        }
    </style>

    <body>
        <?php include '../header.php' ?>
        <button>
            <a href="../logout/logout.php">Logout</a>
        </button>
        <h1>Student Dashboard</h1>

        <h4>Hello
            <?php echo $row['name'] ?>, Here's Your Data!
        </h4>

        <table class="table table-dark table-striped">

            <thead>
                <tr>

                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone_Number</th>
                    <th scope="col">Hobbies</th>
                    <th scope="col">Standard</th>
                    <th scope="col">Picture</th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <?php

                    ?>

                    <td>
                        <?php echo $row['name'] ?>
                    </td>
                    <td>
                        <?php echo $row['email'] ?>
                    </td>
                    <td>
                        <?php echo $row['phone_no'] ?>
                    </td>

                    <td>
                        <?php echo $row['hobbies'] ?>
                    </td>
                    <td>
                        <?php echo $row['standard'] ?>
                    </td>
                    <td> <img src='<?php echo $row['picture']; ?>' height="100px" width="100px"> </td>
                </tr>
                <?php
                $_SESSION['sname'] = $row['name'];
                 //  echo $_SESSION['sname'];
}
?>

        </tbody>

    </table>



</body>

</html>