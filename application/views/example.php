<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
	<?php 
	foreach($css_files as $file): ?>
		<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
	<?php endforeach; ?>
</head>
<body class="sb-nav-fixed">
	<?php $this->load->view("admin/_partials/navbar.php") ?>

	<div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <!-- sidebar.php-->
            <?php $this->load->view("admin/_partials/sidebar.php") ?>
        </div>
        <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">GROCERY CRUD</h1>
                            <?php $this->load->view("admin/_partials/breadcrumb.php") ?>
							<a href='<?php echo site_url('examples/author')?>'>Author</a> |
							<a href='<?php echo site_url('examples/book_category')?>'>Book Category</a> |
							<a href='<?php echo site_url('examples/customer')?>'>Customer</a> |
							<a href='<?php echo site_url('examples/level')?>'>Level</a> | 
							<a href='<?php echo site_url('examples/supplier')?>'>Supplier</a> |
							<a href='<?php echo site_url('examples/book')?>'>Book</a> |
							<body>
                            	<div style='height:20px;'></div>  
							    <div style="padding: 10px">
									<?php echo $output; ?>
							    </div>
							    <?php $this->load->view("admin/_partials/js.php") ?>
							    <?php foreach($js_files as $file): ?>
							        <script src="<?php echo $file; ?>"></script>
							    <?php endforeach; ?>
                            </body>
						</div>
					</main>
	                <!-- footer.php -->
	                <?php $this->load->view("admin/_partials/footer.php") ?>
	            </div>
	            <div class="modal fade" id="iniModal" role=dialog>
	            	
	            	<?php 
						foreach($js_files as $file): ?>
					<?php endforeach; ?>           	
	            </div>

</body>
<?php $this->load->view("admin/_partials/modal.php") ?>	 
</html>
