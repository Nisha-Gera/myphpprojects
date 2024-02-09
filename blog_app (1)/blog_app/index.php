<?php include './database/database.php';
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <style>
        .buttons {
            color: white;

        }

        .buttons a {
            text-decoration: none;
            color: white;
            font-weight: bold;
        }

        .text {
            text-align: center;
        }

        .container {
            margin: auto;
            width: 50%;
            /* border: 3px solid green; */
            padding: 10px;
        }

        .registerblock {
            margin: auto;
            width: 50%;

            padding: 10px;
        }
    </style>

</head>

<body>
    <?php include './navbar.php' ?>
    <div class="container">

        <div class="text">
            <h1>Blogging website</h1>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellat rerum deleniti similique minus quas
                voluptatibus debitis fuga non alias explicabo!</p>
        </div>


        <div class="registerblock">
            <div class="card center" style="width: 18rem;">
                <!-- <img src="..." class="card-img-top" alt="..."> -->
                <div class="card-body">
                    <h5 class="card-title">Register here!</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>

                    <form action="indexLogic.php" method="POST">

                        <div>
                            <label for="name">Enter your Name:</label>
                            <input type="text" name="name" id="" required minlength="3" maxlength="20"
                                placeholder="abc">
                        </div>

                        <div>
                            <label for="email">Enter your Email:</label>
                            <input type="email" name="email" id="" required placeholder="abc@gmail.com">
                        </div>

                        <div>
                            <label for="password">Enter Password:</label>
                            <input type="password" name="password" id="" required placeholder="*******">
                        </div>

                        <div>
                            <label for="number">Enter you Phone Number:</label>
                            <input type="tel" name="number" id="" placeholder="9999999999" pattern="[0-9]{10}"
                                maxlength="10" required>
                        </div>

                        <div>
                            <input type="submit" name="submit" id="submit">

                            <button> <a href="login/loginForm.php">Login</a> </button>
                        </div>
                    </form>



                </div>
            </div>
        </div>
    </div>


    </div>


</body>

</html>