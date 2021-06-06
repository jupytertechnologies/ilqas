<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'includes/lab.php';
include 'includes/users.php';
	$objUser = new User();

//Get user id from JSON http request
if(isset($_GET['user_id'])){
	$user = $_GET['user_id'];
	
	$objLab = new Labs();

?>
<html lang="en">
    <head>
        <meta charset="utf-8" >
		<meta name=”viewport” content=”width=device-width, initial-scale=1.0” >
        <!--<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />-->
        <meta name="description" content="" >
        <meta name="author" content="" >
        <title>Laboratory Details</title>
        <!--<link href="css/styles.css" rel="stylesheet" />-->
		<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        
		<link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />
        <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" crossorigin="anonymous"></script>
		<script src="js/loadPages.js"></script>
    </head>
	<body class="nav-fixed">
		<?php include 'header.php'; ?>
		<div id="layoutSidenav">
		<?php include 'left_nav.php'; ?>
			<div id="layoutSidenav_content">
			<main>
                    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
                        <div class="container">
                            <div class="page-header-content pt-4">
                                <div class="row align-items-center justify-content-between">
                                    <div class="col-auto mt-4">
                                        <h1 class="page-header-title">
                                            <div class="page-header-icon"><i data-feather="activity"></i></div>
                                            Dashboard
                                        </h1>
                                        <div class="page-header-subtitle">Participate in the world's largest Inter-Laboratory Comparison Programs</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </header>
			<!-- Main page content-->
			<div class="container mt-n10">
			
				<!-- Wizard card example with navigation-->
				<div class="card">
				
					<div class="card-header border-bottom">
						<!-- Wizard navigation-->
						<div class="nav nav-pills nav-justified flex-column flex-xl-row nav-wizard" id="cardTab" role="tablist">
							<!-- Wizard navigation item 1-->
							<a class="nav-item nav-link active" id="wizard1-tab" href="#wizard1" data-toggle="tab" role="tab" aria-controls="wizard1" aria-selected="true">
								<div class="wizard-step-icon">1</div>
								<div class="wizard-step-text">
									<div class="wizard-step-text-name">Account Setup</div>
									<div class="wizard-step-text-details">Basic details and information</div>
								</div>
							</a>
							<!-- Wizard navigation item 2-->
							<a class="nav-item nav-link" id="wizard2-tab" href="#wizard2" data-toggle="tab" role="tab" aria-controls="wizard2" aria-selected="true">
								<div class="wizard-step-icon">2</div>
								<div class="wizard-step-text">
									<div class="wizard-step-text-name">Account Administrator</div>
									<div class="wizard-step-text-details">Person responsible for managing the laboratory account</div>
								</div>
							</a>
							<!-- Wizard navigation item 3-->
							<a class="nav-item nav-link" id="wizard3-tab" href="#wizard3" data-toggle="tab" role="tab" aria-controls="wizard3" aria-selected="true">
								<div class="wizard-step-icon">3</div>
								<div class="wizard-step-text">
									<div class="wizard-step-text-name">Payment details</div>
									<div class="wizard-step-text-details">Where ILQAS will send your money</div>
								</div>
							</a>
						</div>
					</div>
					<div class="card-body">
						<div class="tab-content" id="cardTabContent">
						
							<!-- Wizard tab pane item 1-->
							<div class="tab-pane py-5 py-xl-10 fade show active" id="wizard1" role="tabpanel" aria-labelledby="wizard1-tab">
								<div class="row justify-content-center">
										<div class="col-xxl-6 col-xl-8">
									
										<h3 class="text-primary">Step 1</h3>
										<h5 class="card-title">Enter your Laboratory information</h5>
										<form method="POST">
											<div class="form-group">
												<label class="small mb-1" for="lab_name">Laboratory Name (how your laboratory will appear to other users on the site)</label>
												<input class="form-control" type="text" id="lab_name" name="lab_name" placeholder="Enter your username"/>
											</div>
											<div class="form-row">
												<div class="form-group col-md-6">
													<label class="small mb-1" for="regions">Health Region</label>
													<select style="padding-top: 7px;" class="form-control" name="regions" id="regions">
														<option>Select region</option>
														<?php														
														$datas = $objLab->get_regions();
														foreach($datas as $data){
														$region = $data['region_name'];
														echo '<option>' .$region. '</option>';
														}?>
													</select>
												</div>
												<div class="form-group col-md-6">
													<label class="small mb-1" for="levels">Hospital Level</label>
													<select style="padding-top: 7px;" class="form-control" name="levels" id="levels">
														<option>Select Level</option>
														<?php
														$row_levels = $objLab->get_levels();
														foreach($row_levels as $row){
														$level = $row['level_name'];
														echo '<option>' .$level. '</option>';
														}?>
													</select>
												</div>
											</div>
											<div class="form-row">
												<div class="form-group col-md-6">
													<label class="small mb-1" for="districts">District</label>
													<select style="padding-top: 7px;" class="form-control" name="districts" id="districts">
														<option>District</option>
														<?php
														$row_districts = $objLab->get_districts();
														foreach($row_districts as $row){
														$district = $row['district_name'];
														echo '<option >' .$district. '</option>';
														}?>
													</select>
												</div>
												<div class="form-group col-md-6">
													<label class="small mb-1" for="street">Street Address</label>
													<input class="form-control" id="street" type="text" name="street" placeholder="Enter your first name" />
												</div>
											</div>
											
											<div class="form-group">
												<label class="small mb-1" for="email">Email address</label>
												<input class="form-control" id="email" type="email" name="email" placeholder="Enter your email address" />
											</div>
											<div class="form-row">
												<div class="form-group col-md-12 mb-md-0">
													<label class="small mb-1" for="phone">Phone number</label>
													<input class="form-control" id="phone" type="tel" name="phone" placeholder="Enter your phone number" />
													
												</div>
											</div>
											
													<!--Hidden Input for the user id for db normalization-->
													<input type="hidden" name="userid" id="userid" value="<?php echo $user; ?>" />
													
											<hr class="my-4" />
											<div class="d-flex justify-content-between">
												<button class="btn btn-light" name="cancel" type="button">Cancel</button>
												<button class="btn btn-primary" name="save" type="submit">Save</button><br>
											</div>
											<?php
											if(isset($_POST['save'])){
																									
												//Lab details
												$user_id = $_POST['userid'];
												$lab_name = $_POST['lab_name'];
												$regions = $_POST['regions'];
												$levels = $_POST['levels'];
												$districts = $_POST['districts'];
												$street = $_POST['street'];
												$email = $_POST['email'];
												$phone = $_POST['phone'];
												
												$objLab = new Labs();
												$insert = $objLab->insert_lab1($user_id, $lab_name, $regions, $districts, $levels, $street, $email, $phone);
											}?>
										</form>
									</div>
									</div>
							</div>
							<!-- Wizard tab pane item 2-->
							<div class="tab-pane py-5 py-xl-10 fade" id="wizard2" role="tabpanel" aria-labelledby="wizard2-tab">
								<div class="row justify-content-center">
									<div class="col-xxl-6 col-xl-8">
										<h3 class="text-primary">Step 2</h3>
										<h5 class="card-title">Administrators details</h5>
										<form method="POST">
											<div class="form-row">
												<div class="form-group col-md-6">
													<label class="small mb-1" for="surname">Surname</label>
													<input class="form-control" id="surname" type="text" name="surname" placeholder="Enter your Surname" />
												</div>
												<div class="form-group col-md-6">
													<label class="small mb-1" for="lastname">Last Name</label>
													<input class="form-control" id="lastname" type="text" name="lastname" placeholder="Enter your Last name" />
												</div>
											</div>
											<div class="form-row">
												<div class="form-group col-md-6 mb-4 mb-md-0">
													<label class="small mb-1" for="position">Designation/Position</label>
													<input class="form-control" id="position" type="text" name="position" placeholder="Enter your position at the laboratory" />
												</div>
												<div class="form-group col-md-6 mb-0">
													<label class="small mb-1" for="admin_phone">Telephone</label>
													<input class="form-control" id="admin_phone" type="tel" name="admin_phone" placeholder="Enter your phone number"/>
												</div>
											</div>
											<div class="form-row">
												<div class="form-group col-md-12 mb-4 mb-md-0">
													<label class="small mb-1" for="admin_email">Email</label>
													<input class="form-control" id="admin_email" type="email" name="admin_email" placeholder="Enter your email address" />
													
													<!--Hidden Input for the user id for db normalization-->
													<input type="hidden" name="user_id" value="<?php echo $user; ?>"/>
													
												</div>
											</div>
											
											<hr class="my-4" />
											<div class="d-flex justify-content-between">
												<button class="btn btn-light" type="button" name="cancel">Cancel</button>
												<button class="btn btn-primary" type="submit" name="save2">Save</button>
												<?php
											if(isset($_POST['save2'])){
												
												//Admin details
												$user_id = $_POST['user_id'];
												
												$sur_name = $_POST['surname'];
												$last_name = $_POST['lastname'];
												$position = $_POST['position'];
												$admin_email = $_POST['admin_email'];
												$admin_phone = $_POST['admin_phone'];
																				
												$objSave = new Labs;
												$insert2 = $objSave -> insert_lab_details2($user_id,$sur_name,$last_name,$position,$admin_email,$admin_phone);
												
											}?>							
											</div>
											
										</form>
									</div>
								</div>
							</div>
							<!-- Wizard tab pane item 3-->
							<div class="tab-pane py-5 py-xl-10 fade" id="wizard3" role="tabpanel" aria-labelledby="wizard3-tab">
								<div class="row justify-content-center">
									<div class="col-xxl-6 col-xl-8">
										<h3 class="text-primary">Step 3</h3>
										<h5 class="card-title">Payment Details</h5>
										<form method="post" enctype="multipart/form-data">
											<div class="form-group">
												<label class="small mb-1" for="entity_name">Name of Entity to be paid</label>
												<input class="form-control" id="entity_name" type="text" name="entity_name" placeholder="Enter Name of Entity to be paid by ILQAS"/>
											</div>
											<div class="form-row">
												<div class="form-group col-md-6">
													<label class="small mb-1" for="relationship">Relationship with the laboratory</label>
													<select style="padding-top: 7px;" class="form-control" name="relationship" id="relationship">
														<option>Select relationship</option>
														<?php
														$objLab = new Labs();
														  $rows = $objLab->get_relationships();
														  foreach($rows as $row){
														  $relationship = $row['relationship_name'];
															echo'
															<option>' .$relationship. '</option>';
																				
														  }?>
													</select>
												</div>
												<div class="form-group col-md-6">
													<label class="small mb-1" for="payment_mode">Most preferrable mode of payment</label>
													<select style="padding-top: 7px;" class="form-control" name="payment_mode" id="payment_mode">
														<option>Select mode of payment</option>
														<?php
														$objLab = new Labs();
														  $rows = $objLab->get_pay_modes();
														  foreach($rows as $row){
														  $pay_mode = $row['payment_mode_name'];
															echo'
															<option>' .$pay_mode. '</option>';
																				
														  }?>
													</select>
												</div>
											</div>
											<div class="form-group">
												<label class="small mb-1" for="mobile_money">Registered mobile number</label>
												<input class="form-control" id="mobile_money" type="tel" name="mobile_money" placeholder="Enter the laboratorys registered mobile money number"/>
											</div>
											<div class="form-row">
												<div class="form-group col-md-12 mb-md-0">
													<label class="small mb-1" for="bank_name">Bank Name</label>
													<input class="form-control" id="bank_name" type="text" name="bank_name" placeholder="Enter the laboratorys bank account name"/>
												</div>
												<div class="form-group col-md-12 mb-md-0">
													<label class="small mb-1" for="bank_acc">Bank Account Number</label>
													<input class="form-control" id="bank_acc" type="text" name="bank_acc" placeholder="Enter the laboratorys bank account number" />
													
													<!--Hidden Input for the user id for db normalization-->
													<input type="hidden" name="user_id" value="<?php echo $user; ?>"/>
												</div>
											</div>
											<hr class="my-4" />
											<div class="d-flex justify-content-between">
												<button class="btn btn-light" type="button" name="cancel">Cancel</button>
												<button class="btn btn-primary" type="submit" name="save3">Save</button>
											</div>
											<?php
											if(isset($_POST['save3'])){
												
												//Payment details
												$user_id = $_POST['user_id'];
												$entity_name = $_POST['entity_name'];
												$relationship = $_POST['relationship'];
												$payment_mode = $_POST['payment_mode'];
												$mobile_money = $_POST['mobile_money'];
												$bank_acc = $_POST['bank_acc'];
												$bank_name = $_POST['bank_name'];
												
												$objSave = new Labs;
												$insert3 = $objSave -> insert_lab_details3($user_id,$entity_name,$relationship,$payment_mode,$mobile_money,$bank_acc,$bank_name);
												
											}?>
											
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			</main>
			</div>
		</div>
		
		<?php include 'footer.php'; ?>

        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-pie-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" type="text/javascript"></script>
</body>
</html>
<?php } ?>
