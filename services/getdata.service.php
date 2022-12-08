<?php
require_once "../config/env.php";

$group_ids = $_GET['group_ids'];
## Fetch records to donwload
$empQuery = "select  contacts.id, contacts.name, contacts.first_name, contacts.email, contacts.street, contacts.zipcode, group_data.nm as group_name, cities.name as city from contacts INNER JOIN cities ON contacts.city_id=cities.id INNER JOIN group_data ON contacts.group_id=group_data.id WHERE contacts.group_id in (". $group_ids . ")";
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
        "city"=>$row['city'],
        "group"=>$row['group_name']
    );
}

echo json_encode($data);