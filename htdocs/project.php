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
	<link rel="stylesheet" href="css/project_style.css">
</head>

<?php
	require("db/dbconnect.php");
	require("db/select_project.php");
	
	$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
	$url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	// Use parse_url() function to parse the URL 
	// and return an associative array which
	// contains its various components
	$url_components = parse_url($url);
	// Use parse_str() function to parse the
	// string passed via URL
	//echo $url_components['query'];
	
	if(!isset($url_components['query'])){
		//Add the parameters to the URL
		header('Location: '.$url.'?type=Both&category=Recommended&status=Both&page=1');
	}
	else{
		parse_str($url_components['query'], $params);
	}
?>
<nav class="navbar">
	<div class="container-fluid">
		<a class="navbar-brand" href="index.php">
			<img src="image/logo.png" alt="ICC LOGO" width="80" height="80">
			Innovative Community Crowdfunding
		</a>
		<ul class="nav justify-content-end">
			<li class="nav-item">
				<a class="nav-link active" aria-current="page" href="about.php">About Us</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">Projects</a>
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

<section>
	<h3>Discover Projects</h3>
	<div class="filter">
		<label class="form-label">Type: </label>&nbsp;
		<select class="form-select" id="type_select">
			<?php $new_url = $protocol . $_SERVER['HTTP_HOST'] . parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
				if($params['type'] == "Both"){
					echo '<option selected>Both</option>'; }
				else{ 
					echo '<option value="'.$new_url.'?type=Both&category='.$params['category'].'&status='.$params['status'].'&page=1">Both</option>'; }
					
				if($params['type'] == "Donation"){
					echo '<option selected>Donation</option>'; }
				else{ 
					echo '<option value="'.$new_url.'?type=Donation&category='.$params['category'].'&status='.$params['status'].'&page=1">Donation</option>'; }
				
				if($params['type'] == "Reward"){
					echo '<option selected>Reward</option>';}
				else{
					echo '<option value="'.$new_url.'?type=Reward&category='.$params['category'].'&status='.$params['status'].'&page=1">Reward</option>';}
			?>
			
		</select>&emsp;
		
		<label class="form-label">Category: </label>&nbsp;
		<select class="form-select" id="category_select">
			<?php 
				if($params['category'] == "Recommended"){
					echo '<option selected>Recommended</option>';}
				else{
					echo '<option value="'.$new_url.'?type='.$params['type'].'&category=Recommended&status='.$params['status'].'&page=1">Recommended</option>';}
				
				if($params['category'] == "Causes and Community"){
					echo '<option selected>Causes and Community</option>';}
				else{
					echo '<option value="'.$new_url.'?type='.$params['type'].'&category=Causes and Community&status='.$params['status'].'&page=1">Causes and Community</option>';}
					
				if($params['category'] == "Startup Business"){
					echo '<option selected>Startup Business</option>';}
				else{
					echo '<option value="'.$new_url.'?type='.$params['type'].'&category=Startup Business&status='.$params['status'].'&page=1">Startup Business</option>';}
					
				if($params['category'] == "Games and Application"){
					echo '<option selected>Games and Application</option>';}
				else{
					echo '<option value="'.$new_url.'?type='.$params['type'].'&category=Games and Application&status='.$params['status'].'&page=1">Games and Application</option>';}
					
				if($params['category'] == "Music and Film"){
					echo '<option selected>Music and Film</option>';}
				else{
					echo '<option value="'.$new_url.'?type='.$params['type'].'&category=Music and Film&status='.$params['status'].'&page=1">Music and Film</option>';}
					
				if($params['category'] == "Creative Project"){
					echo '<option selected>Creative Project</option>';}
				else{
					echo '<option value="'.$new_url.'?type='.$params['type'].'&category=Creative Project&status='.$params['status'].'&page=1">Creative Project</option>';}
					
				if($params['category'] == "Design and Innovation"){
					echo '<option selected>Design and Innovation</option>';}
				else{
					echo '<option value="'.$new_url.'?type='.$params['type'].'&category=Design and Innovation&status='.$params['status'].'&page=1">Design and Innovation</option>';}
					
				if($params['category'] == "Food and Beverage"){
					echo '<option selected>Food and Beverage</option>';}
				else{
					echo '<option value="'.$new_url.'?type='.$params['type'].'&category=Food and Beverage&status='.$params['status'].'&page=1">Food and Beverage</option>';}
					
				if($params['category'] == "Heritage and Culture"){
					echo '<option selected>Heritage and Culture</option>';}
				else{
					echo '<option value="'.$new_url.'?type='.$params['type'].'&category=Heritage and Culture&status='.$params['status'].'&page=1">Heritage and Culture</option>';}
			?>
		</select>&emsp;
		
		<label class="form-label">Status: </label>&nbsp;
		<select class="form-select" id="status_select">
			<?php
				if($params['status'] == "Both"){
					echo '<option selected>Both</option>';}
				else{
					echo '<option value="'.$new_url.'?type='.$params['type'].'&category='.$params['category'].'&status=Both&page=1">Both</option>';}
					
				if($params['status'] == "Ongoing"){
					echo '<option selected>Ongoing</option>';}
				else{
					echo '<option value="'.$new_url.'?type='.$params['type'].'&category='.$params['category'].'&status=Ongoing&page=1">Ongoing</option>';}
				
				if($params['status'] == "Completed"){
					echo '<option selected>Completed</option>';}
				else{
					echo '<option value="'.$new_url.'?type='.$params['type'].'&category='.$params['category'].'&status=Completed&page=1">Completed</option>';}
			?>
		</select>&emsp;
	</div>
	
	
	
	<div class="row row-cols-1 row-cols-md-3 g-4">
	<?php 
	if($params['category'] == "Recommended"){
		$result = getRecommendedRecord($params['type'], $params['status'], $params['page']);
	}
	else{
		$result = getCategoryRecord($params['type'], $params['category'], $params['status'], $params['page']);
	}
	while($row = $result->fetch_assoc()) {
	?>
		<div class="col">
			<div class="card h-100" onclick="location.href='view_project.php?project_id=<?php echo $row['project_id'];?>'">
				<?php echo '<img class="card-img-top" alt="'.$row['title'].'" src="data:image/jpeg;base64,'.base64_encode($row['image']) .'" />'; ?>
			<div class="card-body">
				<h5 class="card-title"><?php echo $row['title'];?></h5>
				<p class="card-text"><?php echo $row['introduction'];?></p>
			</div>
			<div class="card-footer">
				<small class="text-muted"><?php echo $row['current_fund'] . ' / ' . $row['goal_fund'];?></small>
				<div class="progress">
					<div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $row['percent'];?>%" aria-valuenow="<?php echo $row['percent'];?>" aria-valuemin="0" aria-valuemax="100"></div>
				</div>
			</div>
			</div>
		</div>
	<?php
	}
	?>
	</div>

