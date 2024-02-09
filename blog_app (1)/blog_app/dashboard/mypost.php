<?php
session_start();
include '../database/database.php';

$name = $_SESSION['name'];
// echo $name;

$email = $_SESSION['email'];

if (empty($email)) {
    header("Location: ../login/loginForm.php");
    //   die('ERR...you are not logged in!');
}

$sql = "SELECT * FROM blog_data where posted_by ='$name' ";
// echo $sql;
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

    <script>
        $(document).ready(function () {

            //update data
            $(document).on("click", ".editbtn", function () {
                $("#modal").show();

                var id = $(this).data("eid"); //student id 
                alert(id);

                console.log('aa ja re');
                
                $.ajax({
                    url:"loadupdate.php",
                    type:"POST",
                    data:{id:id},
                    success:function(data){
                    // console.log("ajax function called");
                    //  console.log(data);
                            $("#modal_form table").html(data);

                    }
                });

                // $(document).on("click", "#editsubmit", function(e) {

                //     function loadTable() {
                //     $.ajax({
                //         url: "showlogic.php",
                //         type: "POST",
                //         success: function(data) {
                //             $("#tableData").html(data);
                //         }
                //     });
                // }
                // loadTable();

                // e.preventDefault();
                var post_id = $("#id").val(); //student id 
                console.log(id);

                var title = $("#edittitle").val();
                console.log(title);

                var image = $("#editimage").val();
                console.log(image);

                var post = $("#editpost").val();
                console.log(post);

                $.ajax({
                    url: "updatelogic.php",
                    type: "POST",
                    data: {
                        id: post_id,
                        title:title,
                        image:image,
                        post:post
                    },
                    success: function(data) {
                        if (data == 1) {
                            $("#modal").hide();
                            // loadTable();
                        } else {
                            console.log("error...");
                        }
                    }
                })

            })
            });
    

    </script>

    <style>
        h1 {
            text-align: center;
        }

        button a {
            color: whitesmoke;
        }

        #modal {
            background: rgba(0, 0, 0, 0.7);
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            z-index: 100;
            display: none;
        }

        #modal_form {
            background: #fff;
            width: 30%;
            position: relative;
            top: 20%;
            left: 30%;
            padding: 10px;
            border-radius: 4px;
        }
    </style>
</head>

<body>

    <?php include 'dnav.php' ?>
    <div class="heading">
        <h1>My Post here!</h1>
    </div>

    <div id="modal" class="alert alert-warning alert-dismissible fade show" role="alert">
        <div id="modal_form">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <h2>Edit form</h2>
            <table cellpadding="0" width="100%">

            </table>
        </div>
    </div>

    <div class="container">
        <?php

        while ($row = mysqli_fetch_array($result)) {
            // print_r($row);
            ?>
            <div class="card" style="width: 100%;">

                <img src="<?php echo $row['image'] ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">
                        <?php echo $row['title'] ?>
                    </h5>
                    <!-- <h5 class="card-title">
               <label >Posted by <?php echo $name ?> </label>
            </h5> -->
                    <p class="card-text">
                        <?php echo $row['post'] ?>
                    </p>

                    <!-- <a href="#" class="btn btn-primary"> Comments:</a> -->
                    <p class="card-text">
                        <label > All Comments :</label>
                        <?php
                        $id = $row['post_id'];

                        // echo $id;
                        $sqlcomment = "SELECT * from comment_data where Post_id = '$id' ";
                        $commentquery = mysqli_query($conn, $sqlcomment);

                        while ($comment = mysqli_fetch_array($commentquery)) {
                            ?>
                            <?php echo $comment['comment']; ?>
                            <label >, Commented by</label>
                            <?php echo $comment['comment_by']; ?>

                        </p>

                    <?php } ?>
                    <a class="btn btn-primary" href="deletepost.php?post_id=<?php echo $id ?>" id="loadData">Delete Post
                    </a>
                    <button class='editbtn btn btn-primary' data-eid='<?php echo $row['post_id'] ?>'>Edit POST</button>

                </div>

            </div>
            <br>
            <?php
        }
        ?>
    </div>
    <br>
</body>

</html>