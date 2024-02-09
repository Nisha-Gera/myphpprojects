<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
        button a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        button a:hover {
            color: white;
        }
    </style>
</head>

<body>
    <?php
    session_start();
    include '../database/database.php';

    $email = $_SESSION['email'];

    if (empty($email)) {
        header("Location: ../login/loginForm.php");
        //   die('ERR...you are not logged in!');
    }

    // $success = $_SESSION['status'];
// echo $success;
    
    if (isset($_SESSION['status'])) {

        echo '   <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Hey !</strong> 
            ' . $_SESSION['status'] . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';

        unset($_SESSION['status']);
    }
    ?>

    <?php
    include './dnav.php';
    ?>

    <h1>welcome to the dashboard</h1>
    <button type="button" class="btn btn-primary">
        <a href="createPost.php">Create Post</a>
    </button>
</body>

</html>