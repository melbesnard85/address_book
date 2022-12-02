<?php
// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // Include config file
    require_once "config/env.php";
    
    // Prepare a select statement
    $sql = "SELECT * FROM contacts WHERE id = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        // Set parameters
        $param_id = trim($_GET["id"]);
        
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
                $city = $row["city"];
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
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
} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
}
?>
<?php require_once "layouts/head.php";?>

    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="mt-5 mb-3"><i class="fa fa-address-card-o" aria-hidden="true"></i> View address</h1>

                    <div class="mt-4 card read">
                        <!-- <img class="card-img-top" src="http://www.orseu-concours.com/451-615-thickbox/selor-test-de-raisonnement-abstrait-niveau-a.jpg" alt="Company logo"> -->
                        <div class="card-body">
                        <h5 class="card-title">View address</h5>
                        <ul class="list-group">
                            <li class="list-group-item list-group-item-success"><i class="fa fa-user"></i>  <?php echo $row["name"]; ?></li>
                            <li class="list-group-item list-group-item-success"><i class="fa fa-user"></i>  <?php echo $row["first_name"]; ?></li>
                            <li class="list-group-item list-group-item-success"><i class="fa fa-envelope" style="font-size:17px;"></i>  <?php echo $row["email"]; ?></li>
                            <li class="list-group-item list-group-item-success"><i class="fa fa-street-view"></i>  <?php echo $row["street"]; ?></li>
                            <li class="list-group-item list-group-item-success"><i class="fa fa-map-pin"></i>  <?php echo $row["zipcode"]; ?></li>
                            <li class="list-group-item list-group-item-success"><i class="fa fa-map-marker"></i>  <?php echo $row["city"]; ?></li>
                        </ul>
                        </div>
                        <!-- <div class="card-footer">
                        <button type="button" class="btn" id="left-panel-link" >Register</button>
                        <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal3" id="right-panel-link">
                        Learn More
                        </button>
                        </div> -->
                    </div><br>
                    <p class="text-right"><a href="index.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>        
        </div>
    </div>
    
<?php require_once "layouts/footer.php";?>
