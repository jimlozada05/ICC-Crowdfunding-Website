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
	<link rel="stylesheet" href="css/about_style.css">
</head>

<?php
	require("db/dbconnect.php");
?>
<nav class="navbar">
	<div class="container-fluid">
		<a class="navbar-brand" href="index.php">
			<img src="image/logo.png" alt="ICC LOGO" width="80" height="80">
			Innovative Community Crowdfunding
		</a>
		<ul class="nav justify-content-end">
			<li class="nav-item">
				<a class="nav-link active" aria-current="page" href="#">About Us</a>
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
		<h1>Imagine, Innovate, Realize</h1>
		<br />
		<p>Providing tools and resources for Creative People like you, to realize and create impact in the commnuity</p>
	</div>
</div>

<section>
<h3>Background and Business Concept</h3>
<pre>
	Innovative Community Crowdfunding (ICC) has been established since the start of the 2nd semester of BSIT 3-2 about Technopreneurship. The name of the company was initially created based on partner&apos;s agreement of CEO Brian Albao and CEO Jim Lozada where they have been involved in the IT industry specifically in the crowdfunding business as a startup technopreneurs. The shareholders possess knowledge and skills that is required in the industry. Also, ability to solve any difficulties throughout the process and has a strategic plan that is determined by the market trends and customer demands.
</pre>
<pre>
	Innovative Community Crowdfunding was inspired by the Spark Project of Patrick &quot;Patch&quot; Dulay, Startup Founder and Social Enterprise Enabler. Like the Spark Project, ICC company encourages creativity and innovation as a mission-critical strategy for forward movement and sustainability where the main target for our business are creative entrepreneurs and technopreneurs alike in the Philippines. The difference that we have on other crowdfunding platform is that we don&apos;t have a listing fee, we only takeaway a percentage of the fund they got from the completion. Also, projects that have a &quot;just cause&quot; category is completely free.
</pre>

<br />
<h3>Description of the Business</h3>
<pre>
	The Innovative Community Crowdfunding is a platform and community for those who see entrepreneurship differently. It&apos;s for founders, creatives, and changemakers who are passionate about using their creative talents to build sustainable businesses. It&apos;s for everyone who believes that making conscious choices, no matter how small, when done together can change the world.
</pre>
<pre>
	ICC company involves crowdfunding wherein it is a method of raising capital through the collective effort of friends, family, customers, and individual investors. This approach taps into the collective efforts of a large pool of individuals&ndash;primarily online via social media and crowdfunding platforms&ndash;and leverages their networks for greater reach and exposure. From tapping into a wider investor pool to enjoying more flexible fundraising options, there are several benefits to crowdfunding over traditional methods. Here are just a few of the many possible advantages: reach, presentation, PR & marketing, validation of concept, and efficiency.
</pre>
<pre>
	As a soon to be pioneering crowdfunding player in the Philippines, The Innovative Community Crowdfunding aims on pushing for innovation in their products and services. Through crowdsourcing, we aim to advance impact-driven enterprises and initiatives.
</pre>
<pre>
	<b>Who is Crowdfunding for?</b>
	Crowdfunding is for entrepreneurs, creatives, and changemakers who have projects that they want to spark and turn into a reality. It is also for individuals who are looking to discover something unique and purposeful looking to support creativity and impact by funding promising talent and being part of their journey.
	
	<b>What type of Crowdfunding the Innovative Community Crowdfunding company offers?</b>
	The ICC company offers two types of crowdfunding for project creators:
	
	Donations-based crowdfunding is a type of fund-raising best suited for non-profits and organizations who raise funds for causes such as charity projects and social causes.
	
	Rewards-based crowdfunding is a type of fund-raising catered to entrepreneurs and creatives who are looking to raise funds for their projects or ventures.
	
	<b>Why Crowdfund your project?</b>
	Crowdfunding your projects not only allows you to raise funds for your project, but also allows you to raise awareness about your cause, connect with your audience and build a community around your work.
	
	<b>Why Crowdfund at Innovative Community Crowdfunding?</b>
	The ICC company is a common space for the creative conscious entrepreneurs and changemakers to support and fund each other.
</pre>
<pre>
	On the launch of the business, Innovative Community Crowdfunding aims to be a pioneer in the local crowdfunding scene. Its mission is to become one of the first and longest standing crowdfunding platform that supports creative startups, social enterprises, and foundation for community causes in the Philippines. The ICC company promotes through various initiatives that impacted local communities and Filipinos as a whole. But just like the enterprises that it supported; The Innovative Community Crowdfunding started as a vision to help changemakers make their dreams into a reality.
</pre>

<br/>
<h3>Vision for the Business</h3>
<pre>
	The Innovative Community Crowdfunding company started with crowdfunding and aims to grow and improve for later years to come into becoming a leader in social enterprise development and ecosystem building. Serving many aspiring and emerging founders who are eager to purposefully grow their business also. As a soon to be funding and a founder development platform, the Innovative Community Crowdfunding envisions to support thousands of entrepreneurs, technopreneurs, and changemakers, and worked with top ecosystem enablers in the Philippines and even across Southeast Asia.
	
	Here in ICC, our mission is to promote creative consciousness by enabling entrepreneurs, technopreneurs, and changemakers, and giving them access to tools, resources, and a community that will help them transform their creative and innovative ideas into reality.
</pre>

</section>


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
