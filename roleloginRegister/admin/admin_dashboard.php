<?php
session_start();
include '../database/database.php';
$role_id = $_SESSION['role_id'];

if (empty($role_id)) {
  header('Location: ../login/login.php');
  die('ERR...you are not logged in!');
}

$email = $_SESSION["email"];
// echo $email;

$query = "SELECT * FROM admin_data where email = '$email' ";
// echo $query;
$result = mysqli_query($conn, $query);

$querytch = "SELECT * FROM teacher_data";
$resulttch = mysqli_query($conn, $querytch);

$querystu = "SELECT * FROM student_data";
$resultstu = mysqli_query($conn, $querystu);


if(isset($_GET['deleteid'])){
  $delete_id = $_GET['deleteid'];
  echo $delete_id;

  $deletesql = " DELETE from student_data where s_id = $delete_id ";

  echo $deletesql;

  $deleteresult = mysqli_query($conn,$deletesql);

  print_r($deleteresult);
}
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
      border-radius: 5px;
      float: right;
    }

    h1 {
      text-align: center;
    }
  </style>

  <body>

    <?php
    include '../header.php' ?>

    <button>
      <a href="../logout/logout.php">Logout</a>
    </button>
<!-- admin table -->
    <h1>Admin Dashboard</h1>
    <h4>Hello
      <?php echo $row['name'] ?>, Here's Your Data!
    </h4>


    <table class="table table-dark table-striped">
      <thead>

        <tr>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Phone_Number</th>
          <th scope="col">Address</th>
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
            <?php echo $row['address'] ?>
          </td>
        </tr>
        <?php
        // echo $row['name'];
        $_SESSION['username'] = $row['name'];
}
?>
    </tbody>
  </table>

  <!-- teacher's table -->
  <p>
    <a class="btn btn-secondary" data-bs-toggle="collapse" href="#multiCollapseExample1" role="button"
      aria-expanded="false" aria-controls="multiCollapseExample1">See Teacher's Data</a>
    <button class="btn btn-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample2"
      aria-expanded="false" aria-controls="multiCollapseExample2">See Students's Data</button>
    <button class="btn btn-secondary" type="button" data-bs-toggle="collapse" data-bs-target=".multi-collapse"
      aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2">Close both</button>
  </p>
  <div class="row">
    <div class="col">
      <div class="collapse multi-collapse" id="multiCollapseExample1">
        <div class="card card-body">
          <!-- comment -->
          <table class="table table-dark table-striped">
            <thead>
              <h4>Teacher's Data</h4>
              <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone_Number</th>
                <th scope="col">Hobbies</th>
                <th scope="col">Picture</th>
                <th scope="col">Standard</th>
                <th scope="col">Action</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>

              <tr>
                <?php
                while ($row = mysqli_fetch_assoc($resulttch)) {
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
                    <?php echo $row['standard']; ?>
                  </td>

                  <td> <img src='<?php echo $row['picture']; ?>' height="100px" width="100px"> </td>
                  <td>
                <a href="./admin_dashboard.php?editid=<?php echo $row['t_id']?>" class="btn btn-warning" type="button">Edit</a>
                
              </td>
              <td>
                <a href="./admin_dashboard.php?deleteid=<?php echo $row['t_id']?>" class="btn btn-danger" type="button">Delete</a>
                
              </td>
                </tr>
                <?php
                }
                ?>

            </tbody>

          </table>
        </div>
      </div>
    </div>

<!-- student's table -->
    
    <div class="col">
      <div class="collapse multi-collapse" id="multiCollapseExample2">
        <div class="card card-body">
          <!-- comment -->
          <table class="table table-dark table-striped">
            <thead>
              <h4>Student Data</h4>
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
                <a href="./admin_dashboard.php?editid=<?php echo $row['s_id']?>" class="btn btn-warning" type="button">Edit</a>
                
              </td>
              <td>
                <a href="./admin_dashboard.php?deleteid=<?php echo $row['s_id']?>" class="btn btn-danger" type="button">Delete</a>
                
              </td>
                </tr>
                <?php
                }
                ?>

            </tbody>

          </table>
        </div>
      </div>
    </div>
  </div>


</body>

</html>