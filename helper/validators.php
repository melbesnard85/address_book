<?php
    // Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter a name.";
    } else{
        $name = $input_name;
    }

    // Validate first_name
    $input_first_name = trim($_POST["first_name"]);
    if(empty($input_first_name)){
        $first_name_err = "Please enter a first name.";
    } else{
        $first_name = $input_first_name;
    }

    // // Validate email
    $input_email = trim($_POST["email"]);
    if(empty($input_email)){
        $email_err = "Please enter an email.";     
    } else if (!filter_var($input_email, FILTER_VALIDATE_EMAIL)) {
        $email_err = "Invalid email format";
    } else {
        $email = $input_email;
    }

    // Validate street
    $input_street = trim($_POST["street"]);
    if(empty($input_street)){
        $street_err = "Please enter an street.";     
    } else{
        $street = $input_street;
    }

    // Validate zipcode
    $input_zipcode = trim($_POST["zipcode"]);
    if(empty($input_zipcode)){
        $zipcode_err = "Please enter an zipcode.";     
    } else{
        $zipcode = $input_zipcode;
    }

    // Validate city
    $input_city = trim($_POST["city"]);
    if(empty($input_city)){
        $city_err = "Please enter an city.";     
    } else{
        $city = $input_city;
    }