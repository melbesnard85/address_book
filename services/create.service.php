<?php
    // Include config file
    require_once "./config/env.php";
    require_once "./common/global.php";

    // Get city array
    $cityQuery = "select id, name from cities";
    $cityRecords = mysqli_query($link, $cityQuery);
    $cities = array();

    while ($cityRow = mysqli_fetch_assoc($cityRecords)) {
        $cities[] = array(
            "id"=>$cityRow['id'],
            "name"=>$cityRow['name'],
        );
    }

    // Processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        require_once "./helper/validators.php";
        
        // Check input errors before inserting in database
        if(empty($name_err) && empty($first_name_err) && empty($email_err) && empty($street_err) && empty($zipcode_err) && empty($city_err)){
            // Prepare an insert statement
            $sql = "INSERT INTO contacts (name, first_name, email, street, zipcode, city_id) VALUES (?, ?, ?, ?, ?, ?)";
            
            if($stmt = mysqli_prepare($link, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "sssssi", $param_name, $param_first_name, $param_email, $param_street, $param_zipcode, $param_city);
                
                // Set parameters
                $param_name = $name;
                $param_first_name = $first_name;
                $param_email = $email;
                $param_street = $street;
                $param_zipcode = $zipcode;
                $param_city = $city;
                
                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    // Records created successfully. Redirect to landing page
                    header("location: index.php");
                    exit();
                } else{
                    echo "Oops! Something went wrong. Please try again later.";
                }
            }
            
            // Close statement
            mysqli_stmt_close($stmt);
        }
        
        // Close connection
        mysqli_close($link);
    }
?>