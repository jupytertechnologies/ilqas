<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include ("includes/users.php");
?>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Register</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />
        <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <!-- Basic registration form-->
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header justify-content-center"><h3 class="font-weight-light my-4">Create Account</h3></div>
                                    <div class="card-body">
                                        <!-- Registration form-->
                                        <form method="POST" enctype = "multipart/form-data">
                                            <!-- Form Row-->
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <!-- Form Group (first name)-->
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputFirstName">First Name</label>
                                                        <input class="form-control" id="inputFirstName" type="text" name="first_name" placeholder="Enter first name" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <!-- Form Group (last name)-->
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputLastName">Last Name</label>
                                                        <input class="form-control" id="inputLastName" type="text" name="last_name" placeholder="Enter last name" />
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Form Group (email address) -->
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                                <input class="form-control" id="inputEmailAddress" type="email" name="email" aria-describedby="emailHelp" placeholder="Enter email address" />
                                            </div>
                                            <!-- Form Row    -->
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <!-- Form Group (password)-->
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputPassword">Password</label>
                                                        <input class="form-control" id="inputPassword" type="password" name="password_1" placeholder="Enter password" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <!-- Form Group (confirm password)-->
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputConfirmPassword">Confirm Password</label>
                                                        <input class="form-control" id="inputConfirmPassword" type="password" name="password" placeholder="Confirm password" />
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-row">
												<!-- Form Group (Is lab accredited?)-->
												<div class="col-md-4">
													<div class="form-group">
														<label class="small mb-1" for="inputEmailAddress">Is your laboratory accredited? </label>
													</div>
												</div>
												<div class="col-md-8">
													<div class="form-group">
														<div class="form-check">
														  <input class="form-check-input" type="radio" name="no" id="exampleRadios2">
														  <label class="form-check-label" for="exampleRadios2">
															No
														  </label>
														</div>
														<div class="form-check">
														  <input class="form-check-input" type="radio" name="yes" id="exampleRadios1">
														  <label class="form-check-label" for="exampleRadios1">
															Yes
														  </label>
														</div>
													</div>
												</div>
											</div>
                                            <!-- Form Group (create account submit)-->
                                            <div class="form-group mt-4 mb-0">
												<button class="btn btn-primary btn-block" type = "submit" name="register" value="register">Create Account</button>
												<?php
												//Insert the form data into the users db
												if(isset($_POST['register'])){
													$first_name = $_POST['first_name'];
													$last_name = $_POST['last_name'];
													$email = $_POST['email'];
													$password = $_POST['password'];
													if(isset($_POST['yes'])){
														$lab_accredited = 1; 
													}if(isset($_POST['no'])){
														$lab_accredited = 2;
													}
													
													$objUser = new User();
													$register = $objUser->register($first_name,$last_name,$email,$password,$lab_accredited);
												}
												?>
											</div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="auth-login-social.html">Have an account? Go to login</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="footer mt-auto footer-dark">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 small">Copyright &copy; www.ilqas.com 2021</div>
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
