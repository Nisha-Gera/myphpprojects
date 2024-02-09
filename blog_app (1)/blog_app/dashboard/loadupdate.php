<?php
include "../database/database.php";
$id = $_POST['id'];
// echo $id;
$sql = "SELECT * from blog_data where post_id = '$id' ";
// echo $sql;
// die();
$result = mysqli_query($conn, $sql);
// print_r($result);
$output = "";
if (mysqli_num_rows($result) > 0) {

    $output =
        '<table id="tableData" width = "100%" >';

    while ($row = mysqli_fetch_assoc($result)) {
        $output .= "
<input type='hidden' value = '{$row['post_id']}' id='id'>
    <tr>
        <td>Title</td>
        <td><input type='text' id='editname' value='{$row['title']}'></td>
    </tr>   
    <br>
    <tr>
        <td>Image</td>
        <td> <input type='file' id='editimage' value=''> <img src='{$row['image']}</td>
    </tr>
    <br>
    <tr>
        <td>Post Content</td>
        <td> <textarea name='' id='' cols='30' rows='10'>'{$row['post']}'
        </textarea id='editimage'>
        </td>   
    </tr>

    <tr> <input type='submit' value='Update' id='editsubmit'> </tr>"; }
    $output .= "</table>";
    mysqli_close($conn);
    echo $output;
} else {

    echo "<h2>record not found</h2>";
}
