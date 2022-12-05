<?php
require_once "../config/env.php";

## Fetch records
$empQuery = "select  contacts.id, contacts.name, contacts.first_name, contacts.email, contacts.street, contacts.zipcode, contacts.group_ids as groups, cities.name as city from contacts INNER JOIN cities ON contacts.city_id=cities.id";
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
        "groups"=>$row['groups']
    );
}

echo json_encode($data);