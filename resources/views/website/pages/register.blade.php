<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>Portal - Bootstrap 5 Admin Dashboard Template For Developers</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">    
    <link rel="shortcut icon" href="favicon.ico"> 
    
    <!-- FontAwesome JS-->
    <script defer src="assets/plugins/fontawesome/js/all.min.js"></script>
    
    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="assets/css/portal.css">

</head> 

<body class="app app-signup p-0 body">    	
    <div class="row g-0 app-auth-wrapper">
	    <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
		    <div class="d-flex flex-column align-content-end">
			    <div class="app-auth-body mx-auto">	
				    <div class="app-auth-branding mb-4"><a class="app-logo" href="index.html"><img class="logo-icon me-2" src="assets/images/app-logo.svg" alt="logo"></a></div>
					<h2 class="auth-heading text-center mb-4">Sign up to Portal</h2>					
	
					<div class="auth-form-container text-start mx-auto">
						<form class="auth-form auth-signup-form" method="post" action="{{ url('store-register') }} " enctype="multipart/form-data">
							{{ csrf_field() }} 
							<div class="email mb-3">
								@if (\Session::has('message'))
									<div class="alert alert-success">
										<strong>{!! \Session::get('message') !!}</strong>
									</div>
								@endif    
							</div>    
							<div class="email mb-3">
								<label class="" for="fname">Full Name</label>
								<input id="fname" name="fname" type="text" class="form-control signup-name" placeholder="Jhon Doe" required="required">
							</div>
							<div class="email mb-3">
								<label class="" for="stdId">Student ID</label>
								<input id="stdId" name="stdId" type="number" class="form-control signup-name" placeholder="1803510201725" required="required">
							</div>
							<div class="email mb-3">
								<label class="" for="email">Your Email</label>
								<input id="email" name="email" type="email" class="form-control signup-email" placeholder="jhon@example.com" required="required">
							</div>
							<div class="email mb-3">
								<label class="" for="dob">Your Birthdate</label>
								<input id="dob" name="dob" type="date" class="form-control signup-email" placeholder="Your Birth Date" required="required">
							</div>
							<div class="email mb-3">
								<label class="" for="picture">Select a profile picture</label>
								<input id="picture" name="filename" type="file" class="form-control signup-name" placeholder="Profile Picture" required="required">
							</div>
							<div class="email mb-3">
								<label class="" for="address">Your Address</label>
								<textarea class="form-control signup-name" name="address" id="address" required="required">Robert Robertson, 1234 NW Bobcat Lane, St. Robert, MO 65584-5678.</textarea>
								
							</div>
							<div class="password mb-3">
								<label class="" for="pass">Password</label>
								<input id="pass" name="pass" type="password" class="form-control signup-password" placeholder="Create a password" required="required">
							</div>
							<div class="confpassword mb-3">
								<label class="" for="pass">Confirm Password</label>
								<input id="confpass" name="confpass" type="password" class="form-control signup-password" placeholder="Create a password" required="required">
							</div>
							
							<div class="email mb-3">
								<label class="" >Select Your Gender</label>
								<div class="d-flex">
									<input class="ml-2 mr-2"  type="radio" name="gender" id="gender" value=male>
									<label for="gender">Male</label>
								</div>
								<div class="d-flex cs" >
									<input class="ml-2 mr-2"  type="radio" name="gender" id="gender2" value=Female>
									<label for="gender2">Female</label>
								</div>
							</div>
							
							<div class="extra mb-3">
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="" id="RememberPassword">
									<label class="form-check-label" for="RememberPassword">
									I agree to Portal's <a href="#" class="app-link">Terms of Service</a> and <a href="#" class="app-link">Privacy Policy</a>.
									</label>
								</div>
							</div><!--//extra-->
							
							<div class="text-center">
								<button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Sign Up</button>
							</div>
						</form><!--//auth-form-->
						
						<div class="auth-option text-center pt-5">Already have an account? <a class="text-link" href="{{url('login')}}" >Log in</a></div>
					</div><!--//auth-form-container-->	
					
					
				    
			    </div><!--//auth-body-->
		    
			    <footer class="app-auth-footer">
				    <div class="container text-center py-3">
				         <!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
			        <small class="copyright">Designed with <span class="sr-only">love</span><i class="fas fa-heart" style="color: #fb866a;"></i> by <a class="app-link" href="http://themes.3rdwavemedia.com" target="_blank">Xiaoying Riley</a> for developers</small>
				       
				    </div>
			    </footer><!--//app-auth-footer-->	
		    </div><!--//flex-column-->   
	    </div><!--//auth-main-col-->
	    <div class="col-12 col-md-5 col-lg-6  auth-background-col">
		    <div class="auth-background-holder">			    
		    </div>
		    <div class="auth-background-mask"></div>
		    <div class="auth-background-overlay p-3 p-lg-5">
			    <div class="d-flex flex-column align-content-end h-100">
				    <div class="h-100"></div>
				    <div class="overlay-content p-3 p-lg-4 rounded">
					    <h5 class="mb-3 overlay-title">Explore Portal Admin Template</h5>
					    <div>Portal is a free Bootstrap 5 admin dashboard template. You can download and view the template license <a href="https://themes.3rdwavemedia.com/bootstrap-templates/admin-dashboard/portal-free-bootstrap-admin-dashboard-template-for-developers/">here</a>.</div>
				    </div>
				</div>
		    </div><!--//auth-background-overlay-->
	    </div><!--//auth-background-col-->
    
    </div><!--//row-->


</body>
</html> 

