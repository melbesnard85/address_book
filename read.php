<?php require_once "./services/read.service.php";?>

<?php require_once "layouts/head.php";?>
    <style>
        .wrapper{
            max-width: 800px;
        }
    </style>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="mt-5 mb-3"><i class="fa fa-address-card-o" aria-hidden="true"></i> View address</h1>

                    <div class="mt-4 card read">
                        <div class="card-body">
                        <h5 class="card-title">View address</h5>
                        <ul class="list-group">
                            <li class="list-group-item bg-whitesmoke"><i class="fa fa-user"></i>  <?php echo $row["name"]; ?></li>
                            <li class="list-group-item bg-whitesmoke"><i class="fa fa-user"></i>  <?php echo $row["first_name"]; ?></li>
                            <li class="list-group-item bg-whitesmoke"><i class="fa fa-envelope" style="font-size:17px;"></i>  <?php echo $row["email"]; ?></li>
                            <li class="list-group-item bg-whitesmoke"><i class="fa fa-street-view"></i>  <?php echo $row["street"]; ?></li>
                            <li class="list-group-item bg-whitesmoke"><i class="fa fa-map-pin"></i>  <?php echo $row["zipcode"]; ?></li>
                            <li class="list-group-item bg-whitesmoke"><i class="fa fa-map-marker"></i>  <?php echo $row["city"]; ?></li>
                        </ul>
                        </div>
                    </div><br>
                    <p class="text-right"><a href="index.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>        
        </div>
    </div>
    
<?php require_once "layouts/footer.php";?>
