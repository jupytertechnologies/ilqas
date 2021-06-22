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
	
	
if(isset($_GET['invoice_id'])){
	$invoice_id = $_GET['invoice_id'];
	
	//Get invoice details by id
	$invoice_datas = $objRequest->get_invoice_by_id($invoice_id);
	
	foreach($invoice_datas as $row){
		$invoice_id = $row['invoice_id'];
		$user_id = $row['user_id'];
		$parameter_count = $row['parameter_count'];
		$invoice_details = $row['invoice_details'];
		$sub_total = $row['invoice_amount'];
		$invoice_date = $row['invoice_date'];
		$payment_status = $row['payment_status'];
		$vat = $sub_total*0.18;
		$total_amount_due = $sub_total + $vat;
	
	
	$lab_datas = $objLab->get_lab_name($user_id);
	foreach($lab_datas as $data){
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
        <title>Invoice</title>
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
                    <!-- Main page content-->
                    <div class="container mt-4">
                        <!-- Invoice-->
                        <div class="card invoice">
                            <div class="card-header p-4 p-md-5 border-bottom-0 bg-gradient-primary-to-secondary text-white-50">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-12 col-lg-auto mb-5 mb-lg-0 text-center text-lg-left">
                                        <!-- Invoice branding-->
                                        <img class="invoice-brand-img rounded-circle mb-4" src="img/logo.png" alt="" />
                                        <div class="h2 text-white mb-0">ILQAS</div>
                                        Enjoy the world's largest Inter-Laboratory Quality Assessment Scheme
                                    </div>
                                    <div class="col-12 col-lg-auto text-center text-lg-right">
                                        <!-- Invoice details-->
                                        <div class="h3 text-white">Invoice</div>
                                        #<?php echo $invoice_id; ?>
                                        <br />
                                        <?php echo $invoice_date; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-4 p-md-5">
                                <!-- Invoice table-->
                                <div class="table-responsive">
                                    <table class="table table-borderless mb-0">
                                        <thead class="border-bottom">
                                            <tr class="small text-uppercase text-muted">
                                                <th scope="col">Parameter Description</th>
                                                <th class="text-right" scope="col">Frequency</th>
                                                <th class="text-right" scope="col">Rate</th>
                                                <th class="text-right" scope="col">Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
											<?php
											//Covert invoice details text object back into an array
											$details_array = json_decode($invoice_details, true);
											
											foreach($details_array as $item){
												$category_name = $item['category_name'];
												$parameter_name = $item['parameter_name'];
												$frequency = $item['frequency'];
												$cost = $item['cost'];
												$amount = $item['amount'];
												
												
												
											//Invoice item 
											echo'
                                            <tr class="border-bottom">
                                                <td>
                                                    <div class="font-weight-bold">'.$category_name.'</div>
                                                    <div class="small text-muted d-none d-md-block">'.$parameter_name.'</div>
                                                </td>
                                                <td class="text-right font-weight-bold">'.$frequency.' times</td>
                                                <td class="text-right font-weight-bold">'.$cost.'</td>
                                                <td class="text-right font-weight-bold">'.number_format($amount).'</td>
                                            </tr>';
											}
                                            ?>
                                            <!-- Invoice subtotal-->
                                            <tr>
                                                <td class="text-right pb-0" colspan="3"><div class="text-uppercase small font-weight-700 text-muted">Subtotal:</div></td>
                                                <td class="text-right pb-0"><div class="h5 mb-0 font-weight-700"><?php echo number_format($sub_total); ?> </div></td>
                                            </tr>
                                            <!-- Invoice tax column-->
                                            <tr>
                                                <td class="text-right pb-0" colspan="3"><div class="text-uppercase small font-weight-700 text-muted">VAT (18%):</div></td>
                                                <td class="text-right pb-0"><div class="h5 mb-0 font-weight-700"><?php echo number_format($vat); ?> </div></td>
                                            </tr>
                                            <!-- Invoice total-->
                                            <tr>
											<?php 
											switch($payment_status){
												case '1':
													echo'<td class="text-right pb-0" colspan="3"><div class="text-uppercase small font-weight-700 text-muted">Total Amount Paid:</div></td>
													<td class="text-right pb-0"><div class="h5 mb-0 font-weight-700 text-green">'.number_format($total_amount_due).'</div></td>';
												break;
												case '2':
													echo'<td class="text-right pb-0" colspan="3"><div class="text-uppercase small font-weight-700 text-muted">Total Amount Due:</div></td>
													<td class="text-right pb-0"><div class="h5 mb-0 font-weight-700 text-red">'.number_format($total_amount_due).'</div></td>';
												break;
											}
											?>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer p-4 p-lg-5 border-top-0">
							<?php
							//Get Laboratory Details
							$datas = $objLab->get_lab($user_id);
							foreach($datas as $row){
								$lab_name = $row['lab_name'];
								$level = $row['level'];
								$street = $row['street'];
								$district = $row['district'];
								$phone = $row['phone'];
								$email = $row['email'];
								
							}
							
							?>
                                <div class="row">
                                    <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                                        <!-- Invoice - sent to info-->
                                        <div class="small text-muted text-uppercase font-weight-700 mb-2">To</div>
                                        <div class="h6 mb-1"><?php echo $lab_name; ?></div>
										<div class="small"><?php echo $level; echo " Laboratory"; ?></div>
                                        <div class="small"><?php echo $street; echo ", "; echo $district; ?></div>
                                        <div class="small"><?php echo $phone; echo ", "; echo $email; ?></div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                                        <!-- Invoice - sent from info-->
                                        <div class="small text-muted text-uppercase font-weight-700 mb-2">From</div>
                                        <div class="h6 mb-0">ILQAS</div>
                                        <div class="small">Tel: +256 705 244266</div>
                                        <div class="small">Email: support@ilqas.com</div>
                                    </div>
                                    <div class="col-lg-6">
                                        <!-- Invoice - additional notes-->
                                        <div class="small text-muted text-uppercase font-weight-700 mb-2">Note</div>
                                        <div class="small mb-0">100% payment is due immediately after submission of the request for PT Panels. Please use our online payment option or mobilemoney payment on +256 705 244266. We appreciate your business, and hope to be working with you again very soon!</div>
                                    </div>
                                </div>
                            </div>
							<div class="sbp-preview-text">
							<div class="d-flex justify-content-between">
								<a class="btn btn-secondary rounded-pill px-4 mr-8 my-1" href="view_request-3.php?user_id=<?php echo $user_id; ?>">Back</a>
								<button class="btn btn-success rounded-pill px-4 mr-8 my-1" onClick="window.print()">Print</button>
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
		
    </body>
</html>
<?php }} ?>