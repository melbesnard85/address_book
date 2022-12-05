<?php require_once "./services/update.service.php";?>
 
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
                    <h1 class="mt-5 mb-3"><i class="fa fa-address-card-o" aria-hidden="true"></i> Update address</h1>
                    <div class="mt-4 card read">
                        <div class="card-body">
                            <h5 class="card-title">Please edit the input values and submit to update the address address.</h5>
                            <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                                    <span class="invalid-feedback"><?php echo $name_err;?></span>
                                </div>
                                <div class="form-group">
                                    <label>First name</label>
                                    <input type="text" name="first_name" class="form-control <?php echo (!empty($first_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $first_name; ?>">
                                    <span class="invalid-feedback"><?php echo $first_name_err;?></span>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                                    <span class="invalid-feedback"><?php echo $email_err;?></span>
                                </div>
                                <div class="form-group">
                                    <label>Street</label>
                                    <input type="text" name="street" class="form-control <?php echo (!empty($street_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $street; ?>">
                                    <span class="invalid-feedback"><?php echo $street_err;?></span>
                                </div>
                                <div class="form-group">
                                    <label>Zipcode</label>
                                    <input type="text" name="zipcode" class="form-control <?php echo (!empty($zipcode_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $zipcode; ?>">
                                    <span class="invalid-feedback"><?php echo $zipcode_err;?></span>
                                </div>
                                <div class="form-group">
                                    <label>City </label>
                                    <select name="city" id="city" class="form-control <?php echo (!empty($city_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $city; ?>">
                                        <?php
                                            if (!empty($cities)) {
                                                $options = '';
                                                foreach($cities as $city_v) {
                                                    $options .= "<option value='" . $city_v['id'] . "'>" . $city_v['name'] . "</option>";
                                                }
                                                echo $options;
                                            }
                                        ?>
                                    </select>
                                    <span class="invalid-feedback"><?php echo $city_err;?></span>
                                </div>
                                <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                                <input type="submit" class="btn btn-primary" value="Submit">
                                <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>        
        </div>
    </div> 
    <script>
        var city_id = <?php echo $city?>;
        $(document).ready(function () {
            $("#city").val(city_id);
        })
    </script>
    
<?php require_once "layouts/footer.php";?>
