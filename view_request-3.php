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
	
	
if(isset($_GET['user_id'])){
	$user_id = $_GET['user_id'];
	$datas = $objLab->get_lab_name($user_id);
	foreach($datas as $data){
		$lab_name = $data['lab_name'];
		$level = $data['level'];
	}
	
?>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>View requests</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />
        <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" crossorigin="anonymous"></script>
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
                                            <div class="page-header-icon"><i data-feather="filter"></i></div>
                                            Requests
                                        </h1>
                                        <div class="page-header-subtitle">View all your requests here:</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </header>
                    <!-- Main page content-->
                    <div class="container mt-n10">
                        <div class="card mb-4">
                            <div class="card-header"><?php echo $lab_name; echo ' '; echo $level; echo ' '; echo 'Laboratory Requests';?></div>
                            <div class="card-body">
                                <div class="datatable">
                                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
												<th style="vertical-align:top">Invoice No</th>
                                                <th style="vertical-align:top">Date</th>
                                                <th style="vertical-align:top">Parameters</th>
                                                <th style="vertical-align:top">Total Amount</th>
												<th style="vertical-align:top">Parameter Details</th>
												<th style="vertical-align:top">Pay Invoice</th>
                                                <th style="vertical-align:top">Payment</th>
                                                <th style="vertical-align:top">Status</th>
                                                <th style="vertical-align:top">Cancel</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
										<?php
										$get_invoice = $objRequest->get_invoice($user_id);
										if(is_null($get_invoice)){
											echo'
												<tr>
                                                <td>_</td>
                                                <td>_</td>
                                                <td>_</td>
                                                <td>_</td>
                                                <td>_</td>
                                                <td>_</td>
												<td>_</td>
                                                <td><div class="badge badge-warning badge-pill">No request yet</div></td>
                                                <td>
                                                    <button class="btn btn-datatable btn-icon btn-transparent-dark"><i data-feather="trash-2"></i></button>
                                                </td>
                                            </tr>
											';
										}else{
											foreach($get_invoice as $row){
												$invoice_no = $row['invoice_id'];
												$parameter_count = $row['parameter_count'];
												$invoice_details = $row['invoice_details'];
												//Decode text string back into array and get all parameter details in the array
												$array = json_decode($invoice_details, true);
												
												$invoice_amount = $row['invoice_amount'];
												$invoice_date = $row['invoice_date'];
												$pay_status_id = $row['payment_status'];
												$status_id = $row['panel_status'];
												//Get the status name based on status id
												$status_name = $objRequest->get_panel_status($status_id);
												//Get the payment status based on payment status id
												$pay_status = $objRequest->get_payment_status($pay_status_id);
												
												
												echo'
												<tr>
													<td>'.$invoice_no.'</td>
													<td>'.$invoice_date.'</td>
													<td>'.$parameter_count.' Parameters</td>
													<td>'.number_format($invoice_amount).'</td>
													<td>';?><?php
													foreach($array as $data){
													$parameter_name = $data['parameter_name'];
													echo $parameter_name .", ";
													}
													?><?php echo'</td>';
													switch($pay_status){
														case 'Paid':
															echo'<td><a href="view_invoice.php?invoice_id='.$invoice_no.'"><div class="badge badge-success">View Invoice</div></a></td>';
														break;
														default:
															echo'<td><a href="view_invoice.php?invoice_id='.$invoice_no.'"><div class="badge badge-primary">Pay Invoice</div></a></td>';
														break;
													}
													
													
													//Change pill colors based on whether the user paid or not
													switch($pay_status){
														case 'Paid':
															echo'<td><div class="badge badge-success badge-pill">'.$pay_status.'</div></td>';
														break;
														default:
															echo'<td><div class="badge badge-danger badge-pill">'.$pay_status.'</div></td>';
														break;
													}
													
													//Change pill colors based on whether the request has been accepted or rejected by accredited laboratories, pending, or canceled
													switch($status_name){
														case 'Pending':
															echo'<td><div class="badge badge-warning badge-pill">'.$status_name.'</div></td>';
														break;
														case 'Accepted':
															echo'<td><div class="badge badge-success badge-pill">'.$status_name.'</div></td>';
														break;
														case 'Rejected':
															echo'<td><div class="badge badge-danger badge-pill">'.$status_name.'</div></td>';
														break;
														default:
															echo'<td><div class="badge badge-dark badge-pill">'.$status_name.'</div></td>';
														break;
													}
													echo
													'<td>
														<form method="post" enctype="multipart/form-data">
															<input type="hidden" name="invoice_id" value="'.$invoice_no.'"/>
															<input type="hidden" name="user_id" value="'.$user_id.'"/>
															<center><button name="cancel" type="submit" class="btn btn-datatable btn-icon btn-transparent-dark"><i data-feather="trash-2"></i></button></center>';
															if(isset($_POST['cancel'])){
																$invoice_id = $_POST['invoice_id'];
																$user_id = $_POST['user_id'];
																$cancel = $objRequest->cancel_invoice($invoice_id,$user_id);
															}
														'<form
													</td>
												</tr>
												';
											}
											
										}
										?>
                                        </tbody>
                                    </table>
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
        <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    </body>
</html>
<?php } ?>