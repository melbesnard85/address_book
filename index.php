<?php require_once(dirname(__FILE__) . './services/group.service.php');?>
<?php require_once(dirname(__FILE__) . './layouts/head.php');?>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="mt-5 mb-4 clearfix">
                    <h2 class="text-uppercase">Groups</h2>
                </div>
                <div id="container" role="main">
                    <div id="group_tree"></div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="mt-5 mb-4 clearfix">
                    <h2 id="tb_title" class="pull-left text-uppercase">Address book</h2>
                    <a id="add_address" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add New Address</a>
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
<script>
	$(function () {
		$(window).resize(function () {
			var h = Math.max($(window).height() - 0, 420);
			$('.wrapper').height(h).filter('.default').css('lineHeight', h + 'px');
		}).resize();
	});
</script>
<?php require_once(dirname(__FILE__) . "./layouts/footer.php");?>

