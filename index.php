    <?php require_once "layouts/head.php";?>
    <style>
        .wrapper{
            width: 70%;
            margin: 0 auto;
        }
        table tr td:last-child{
            width: 120px;
        }
    </style>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>

    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">Address book</h2>
                        <a href="create.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add New Address</a>
                    </div>
                    <!-- <table id="myTable" class="display"></table> <br> -->
                    <?php
                    // Include config file
                    require_once "config/env.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM contacts";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Name</th>";
                                        echo "<th>First name</th>";
                                        echo "<th>Email</th>";
                                        echo "<th>Street</th>";
                                        echo "<th>Zipcode</th>";
                                        echo "<th>City</th>";
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>" . $row['first_name'] . "</td>";
                                        echo "<td>" . $row['email'] . "</td>";
                                        echo "<td>" . $row['street'] . "</td>";
                                        echo "<td>" . $row['zipcode'] . "</td>";
                                        echo "<td>" . $row['city'] . "</td>";
                                        echo "<td>";
                                            echo '<a href="read.php?id='. $row['id'] .'" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                                            echo '<a href="update.php?id='. $row['id'] .'" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                            echo '<a href="delete.php?id='. $row['id'] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
 
                    // Close connection
                    mysqli_close($link);
                    ?>
                </div>
            </div>        
        </div>
    </div>

    <script>
        $(document).ready(function () {
            var data = [
                {
                    "name":       "Tiger Nixon",
                    "position":   "System Architect",
                    "salary":     "$3,120",
                    "start_date": "2011/04/25",
                    "office":     "Edinburgh",
                    "extn":       "5421"
                },
                {
                    "name":       "Garrett Winters",
                    "position":   "Director",
                    "salary":     "$5,300",
                    "start_date": "2011/07/25",
                    "office":     "Edinburgh",
                    "extn":       "8422"
                }
            ];

            $('#myTable').DataTable({
                data: data,
                columns: [
                    { data: 'name' },
                    { data: 'position' },
                    { data: 'salary' },
                    { data: 'office' }
                ]
            });
        });
    </script>

    <?php require_once "layouts/footer.php";?>
