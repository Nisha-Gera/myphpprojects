<?php

include '../database/database.php';
session_start();
$role_id = $_SESSION['role_id']; //gets role_id from login page

//stops user from directly accesing login page

if (empty($role_id)) {
  header("Location: ../login/login.php");
  die('ERR...you are not logged in!');
}


if(isset($_GET['deleteid'])){
  $delete_id = $_GET['deleteid'];

  $deletesql = " DELETE from student_data where s_id = $delete_id ";

  // echo $deletesql;

  $deleteresult = mysqli_query($conn,$deletesql);

  // print_r($deleteresult);
}

$email = $_SESSION["email"]; //gets the value of email

$query = "SELECT * FROM teacher_data where email = '$email' ";
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

    <!-- teacher's data -->

    <h1>Teacher Dashboard</h1>
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
            <?php echo $row['standard']; ?>
          </td>
          <td> <img src='<?php echo $row['picture']; ?>' height="100px" width="100px"> </td>

        </tr>
        <?php
        $_SESSION['tchstd'] = $row['standard'];   
  }
?>
    </tbody>
  </table>


  <?php
  $tchstd = $_SESSION['tchstd'];

  $querystu = "SELECT * FROM student_data where standard = '$tchstd' ";

  $resultstu = mysqli_query($conn, $querystu); ?>

  <!-- student's table -->
  <p>
    <a class="btn btn-secondary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false"
      aria-controls="collapseExample">
      See Student's Data
    </a>

  </p>
  <div class="collapse" id="collapseExample">
    <div class="card card-body">
      <!-- comment -->
      <table class="table table-dark table-striped">
        <thead>
          <h4>Student's Data</h4>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone_Number</th>
            <th scope="col">Hobbies</th>
            <th scope="col">Standard</th>
            <th scope="col">Picture</th>
            <th scope="col">Action</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>

          <tr>
            <?php
            while ($row = mysqli_fetch_assoc($resultstu)) {
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

              <td>
                <a href="../update/updateform.php?editid=<?php echo $row['s_id']?>" class="btn btn-warning" type="button">Edit</a>
                
              </td>
              <td>
                <a href="./tch_dashboard.php?deleteid=<?php echo $row['s_id']?>" class="btn btn-danger" type="button">Delete</a>
                
              </td>
              </td>
            </tr>
            <?php
            }
            ?>

        </tbody>

      </table>
    </div>
  </div>

</body>

</html>