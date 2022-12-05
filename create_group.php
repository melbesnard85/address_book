<?php require_once "./services/create_group.service.php";?>

<?php require_once "./layouts/head.php";?>
    <style>
        .wrapper{
            max-width: 800px;
        }
    </style>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="mt-5 mb-3"><i class="fa fa-address-card-o" aria-hidden="true"></i> Create address</h1>
                    <div class="mt-4 card read">
                        <div class="card-body">
                        <h5 class="card-title">Please fill this form and submit to create a group to the database.</h5>
                        <form id="createGroup" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <div class="form-group">
                                <label>Group name</label>
                                <input type="text" name="name" class="form-control <?php echo (!empty($group_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $group_name; ?>">
                                <span class="invalid-feedback"><?php echo $group_name_err;?></span>
                            </div>
                            <div class="form-group">
                                <label>Parent group </label>
                                <select name="parent_id" id="parent_id" class="form-control" value="<?php echo $parent_id; ?>">
                                    <?php
                                        if (!empty($groups)) {
                                            $options = '';
                                            foreach($groups as $group) {
                                                $options .= "<option value='" . $group['id'] . "'>" . $group['name'] . "</option>";
                                            }
                                            echo $options;
                                        }
                                    ?>
                                </select>
                                <span class="invalid-feedback"><?php echo $parent_id_error;?></span>
                            </div>
                            <input type="submit" class="btn btn-primary" value="Submit">
                            <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                        </form>
                        </div>
                    </div>
                </div>
            </div>        
        </div>
    </div>
<?php require_once "./layouts/footer.php";?>
