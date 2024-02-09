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

    <link rel="stylesheet" href="style.css">

    <script type="text/javascript">
        // display data..
        $(document).ready(function() {

            $("#loadData").click(function() {
                // $("#loadData").on("click", function (e)
                $.ajax({
                    url: "showlogic.php",
                    type: "POST",
                    success: function(data) {
                        $("#tableData").html(data);
                    }

                })

            });

        });

        // delete data by id..
        $(document).on("click", ".deletebtn", function() {
            function loadTable() {
                // alert('hello i am load table;')
                $.ajax({
                    url: "showlogic.php",
                    type: "POST",
                    success: function(data) {
                        $("#tableData").html(data);
                    }
                });
            }
            // loadTable();

            if (confirm("Do you really want to delete this record ?")) {
                var studentid = $(this).data("id");
                var element = this;
                $.ajax({
                    url: "deletlogic.php",
                    type: "POST",
                    data: {
                        id: studentid
                    },
                    success: function(data) {
                        // alert(data);
                        if (data == 1) {
                            $(element).closest("tr").fadeOut();
                            loadTable();
                            $("#success_message").html("Record deleted successfully !").slideDown();
                            $("#error_message").slideUp();
                            // alert("deleted successfully");

                        } else {
                            // alert("can't delete data!");
                            $("#error_message").html("Can't Delete Record.").slideDown();
                            $("#success_message").slideUp();
                        }
                    }
                });
            }
        });


        //  insert record
        $(document).ready(function() {
            function loadTable() {
                $.ajax({
                    url: "showlogic.php",
                    type: "POST",
                    success: function(data) {
                        $("#tableData").html(data);
                    }
                });
            }
            loadTable();

            $("#save-btn").on("click", function(e) {

                e.preventDefault();
                var name = $("#name").val();
                // console.log(name);
                var email = $("#email").val();
                // console.log(email);
                var address = $("#address").val();
                // console.log(address);
                if (name == " " || email == "" || address == "") {
                    $("#error_message").html("All fields are required!").slideDown();
                    $("#success_message").slideUp();

                } else {
                    $.ajax({

                        url: "insertlogic.php",
                        type: "POST",
                        data: {
                            name: name,
                            email: email,
                            address: address
                        },

                        success: function(data) {

                            if (data == 1) {
                                // alert("inserted");
                                loadTable();
                                $("#Form").trigger("reset");
                                $("#success_message").html("Data inserted successfully").slideDown();
                                $("#error_message").slideUp();
                            } else {
                                $("#error_message").html("Can't save record!").slideDown();
                                $("#error_message").slideUp();
                            }
                        }
                    })
                }
            });
        });

        //update data
        $(document).on("click", ".editbtn", function() {
            $("#modal").show();

            var stdid = $(this).data("eid"); //student id
            // alert(stdid);
            $.ajax({
                url: "load_update.php",
                type: "POST",
                data: {
                    id: stdid
                },
                success: function(data) {
                    $("#modal_form table").html(data);
                }
            })

            $(document).on("click", "#editsubmit", function(e) {

                function loadTable() {
                    $.ajax({
                        url: "showlogic.php",
                        type: "POST",
                        success: function(data) {
                            $("#tableData").html(data);
                        }
                    });
                }
                // loadTable();
                e.preventDefault();
                var stdid = $("#stdid").val(); //student id
                console.log(stdid);

                var name = $("#editname").val();
                console.log(name);
                var email = $("#editemail").val();
                console.log(email);
                var address = $("#editaddress").val();
                console.log(address);

                $.ajax({
                    url: "update.php",
                    type: "POST",
                    data: {
                        id: stdid,
                        name: name,
                        email: email,
                        address: address
                    },
                    success: function(data) {
                        if (data == 1) {
                            $("#modal").hide();
                            loadTable();
                        } else {
                            console.log("error...");
                        }
                    }
                })

            })
        })
        // pagination
        $(document).ready(function() {
            function loadTable(page) {
                $.ajax({
                    url: "showlogic.php",
                    type: "POST",
                    data: {
                        page_no: page,
                    },
                    success: function(data) {
                        $("#tableData").html(data);
                    }
                });
            }
            loadTable();
            $(document).on("click", ".pagination a", function(e) {
                e.preventDefault();
                var page_id = $(this).attr("id");
                loadTable(page_id);
            })

        })

    </script>

<body>
    <h3>ajax learning !</h3>
    <!-- <button id="loadData">Load Data</button> -->

    <h4>insert new records!</h4>

    <form action="" id="Form">
        <label for="name">enter name</label>
        <input type="text" id="name">
        <label for="email">enter email</label>
        <input type="text" id="email">
        <label for="address">enter address</label>
        <input type="text" id="address">
        <input type="submit" id="save-btn" value="Save">
    </form>

    <div id="error_message"></div>
    <div id="success_message"></div>
    <br>

    <div id="modal" class="alert alert-warning alert-dismissible fade show" role="alert">
        <div id="modal_form">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <h2>Edit form</h2>
            <table cellpadding="0" width="100%">

            </table>
        </div>
    </div>
    </div>
    <!-- <input type="button" value="Load Data" id="loadData"> -->

    <table id="tableData" border="0" cellspacing="0">

    </table>
    <script type="text/javascript" src="jquery.js"></script>

</body>

</html>
