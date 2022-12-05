<?php
    // Include config file
    require_once "./config/env.php";
    require_once "./common/global.php";

    // Get group array
    $groupQuery = "select id, name from groups";
    $groupRecords = mysqli_query($link, $groupQuery);
    $groups = array();

    while ($groupRow = mysqli_fetch_assoc($groupRecords)) {
        $groups[] = array(
            "id"=>$groupRow['id'],
            "name"=>$groupRow['name'],
        );
    }

    // Processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        require_once "./helper/group_validator.php";
        
        // Check input errors before inserting in database
        if(empty($group_name_err) && empty($parent_id_error)){
            // Prepare an insert statement
            $sql = "INSERT INTO groups (name, parent_id) VALUES (?, ?)";
            
            if($stmt = mysqli_prepare($link, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "si", $param_name, $param_parent_id);
                
                // Set parameters
                $param_name = $group_name;
                $param_parent_id = $parent_id;
                
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