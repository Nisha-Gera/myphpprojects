
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<style>
    .card {
        margin: auto;
        width: 50%;
        border: 3px solid grey;
        padding: 10px;
        margin-top: 70px;
    }
</style>

<body>
<?php
session_start();
include '../database/database.php';


if(isset($_SESSION['status']))
{
   
    echo'   <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Hey !</strong> 
            '.$_SESSION['status'].'
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
   
    unset($_SESSION['status']);
}

?>

    <?php include '../navbar.php' ?>

    <div class="container">

        <div class="card" style="width: 18rem;">

            <div class="card-body">
                <div class="heading">
                    <h1>Login Form</h1>
                    <p>Enter your details here</p>
                </div>
                <form action="loginlogic.php" method="POST">

                    <div class="loginfields">
                        <label for="email">Enter your Email:</label>
                        <input type="email" name="email" id="">
                    </div>

                    <div class="loginfields">
                        <label for="password">Enter your Password:</label>
                        <input type="password" name="password" id="">
                    </div>

                    <br>

                    <div class="loginfields" id="btn">
                        <input type="submit" name="submit" id="submit">
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>

</html>