<?php
require_once "../config/env.php";

## Read value
$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
$columnIndex = $_POST['order'][0]['column']; // Column index
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
$searchValue = mysqli_real_escape_string($link,$_POST['search']['value']); // Search value

## Search 
$searchQuery = " ";
if($searchValue != ''){
	$searchQuery = " and (contacts.name like '%".$searchValue."%' or 
        first_name like '%".$searchValue."%' ) ";
}

## Total number of records without filtering
$sel = mysqli_query($link,"select count(*) as allcount from contacts");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];

## Total number of records with filtering
$sel = mysqli_query($link,"select count(*) as allcount from contacts WHERE 1 ".$searchQuery);
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$empQuery = "select contacts.id, contacts.name, contacts.first_name, contacts.email, contacts.street, contacts.zipcode, cities.name as city FROM contacts INNER JOIN cities ON contacts.city_id=cities.id WHERE 1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
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

## Response
$response = array(
    "draw" => intval($draw),
    "iTotalRecords" => $totalRecords,
    "iTotalDisplayRecords" => $totalRecordwithFilter,
    "aaData" => $data
);

echo json_encode($response);