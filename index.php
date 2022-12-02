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
                <table id="myTable" class="display"></table> <br>
                
            </div>
        </div>        
        <div class="flex">
            <button id="export_json" class="btn btn-primary">Export JSON</button>
            <button id="export_xml" class="btn btn-primary">Export XML</button>
        </div>
    </div>
</div>

<script src="./assets/js/index.js"></script>

<?php require_once "layouts/footer.php";?>
