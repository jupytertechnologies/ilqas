<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'includes/lab.php';
include 'includes/users.php';
include 'includes/requestClass.php';
//Create objects out of the included classes
	$objRequest = new Requests();
	$objUser = new User();
	$objLab = new Labs();
//Get user id from JSON http request
if(isset($_GET['user_id'])){
	$user_id = $_GET['user_id'];
	
	
?>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Make Requests</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" rel="stylesheet" crossorigin="anonymous" />
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />
        <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" crossorigin="anonymous"></script>
		<script src="js/loadPages.js"></script>
    </head>
    <body class="nav-fixed">
        <?php include 'header.php'; ?>
		<div id="layoutSidenav">
		<?php include 'left_nav-3.php'; ?>
            <div id="layoutSidenav_content">
                <main>
                    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
                        <div class="container">
                            <div class="page-header-content pt-4">
                                <div class="row align-items-center justify-content-between">
                                    <div class="col-auto mt-4">
                                        <h1 class="page-header-title">
                                            <div class="page-header-icon"><i data-feather="edit-3"></i></div>
                                            Request
                                        </h1>
                                        <div class="page-header-subtitle">Complete the form below:</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </header>
                    <!-- Main page content-->
                    <div class="container mt-n10">
						<div class="row">
                            <div class="col-xl-4 col-md-6 mb-4">
                                <!-- Dashboard info widget 1-->
                                <div class="card border-top-0 border-bottom-0 border-right-0 border-left-lg border-primary h-100">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <div class="small font-weight-bold text-primary mb-1">Tests/Parameters added to cart</div>
                                                <div class="h5">
												<?php
												$tests = $objRequest->count_cart_items($user_id);
												echo $tests ;
												?>
												</div>
                                                <div class="text-xs font-weight-bold text-success d-inline-flex align-items-center">
                                                    <i class="mr-1" data-feather="trending-up"></i>
                                                    
                                                </div>
                                            </div>
                                            <div class="ml-2"><i class="fas fa-shopping-cart fa-2x text-gray-200"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
							<div class="col-xl-4 col-md-6 mb-4">
                                <!-- Dashboard info widget 1-->
                                <div class="card border-top-0 border-bottom-0 border-right-0 border-left-lg border-primary h-100">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <div class="small font-weight-bold text-success mb-1">Total Amount</div>
                                                <div class="h5">
												<?php
												$amount = $objRequest->sum_cart_costs($user_id);
												
												echo $amount;
												?>
												</div>
                                                <div class="text-xs font-weight-bold text-success d-inline-flex align-items-center">
                                                    <i class="mr-1" data-feather="trending-up"></i>
                                                    
                                                </div>
                                            </div>
                                            <div class="ml-2"><i class="fas fa-dollar-sign fa-2x text-gray-200"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 mb-4">
                                <!-- Dashboard info widget 2-->
                                <div class="card border-top-0 border-bottom-0 border-right-0 border-left-lg border-secondary h-100">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <div class="small font-weight-bold text-secondary mb-1">Total requests submitted</div>
                                                <div class="h5">
												<?php
												$requests = $objRequest->count_requests($user_id);
												
												echo $requests;
												?>
												</div>
                                                <div class="text-xs font-weight-bold text-success d-inline-flex align-items-center">
                                                    <i class="mr-1" data-feather="trending-up"></i>
                                                    
                                                </div>
                                            </div>
                                            <div class="ml-2"><i class="fas fa-envelope fa-2x text-gray-200"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- Default Bootstrap Form Controls-->
                                <div id="default">
                                    <div class="card mb-4">
                                        <div class="card-header">Enter the assay details</div>
                                        <div class="card-body">
                                            <!-- Component Preview-->
                                            <div class="sbp-preview">
                                                <div class="sbp-preview-content">
                                                    <form method="post" enctype="multipart/form-data">
                                                        <div class="form-row" >
															<div class="form-group col-md-6">
                                                            <label for="category"><b>Select test category:</b></label>
                                                            <select class="form-control" name="category" id="category" style="padding:5px;">
                                                                <option>Click here for category list</option>
																	<?php														
																	$datas = $objRequest->get_test_categories();
																	foreach($datas as $data){
																	$category = $data['test_category_name'];
																	echo '<option>' .$category. '</option>';
																	}?>
                                                            </select>
															</div>
															<div class="form-group col-md-6">
																<label for="schedule"><b>Select schedule:</b></label>
																<select class="form-control" name="schedule" id="schedule" style="padding:5px;">
																	<option>Click here for schedule list</option>
																	<?php
																	$datas = $objRequest->get_schedule();
																	foreach($datas as $data){
																	$schedule = $data['schedule_name'];
																	echo '<option>' .$schedule. '</option>';
																	}
																	?>
																</select>
															</div>
                                                        </div>
														<div class="form-row">
															<div class=" form-group col-md-6">
																<label for="parameter"><b>Select test parameter:</b></label>
																<select class="form-control" name="parameter" id="parameter" style="padding:5px;">
																	<option>Click here for parameter list</option>
																	<?php	
																	$datas = $objRequest->get_parameters();
																	foreach($datas as $data){
																	$test_name = $data['test_name'];
																	echo '<option>' .$test_name. '</option>';
																	}
																	?>
																</select>
															</div>
															<div class="form-group col-md-6">
																<label for="other_parameter"><b>Other parameter</b></label>
																<input class="form-control" name="other_parameter" id="other_parameter" type="text" placeholder="Paramemters that are not on the drop down list" />
															</div>
														</div>
														<div class="form-group">
                                                            <label for="equipment"><b>Equipment</b></label>
															<input class="form-control" name="equipment" id="equipment" type="text" placeholder="Enter equipment used in the assay" />
                                                        </div>
														<div class="form-group">
                                                            <label for="technique"><b>Technique</b></label>
															<input class="form-control" name="technique" id="technique" type="text" placeholder="Enter technique used for the assay" />
                                                        </div>
														<div class="form-row">
															<div class="form-group col-md-6">
																<label for="rapid"><b>Is this a rapid diagnostic test?</b></label>
																<div class="custom-control custom-radio">
																	<input class="custom-control-input" id="no" type="radio" name="no" />
																	<label class="custom-control-label" for="no">No</label>
																</div>
																<div class="custom-control custom-radio">
																	<input class="custom-control-input" id="yes" type="radio" name="yes" />
																	<label class="custom-control-label" for="yes">Yes</label>
																</div>
															</div>
															<div class="form-group col-md-6">
																<label for="invoice_name"><b>Invoice Addressed to:</b></label>
																<input class="form-control" name="invoice_name" id="invoice_name" type="text" placeholder="Leave Blank if invoice is to be addressed to your ILQAS account admin" />
															</div>
														</div>
														<!--Hidden Input for the user id for db normalization-->
														<input type="hidden" name="user_id" value="<?php echo $user_id; ?>"/>
														<div class="sbp-preview-text">
															<div class="d-flex justify-content-between">
																<button name="add" type="submit" class="btn btn-primary rounded-pill px-4 mr-2 my-1">Add test/parameter</button>
																<a class="btn btn-secondary rounded-pill px-4 mr-2 my-1" href="invoice.php?user_id=<?php echo$user_id;?>">View Cart Items</a>
																<button name="empty" type="submit" class="btn btn-danger rounded-pill px-4 mr-2 my-1">Empty cart</button>
																<button name="submit" type="submit" class="btn btn-success rounded-pill px-4 mr-2 my-1">Submit Request</button>
															</div>
														</div>
												<?php
												if(isset($_POST['add'])){
													
													//Parameter details
													$category = $_POST['category'];
													$schedule = $_POST['schedule'];
													$parameter = $_POST['parameter'];
													$other_parameter = $_POST['other_parameter'];
													$equipment = $_POST['equipment'];
													$technique = $_POST['technique'];
													if(isset($_POST['yes'])){
														$rdt = 'yes'; 
													}if(isset($_POST['no'])){
														$rdt = 'no';
													}
													$invoice_name = $_POST['invoice_name'];
													$user_id = $_POST['user_id'];
													if($category=='Click here for category list'||$schedule=='Click here for schedule list'||$parameter=='Click here for parameter list'||empty($equipment)||empty($technique)){
														echo"<script>alert('You have not entered any items in the cart. Complete request form and add parameters')</script>";
														echo"<script>window.open('make_request.php?user_id=$user_id,'_self')</script>";
													}else{
													$insert = $objRequest->insert_cat($user_id, $category, $schedule, $parameter, $other_parameter, $equipment, $technique, $rdt, $invoice_name);
													}
													
												}
												
												if(isset($_POST['submit'])){
													$save_invoice = $objRequest->save_invoice($user_id);
												}
												
												if(isset($_POST['empty'])){
													$empty_cart = $objRequest->empty_cart($user_id);
												}
												?>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </main>
				<?php include 'footer.php'; ?>
            </div>
        </div>
		
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.17.1/components/prism-core.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.17.1/plugins/autoloader/prism-autoloader.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/date-range-picker-demo.js"></script>
		<!--Lets add a script to prevent the form from resubmitting data once the user is redirected-->
		<script>
		if ( window.history.replaceState ) {
		  window.history.replaceState( null, null, window.location.href );
		}
		</script>
    </body>
</html>
<?php } ?>