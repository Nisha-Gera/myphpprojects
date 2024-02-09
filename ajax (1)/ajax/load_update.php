<?php
include("./database/database.php");
$stdid = $_POST['id'];
// echo $stdid;
$sql = "SELECT * from student where id = '$stdid' ";
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
<input type='hidden' value = '{$row['id']}' id='stdid'>
      <tr>
        <td>Name</td>
<td><input type='text' id='editname' value='{$row['name']}'></td>
</tr>

<tr>
<td>email</td>
<td><input type='text' id='editemail' value='{$row['email']}'></td>
</tr>
<tr>
<td>Address:</td>
<td><input type='text' id='editaddress' value='{$row['address']}'></td>
</tr>       
           
<tr> <input type='submit' value='Update' id='editsubmit'> </tr> 
        ";
    }
    $output .= "</table>";
    mysqli_close($conn);
    echo $output;
} else {

    echo "<h2>record not found</h2>";
}
