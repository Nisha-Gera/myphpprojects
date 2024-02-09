<?php

include("./database/database.php");
$limit_per_page = 5;

$page= "";
if(isset($_POST['page_no'])){
    $page = $_POST['page_no'];
}else{
    $page = 1;
}
$offset =($page-1) * $limit_per_page;

$sql = "SELECT * from student LIMIT {$offset},{$limit_per_page}";

$result = mysqli_query($conn, $sql);

$output = "";
if (mysqli_num_rows($result) > 0) {
    $output =
        '<table id="tableData" >
    <tr> 
    <th>Id</th>
    <th>Name</th>
    <th>Email</th>
    <th>Address</th>
    <th>Action</th>
    <th>Action</th>
    </tr>';

    while ($row = mysqli_fetch_assoc($result)) {
        $output .= "

        <tr>
            <td>{$row['id']}</td>
            <td>{$row['name']}</td>
            <td>{$row['email']}</td>
            <td>{$row['address']}</td>
            <td><button class='editbtn' data-eid='{$row['id']}'  style = 'background:green;'>Edit</button> </td>
            <td><button class='deletebtn' data-id='{$row['id']}'  style = 'background:red;' >Delete</button> </td>
        </tr>

        ";
    }
    $output .= "</table>";

    $sql_total = "SELECT * FROM student";
    $records = mysqli_query($conn, $sql_total);
    // echo "records" ;print_r($records);
    $total_records = mysqli_num_rows($records);
    // echo 'total' ;print_r($total_records);

    $total_pages = ceil ($total_records/$limit_per_page);
    // echo $total_pages;
    $output .= "
    <div class='pagination'>";

    for($i=1;$i<$total_pages;$i++){
        if($i == $page) {
            $class_name = "active";
            }else{
            $class_name =
          "";
            }
        $output .= "
        <a class='{ $class_name}' id='{$i}' href=''   style = 'background:blue; border:1px solid blue;color:white;padding:10px;margin:10px;'> {$i} </a>";
    }
    $output .="</div>";
   
    mysqli_close($conn);
    echo $output;
} else {

    echo "<h2>Record Not Found</h2>";
}
