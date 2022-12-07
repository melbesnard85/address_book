<?php require_once "./layouts/head.php";?>

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
            <div class="col-md-4">
                <div class="mt-5 mb-4 clearfix">
                    <h2 class="text-uppercase">Groups</h2>
                </div>
                <div id="group_tree"></div>
            </div>
            <div class="col-md-8">
                <div class="mt-5 mb-4 clearfix">
                    <h2 id="tb_title" class="pull-left text-uppercase">Address book</h2>
                    <a href="create.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add New Address</a>
                </div>
                <table id="address_tbl" class="display"></table> <br>
                <div class="flex">
                    <button id="export_json" class="btn btn-primary">Export JSON</button>
                    <button id="export_xml" class="btn btn-primary">Export XML</button>
                </div>
            </div>
        </div>        
    </div>
</div>

<script src="./assets/js/index.js"></script>

<?php require_once "./layouts/footer.php";?>
