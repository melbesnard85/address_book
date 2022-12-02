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
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#myTable').DataTable({
            'processing': true,
            'serverSide': true,
            'serverMethod': 'post',
            'ajax': {
                'url':'./services/index.service.php'
            },
            'columns': [
                { title: 'Id', data: 'id' },
                { title: 'Name', data: 'name' },
                { title: 'First name', data: 'first_name' },
                { title: 'Email', data: 'email' },
                { title: 'Street', data: 'street' },
                { title: 'Zipcode', data: 'zipcode' },
                { title: 'City', data: 'city' },
                { title: 'Action', data: 'city', render: function ( data, type, row ) {
                    return `<a href="read.php?id=`+ row['id'] +`" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>
                            <a href="update.php?id=`+ row['id'] +`" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>
                            <a href="delete.php?id=`+ row['id'] +`" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>`;
                } },
            ]
            
        });

        
    });
</script>



<?php require_once "layouts/footer.php";?>
