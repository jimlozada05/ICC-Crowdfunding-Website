<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Innovative Community Crowdfunding</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- BOOTSTRAP CDN-->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<!--CSS-->
	<link rel="stylesheet" href="css/index_style.css">
</head>

<?php
	require("db/dbconnect.php");
?>
<nav class="navbar">
	<div class="container-fluid">
		<a class="navbar-brand" href="#">
			<img src="image/logo.png" alt="ICC LOGO" width="80" height="80">
			Innovative Community Crowdfunding
		</a>
		<ul class="nav justify-content-end">
			<li class="nav-item">
				<a class="nav-link active" aria-current="page" href="about.php">About Us</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="project.php">Projects</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="start_project.php">Create Project</a>
			</li>
			<li class="nav-item">
			<?php 
				if($_SESSION['user_id'] == 0){
					echo '<button type="button" class="btn btn-login" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>';
				}
				else{
					echo '<div class="dropdown">
						<a href="#" onclick="profileDropdown()" class="dropbtn nav-link">'.$_SESSION['username'].'</a>
						<div id="dropdownContent" class="dropdown-content">
							<a href="view_profile.php?user_id='.$_SESSION['user_id'].'">My Profile</a>
							<a href="db/logout.php">Logout</a>
						</div>
					</div>';
				}
			?>
			</li>
		</ul>
	</div>
</nav>

<div class="modal fade" id="loginModal" tabindex="-1">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
		<form onsubmit="loginForm(event)" id="loginForm">
			<div class="modal-header">
				<h5 class="modal-title">Login</h5>
        		<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="message"></div>
				</div>
				
				<div class="row">
					<label class="form-label">Username</label>
					<input class="form-control" type="text" name="username" required>
				</div>
				
				<div class="row">
					<label class="form-label">Password</label>
					<input class="form-control" type="password" name="password" required>
				</div>
				
				<a onclick="RegisterAccount()">No account yet? Register</a>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary">Login</button>
			</div>
		</form>
		</div>
	</div>
</div>



<div class="slogan">
	<div class="container">
		<h1>Let's Innovate Possibilities into Reality</h1>
		<br />
		<p>Grow your projects and increase your impact in the community with funding tools made for the creative and conscious</p>
	</div>
</div>


	<!--JQUERY CDN-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer">		 	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer">	 	</script>
	<!--BOOTSTRAP CDN-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	
<script>
	function RegisterAccount(){
		var registerForm = '<form onsubmit="registerForm(event)" id="registerForm">' +
			'<div class="modal-header">' +
				'<h5 class="modal-title">Register</h5>' +
        		'<button type="button" class="btn-close" data-bs-dismiss="modal"></button>' +
			'</div>' +
			'<div class="modal-body">' +
				'<div class="row">' +
					'<div class="message"></div>' +
				'</div>' +
				
				'<div class="row">' +
					'<label class="form-label">Username</label>' +
					'<input class="form-control" type="text" name="username" required>' +
				'</div>' +
				
				'<div class="row">' +
					'<label class="form-label">Password</label>' +
					'<input class="form-control" type="password" name="password" required>' +
				'</div>' +
				
				'<div class="row">' +
					'<label class="form-label">Email</label>' +
					'<input class="form-control" type="email" name="email" required>' +
				'</div>' +
				
				'<a onclick="LoginAccount()">Already have an account? Login</a>' +
			'</div>' +
			'<div class="modal-footer">' +
				'<button type="submit" class="btn btn-primary">Register</button>' +
			'</div>' +
		'</form>';		
		$("#loginModal > .modal-dialog > .modal-content").html(registerForm);
	}
	
	function LoginAccount(){
		var loginForm = '<form onsubmit="loginForm(event)" id="loginForm">' +
			'<div class="modal-header">' +
				'<h5 class="modal-title">Login</h5>' +
        		'<button type="button" class="btn-close" data-bs-dismiss="modal"></button>' +
			'</div>' +
			'<div class="modal-body">' +
				'<div class="row">' +
					'<div class="message"></div>' +
				'</div>' +
				
				'<div class="row">' +
					'<label class="form-label">Username</label>' +
					'<input class="form-control" type="text" name="username" required>' +
				'</div>' +
				
				'<div class="row">' +
					'<label class="form-label">Password</label>' +
					'<input class="form-control" type="password" name="password" required>' +
				'</div>' +
				
				'<a onclick="RegisterAccount()">No account yet? Register</a>' +
			'</div>' +
			'<div class="modal-footer">' +
				'<button type="submit" class="btn btn-primary">Login</button>' +
			'</div>' +
		'</form>';
		$("#loginModal > .modal-dialog > .modal-content").html(loginForm);
	}
</script>

<script>
function registerForm(e){
	e.preventDefault();
	var datastring = $("#registerForm").serialize();
	$.ajax({
		type: "POST",
		url: "db/register_process.php",
		data: datastring,
		success: function(data){
			if(data == "Username already exist"){
				$(".message").html('<div class="alert alert-danger" role="alert">Username already exist</div>');
			}
			else{
				location.reload();
			}
		}
	});
}

function loginForm(e){
	e.preventDefault();
	var datastring = $("#loginForm").serialize();
	$.ajax({
		type: "POST",
		url: "db/login_process.php",
		data: datastring,
		success: function(data){
			if(data == "Username and Password do not match"){
				$(".message").html('<div class="alert alert-danger" role="alert">Username and Password do not match</div>');
			}
			else{
				location.reload();
			}
		}
	});
}
</script>

<script>
/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function profileDropdown() {
  document.getElementById("dropdownContent").classList.toggle("show");
}
// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>



<?php 
	$conn->close();
?>
<body>
</body>
</html>
