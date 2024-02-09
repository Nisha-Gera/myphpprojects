<?php
include './database/database.php';

$query = "SELECT * from role where r_name != 'admin' ";
$result = mysqli_query($conn, $query);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"></script>

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
  <?php include './header.php'?>
  <div class="container">

    <div class="text">
      <h1>University website</h1>
      <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellat rerum deleniti similique minus quas
        voluptatibus debitis fuga non alias explicabo!</p>
    </div>


    <div class="registerblock">
      <div class="card center" style="width: 18rem;">
        <!-- <img src="..." class="card-img-top" alt="..."> -->
        <div class="card-body">
          <h5 class="card-title">Register here!</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
            content.</p>


          <form action="indexlogic.php" method="POST">

            <div class="form">
              <label for="register">New user? </label>
              <label for="role">Choose your Department:</label>
              <select name="role" id="role">
                <?php
while ($row = mysqli_fetch_array($result)) {

    ?>
                  <option value="<?php echo $row['r_id'] ?>">
                    <?php echo $row['r_name'] ?>
                  </option>
                  <?php
}
?>
              </select>

              <input type="submit" value="Register" name="submit">
              <div class="login">
                <label for="login">Already Registered? Login Instead</label>
                <div class="d-grid gap-2 col-6 mx-auto">
                  <button class="btn btn-secondary buttons" type="button"><a href="login/login.php">Login</a></button>
                </div>

              </div>

            </div>

          </form>
        </div>
      </div>
    </div>
  </div>


  </div>

  <?php include './footer.php'?>
</body>

</html>