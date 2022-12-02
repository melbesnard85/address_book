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
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
    require_once "./helper/validators.php";

    // Check input errors before inserting in database
    if(empty($name_err) && empty($first_name_err) && empty($email_err) && empty($street_err) && empty($zipcode_err) && empty($city_err)){
        // Prepare an update statement
        $sql = "UPDATE contacts SET name=?, first_name=?, email=?, street=?, zipcode=?, city_id=? WHERE id=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssii", $param_name, $param_first_name, $param_email, $param_street, $param_zipcode, $param_city, $param_id);
            
            // Set parameters
            $param_name = $name;
            $param_first_name = $first_name;
            $param_email = $email;
            $param_street = $street;
            $param_zipcode = $zipcode;
            $param_city = $city;
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // addresss updated successfully. Redirect to landing page
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
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM contacts WHERE id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $name = $row["name"];
                    $first_name = $row["first_name"];
                    $email = $row["email"];
                    $street = $row["street"];
                    $zipcode = $row["zipcode"];
                    $city = $row["city_id"];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($link);
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>