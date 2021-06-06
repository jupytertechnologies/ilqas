<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'includes/lab.php';
include 'includes/users.php';
	$objUser = new User();
	$objLab = new Labs();
//Get user id from JSON http request
if(isset($_GET['user_id'])){
	$user = $_GET['user_id'];
	
	
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
				<?php 
					
					$datas = $objLab->get_lab($user);
					foreach ($datas as $data){
						$name = $data['lab_name'];
						$region = $data['region'];
						$district = $data['district'];
						$level = $data['level'];
						$street = $data['street'];
						$email = $data['email'];
						$phone = $data['phone'];
						$sur_name = $data['sur_name'];
						$last_name = $data['last_name'];
						$position = $data['position'];
						$admin_email = $data['admin_email'];
						$admin_phone = $data['admin_phone'];
						$entity_name = $data['entity_name'];
						$relationship = $data['relationship'];
						$payment_mode = $data['payment_mode'];
						$mobile_money = $data['mobile_money'];
						$bank_acc = $data['bank_acc'];
						$bank_name = $data['bank_name'];
					
					?>
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
										<h5 class="card-title">Your Laboratory Information</h5>
										<form method="POST">
											<div class="form-group">
												<label class="small mb-1" for="lab_name">Laboratory Name (how your laboratory appears to other users on the system):</label><br>
												<label class="small mb-1" for="lab_name"><b><?php echo $name;?></b></label>
												
											</div>
											<div class="form-row">
												<div class="form-group col-md-6">
													<label class="small mb-1" for="regions">Health Region:</label><br>
													<label class="small mb-1" for="regions"><b><?php echo $region; ?></b></label>
												</div>
												<div class="form-group col-md-6">
													<label class="small mb-1" for="levels">Hospital Level:</label><br>
													<label class="small mb-1" for="levels"><b><?php echo $level; ?></b></label>
												</div>
											</div>
											<div class="form-row">
												<div class="form-group col-md-6">
													<label class="small mb-1" for="districts">District:</label><br>
													<label class="small mb-1" for="districts"><b><?php echo $district; ?></b></label>
												</div>
												<div class="form-group col-md-6">
													<label class="small mb-1" for="street">Street Address:</label><br>
													<label class="small mb-1" for="street"><b><?php echo $street; ?></b></label>
												</div>
											</div>
											
											<div class="form-group">
												<label class="small mb-1" for="email">Email address:</label><br>
												<label class="small mb-1" for="email"><b><?php echo $email; ?></b></label>
											</div>
											<div class="form-row">
												<div class="form-group col-md-12 mb-md-0">
													<label class="small mb-1" for="phone">Phone number:</label><br>
													<label class="small mb-1" for="phone"><b><?php echo $phone; ?><b></label>
													
												</div>
											</div>
											
													<!--Hidden Input for the user id for db normalization-->
													<input type="hidden" name="userid" id="userid" value="<?php echo $user; ?>" />
													
											<hr class="my-4" />
											<div class="d-flex justify-content-between">
												<button class="btn btn-light" name="cancel" type="button">Cancel</button>
												<button class="btn btn-danger" name="edit1" type="submit">Edit</button>
											</div>
											<?php
											
											if(isset($_POST['edit1'])){
												echo '<script>
												var user = document.getElementById("userid").value;
												window.location.href ="lab_info_edit.php?user_id=" + user;
												</script>';
											}?>
											
											</form>
									</div>
									</div>
							</div>
							<!-- Wizard tab pane item 2-->
									<div class="tab-pane py-5 py-xl-10 fade" id="wizard2" role="tabpanel" aria-labelledby="wizard2-tab">
										<div class="row justify-content-center">
											<div class="col-xxl-6 col-xl-8">
												<h5 class="card-title">Administrator details</h5>
												<form method="POST">
													<div class="form-row">
														<div class="form-group col-md-6">
															<label class="small mb-1" for="surname">Surname</label><br>
															<label class="small mb-1" for="surname"><b><?php echo $sur_name; ?></b></label>
														</div>
														<div class="form-group col-md-6">
															<label class="small mb-1" for="lastname">Last Name</label><br>
															<label class="small mb-1" for="lastname"><b><?php echo $last_name; ?></b></label>
														</div>
													</div>
													<div class="form-row">
														<div class="form-group col-md-6 mb-4 mb-md-0">
															<label class="small mb-1" for="position">Designation/Position</label><br>
															<label class="small mb-1" for="position"><b><?php echo $position; ?></b></label>
														</div>
														<div class="form-group col-md-6 mb-0">
															<label class="small mb-1" for="admin_phone">Telephone</label><br>
															<label class="small mb-1" for="admin_phone"><b><?php echo $admin_phone; ?></b></label>
														</div>
													</div>
													<div class="form-row">
														<div class="form-group col-md-12 mb-4 mb-md-0">
															<label class="small mb-1" for="admin_email">Email</label><br>
															<label class="small mb-1" for="admin_email"><b><?php echo $admin_email; ?></b></label>
															
															<!--Hidden Input for the user id for db normalization-->
															<input type="hidden" name="user_id" id="userid2" value="<?php echo $user; ?>"/>
															
														</div>
													</div>
													
													<hr class="my-4" />
													<div class="d-flex justify-content-between">
														<button class="btn btn-light" type="button" name="cancel">Cancel</button>
														<button class="btn btn-danger" type="submit" name="edit2">Edit</button>
													<?php 
													
													if(isset($_POST['edit2'])){
														echo '<script>
														var user = document.getElementById("userid2").value;
														window.location.href ="lab_info_edit.php?user_id=" + user;
														</script>';
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
												<label class="small mb-1" for="entity_name">Name of Entity to be paid</label><br>
												<label class="small mb-1" for="entity_name"><b><?php echo $entity_name; ?></b></label>
											</div>
											<div class="form-row">
												<div class="form-group col-md-6">
													<label class="small mb-1" for="relationship">Relationship with the laboratory</label></br>
													<label class="small mb-1" for="relationship"><b><?php echo $relationship; ?></b></label>
												</div>
												<div class="form-group col-md-6">
													<label class="small mb-1" for="payment_mode">Most preferrable mode of payment</label><br>
													<label class="small mb-1" for="payment_mode"><b><?php echo $payment_mode; ?></b></label>
												</div>
											</div>
											<div class="form-group">
												<label class="small mb-1" for="mobile_money">Registered mobile number</label><br>
												<label class="small mb-1" for="mobile_money"><b><?php echo $mobile_money; ?><b></label>
											</div>
											<div class="form-row">
												<div class="form-group col-md-12 mb-md-0">
													<label class="small mb-1" for="bank_name">Bank Name</label><br>
													<label class="small mb-1" for="bank_name"><b><?php echo $bank_name; ?></b></label>
												</div>
												<div class="form-group col-md-12 mb-md-0">
													<label class="small mb-1" for="bank_acc">Bank Account Number</label><br>
													<label class="small mb-1" for="bank_acc"><b><?php echo $bank_acc; ?></b></label>
																									
													<!--Hidden Input for the user id for db normalization-->
													<input type="hidden" name="user_id" id="userid3" value="<?php echo $user; ?>"/>
												</div>
											</div>
											<hr class="my-4" />
											<div class="d-flex justify-content-between">
												<button class="btn btn-light" type="button" name="cancel">Cancel</button>
												<button class="btn btn-danger" type="submit" name="edit3">Edit</button>
											</div>
											<?php
											if(isset($_POST['edit3'])){
												echo '<script>
												var user = document.getElementById("userid3").value;
												window.location.href ="lab_info_edit.php?user_id=" + user;
												</script>';
											}?>
											
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
	<?php } ?>
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