<nav aria-label="Page navigation example">
	<ul class="pagination justify-content-end">
	<?php
	$result = getPaggingCount($params['type'], $params['category'], $params['status']);
	$row = $result->fetch_assoc();
	
	$new_url = $protocol . $_SERVER['HTTP_HOST'] . parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
	if($row['num_page'] != '0'){
		for($counter = $params['page']-1; $counter <= $params['page']+1; $counter++){
			if($counter != 0){
				echo '<li class="page-item"><a class="page-link" href="'.$new_url.'?type='.$params['type'].'&category='.$params['category'].'&status='.$params['status'].'&page='.$counter.'">'.$counter.'</a></li>';
				if($counter == $row['num_page']){
					break;
				}
			}
		}
	}
	?>
	</ul>
</nav>			
	
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

<script>
	$(function(){
      // bind change event to select
      $('#type_select').on('change', function () {
          var url = $(this).val(); // get selected value
          if (url) { // require a URL
              window.location = url; // redirect
          }
          return false;
      });
    });
	
	$(function(){
      // bind change event to select
      $('#category_select').on('change', function () {
          var url = $(this).val(); // get selected value
          if (url) { // require a URL
              window.location = url; // redirect
          }
          return false;
      });
    });
	
	$(function(){
      // bind change event to select
      $('#status_select').on('change', function () {
          var url = $(this).val(); // get selected value
          if (url) { // require a URL
              window.location = url; // redirect
          }
          return false;
      });
    });
</script>



<?php 
	$conn->close();
?>
<body>
</body>
</html>
