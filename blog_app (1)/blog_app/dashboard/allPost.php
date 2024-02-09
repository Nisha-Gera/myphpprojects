<?php
session_start();
include '../database/database.php';

$email = $_SESSION['email'];

if (empty($email)) {
  header("Location: ../login/loginForm.php");
//   die('ERR...you are not logged in!');
}


$sql = "SELECT * FROM blog_data order by Post_id Desc";
$result = mysqli_query($conn, $sql);

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

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>


    <style>
        h1 {
            text-align: center;
        }
    </style>
    <script>
        $(document).ready(function () {
            $("#toggle").click(function () {
                $(".comment").toggle();
            });

        });
    </script>
</head>

<body>
    <?php include 'dnav.php' ?>
    <div class="container">
        <div class="heading">
            <h1>All Post here!</h1>
        </div>

        <?php while ($row = mysqli_fetch_array($result)) { ?>
            <div class="card" style="width: 30rem;">
                <img src="<?php echo $row['image'] ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">
                        <?php echo $row['title']; ?>
                    </h5>
                    <p class="card-text">
                        <label for="name">Posted by:
                            <?php echo $row['posted_by'] ?>
                        </label>
                    </p>
                    <p class="card-text">
                        <?php echo $row['post'] ?>
                    </p>

                    <p class="card-text">
                        <label for=""> All Comments :</label>
                        <?php
                        $id = $row['post_id'];
                        $sqlcomment = "SELECT * from comment_data where Post_id = '$id' ";
                        $commentquery = mysqli_query($conn, $sqlcomment);

                        while ($comment = mysqli_fetch_array($commentquery)) {
                            ?>
                            <?php echo $comment['comment']; ?>
                            <label for="">, Commented by</label>
                            <?php echo $comment['comment_by']; ?>
                        </p>

                    <?php } ?>
                    <form action="comment.php" method="POST">
                        <input type="hidden" name="post_id" id="" value=<?php echo $row['post_id'] ?>>
                        <label for="text">Liked blog? Comment here!</label>
                        <input type="text" name="comment" id="">
                        <input type="submit" name="submit" id="submit">
                    </form>

                </div>
            </div>
            <br>
            <?php
        // $_SESSION['title'] =$row['title'] ;
    }
    ?>
    </div>

</body>

</html>

<!--  <div class="container">
            <div class="heading">
        <h1>All Post here!</h1>
    </div>
    <!-- <button>
                    <a class="btn btn-primary" id="toggle">Comment here</a></button>
                <div class="comment">
                    <input type="text" name="comment" id="">
                    <input type="submit" value="comment">
                </div> -->


<?php while ($row = mysqli_fetch_array($result)) { ?>
    <div class="card" style="width: 30rem;">
        <img src="<?php echo $row['image'] ?>" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">
                <?php echo $row['title']; ?>
            </h5>
            <p class="card-text">
                <?php echo $row['post'] ?>
            </p>


            <p class="card-text">
                All Comments :
                <?php
                while ($comment = mysqli_fetch_array($commentquery)) {
                    ?>
                    <?php echo $comment['comment']; ?>
                </p>
            <?php } ?>
            <form action="comment.php" method="POST">
                <label for="email">Liked blog? Comment here!</label>
                <input type="text" name="comment" id="">
                <input type="submit" name="submit" id="submit">
            </form>

        </div>
    </div>
    <br>
    <?php
        // $_SESSION['title'] =$row['title'] ;
    }
    ?>
</div> -->

<!-- <a class="btn btn-primary" id="toggle" >Comment here</a>
            <div class="comment">
                <input type="text" name="comment" id="">
                 <input type="submit"> <a href="comment.php"> Comment</a>
            </div>
            <br> -->