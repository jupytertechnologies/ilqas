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
	$user_id = $_GET['user_id'];
	
	
?>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Requests</title>
        <link href="css/styles.css" rel="stylesheet" />
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
                        <!-- Main page content-->
                        <div class="container mt-4">
                            <!-- Knowledge base home header option-->
                            <div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-4">
                                <div class="mr-4 mb-3 mb-sm-0">
                                    <h1 class="mb-0">Requests</h1>
                                    
                                </div>
                                <!-- Date range picker example button-->
                               
                            </div>
                            <hr class="mt-2 mb-4" />
                            <div class="row">
                                <div class="col-lg-4 mb-4">
                                    <!-- Make request widget -->
                                    <a class="card card-icon lift lift-sm mb-4" href="make_request.php?user_id=<?php echo$user_id; ?>">
                                        <div class="row no-gutters">
                                            <div class="col-auto card-icon-aside bg-teal"><i class="text-white-50" data-feather="book"></i></div>
                                            <div class="col">
                                                <div class="card-body py-5">
                                                    <h5 class="card-title text-teal mb-2">Make Request</h5>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-4 mb-4">
                                    <!-- links to the make_request page where info is collected -->
                                    <a class="card card-icon lift lift-sm mb-4" href="view_request-3.php?user_id=<?php echo$user_id; ?>">
                                        <div class="row no-gutters">
                                            <div class="col-auto card-icon-aside bg-secondary"><i class="text-white-50" data-feather="users"></i></div>
                                            <div class="col">
                                                <div class="card-body py-5">
                                                    <h5 class="card-title text-secondary mb-2">View Request</h5>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-4 mb-4">
                                    <!-- Knowledge base category card 3-->
                                    <a class="card card-icon lift lift-sm mb-4" href="knowledge-base-category.html">
                                        <div class="row no-gutters">
                                            <div class="col-auto card-icon-aside bg-primary"><i class="text-white-50" data-feather="compass"></i></div>
                                            <div class="col">
                                                <div class="card-body py-5">
                                                    <h5 class="card-title text-primary mb-2">PT Scope</h5>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-4 mb-4">
                                    <!-- Knowledge base category card 4-->
                                    <a class="card card-icon lift lift-sm mb-4" href="knowledge-base-category.html">
                                        <div class="row no-gutters">
                                            <div class="col-auto card-icon-aside bg-primary"><i class="text-white-50" data-feather="users"></i></div>
                                            <div class="col">
                                                <div class="card-body py-5">
                                                    <h5 class="card-title text-primary mb-2">View Schedule</h5>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </a>    
                                </div>
                                <div class="col-lg-4 mb-4">
                                <a class="card card-icon lift lift-sm mb-4" href="knowledge-base-category.html">
                                    <div class="row no-gutters">
                                        <div class="col-auto card-icon-aside bg-pink"><i class="text-white-50" data-feather="compass"></i></div>
                                        <div class="col">
                                            <div class="card-body py-5">
                                                <h5 class="card-title text-pink mb-2">Track Pannel</h5>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-4 mb-4">
                                <a class="card card-icon lift lift-sm mb-4" href="knowledge-base-category.html">
                                    <div class="row no-gutters">
                                        <div class="col-auto card-icon-aside bg-cyan"><i class="text-white-50" data-feather="book"></i></div>
                                        <div class="col">
                                            <div class="card-body py-5">
                                                <h5 class="card-title text-cyan mb-2">Tips</h5>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            </div>
                            <!-- Knowledge base rating-->
                            
                        </div>
                    </main>
                    <footer class="footer mt-auto footer-light">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6 small">Copyright &copy; Your Website 2021</div>
                                <div class="col-md-6 text-md-right small">
                                    <a href="#!">Privacy Policy</a>
                                    &middot;
                                    <a href="#!">Terms &amp; Conditions</a>
                                </div>
                            </div>
                        </div>
                    </footer>
                </div>
            
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
<?php } ?>