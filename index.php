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
                <div class="mt-5 mb-3 clearfix">
                    <h2 class="">Groups</h2>
                    <div id="group_tree"></div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="mt-5 mb-3 clearfix">
                    <h2 class="pull-left">Address book</h2>
                    <a href="create.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add New Address</a>
                    <a href="create_group.php" class="btn btn-primary mr-2 pull-right"><i class="fa fa-plus"></i> Create group</a>
                </div>
                <table id="myTable" class="display"></table> <br>
                <div class="flex">
                    <button id="export_json" class="btn btn-primary">Export JSON</button>
                    <button id="export_xml" class="btn btn-primary">Export XML</button>
                </div>
            </div>
        </div>        
    </div>
</div>

<script src="./assets/js/index.js"></script>
<script>
    $(document).ready(function () {
        $("#group_tree").jstree({
            "core" : {
                "themes" : {
                    "responsive": false
                },
                // so that create works
                "check_callback" : true,
                'data': [{
                        "text": "Parent Node",
                        "children": [{
                            "text": "Initially selected",
                            "state": {
                                "selected": true
                            }
                        }, {
                            "text": "Custom Icon",
                            "icon": "fonticon-bookmark text-danger fs-5"
                        }, {
                            "text": "Initially open",
                            "icon" : "fa fa-folder text-success",
                            "state": {
                                "opened": true
                            },
                            "children": [
                                {"text": "Another node", "icon" : "fa fa-file text-waring"}
                            ]
                        }, {
                            "text": "Another Custom Icon",
                            "icon": "fonticon-attachments text-warning fs-6"
                        }, {
                            "text": "Disabled Node",
                            "icon": "fa fa-check text-success",
                            "state": {
                                "disabled": true
                            }
                        }, {
                            "text": "Sub Nodes",
                            "icon": "fa fa-folder text-danger",
                            "children": [
                                {"text": "Item 1", "icon" : "fa fa-file text-waring"},
                                {"text": "Item 2", "icon" : "fa fa-file text-success"},
                                {"text": "Item 3", "icon" : "fa fa-file text-default"},
                                {"text": "Item 4", "icon" : "fa fa-file text-danger"},
                                {"text": "Item 5", "icon" : "fa fa-file text-info"}
                            ]
                        }]
                    },
                    "Another Node"
                ]
            },
            "types" : {
                "default" : {
                    "icon" : "fa fa-folder text-success"
                },
                "file" : {
                    "icon" : "fa fa-file  text-success"
                }
            },
            "state" : { "key" : "demo2" },
            "plugins" : [ "dnd", "state", "types" ]
        });
    });
</script>

<?php require_once "./layouts/footer.php";?>
