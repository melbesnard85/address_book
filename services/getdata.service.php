<?php
require_once "../config/env.php";

## Fetch records
$empQuery = "select * from contacts";
$empRecords = mysqli_query($link, $empQuery);
$data = array();

while ($row = mysqli_fetch_assoc($empRecords)) {
    $data[] = array(
        "id"=>$row['id'],
        "name"=>$row['name'],
        "first_name"=>$row['first_name'],
        "email"=>$row['email'],
        "street"=>$row['street'],
        "zipcode"=>$row['zipcode'],
        "city"=>$row['city']
    );
}

// ## Response
// $response = array(
//     "draw" => intval($draw),
//     "iTotalRecords" => $totalRecords,
//     "iTotalDisplayRecords" => $totalRecordwithFilter,
//     "aaData" => $data
// );

echo json_encode($data);