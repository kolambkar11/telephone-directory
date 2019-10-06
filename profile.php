<?php
include 'db.php';
session_start();    
    $email = $_SESSION['email'];
	$sqlz="select * from users where email='$email'";
	$result_set=mysqli_query($mysqli,$sqlz);
	$row = mysqli_fetch_array($result_set);
	$fname= $row['name'];
	$lname= $row['email'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Telephone Directory | Welcome <?= $fname; ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="scripts/bootstrap.min.css">
  <script src="scripts/jquery.min.js"></script>
  <script src="scripts/popper.min.js"></script>
  <script src="scripts/bootstrap.min.js"></script>
  <script src="scripts/f5b9b492ec.js" crossorigin="anonymous"></script>


  <style>
	.borders{border:thin solid #ccc;}
	.thin_border{border:thin solid #eee;}
	.fa-star-of-life{font-size:10px;color:#dc3545;}
  </style>
</head>
<body>

<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <a class="navbar-brand" href="#">Telephone Directory </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#"><?php 
		$email= $_SESSION['email']; 
		$sqlz="select * from users where email='$email'";
		$result_set=mysqli_query($mysqli,$sqlz);
		while($row = mysqli_fetch_array($result_set)){
		echo 'Welcome, '.$row['name'];
		}
		?>	</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>    
    </ul>
  </div>  
</nav>
<br>
<div class="container-fluid">
	<h3>Telephone Directory</h3>
	<div class="borders">
		<ul class="nav nav-pills mb-3 nav-justified" id="pills-tab" role="tablist">
		  <li class="nav-item thin_border">
			<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Search</a>
		  </li>
		  <li class="nav-item thin_border">
			<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Add Contact</a>
		  </li>
		  <li class="nav-item thin_border">
			<a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</a>
		  </li>
		</ul>
		<div class="tab-content" id="pills-tabContent">
			<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
				<div class="form-group container-fluid">
					<div class="input-group">
						<input type="text" name="search_text" id="search_text" placeholder="Search Contact " class="form-control" />
					</div>
				</div>
				<div id="result"></div>
  <script>
$(document).ready(function(){
	load_data();
	function load_data(query)
	{
		$.ajax({
			url:"fetch.php",
			method:"post",
			data:{query:query},
			success:function(data)
			{
				$('#result').html(data);
			}
		});
	}
	
	$('#search_text').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
			load_data(search);
		}
		else
		{
			load_data();			
		}
	});
});
</script>
			</div>
		  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
			
			<div class="container-fluid">
			<form method="post" action="addcontact.php" enctype="multipart/form-data">
				<div class="row">
					<div class="col-sm-3">
						<div class="form-group">
						  <label for="usr">First Name <span class="fas fa-star-of-life"></span></label>
						  <input type="text" class="form-control" id="usr" required  placeholder="First Name" name="first_name">
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
						  <label for="usr">Middle Name</label>
						  <input type="text" class="form-control" id="usr" placeholder="Middle Name" name="middle_name">
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
						  <label for="usr">Last Name <span class="fas fa-star-of-life"></span></label>
						  <input type="text" class="form-control" id="usr" required  placeholder="Last Name" name="last_name">
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
						  <label for="usr">Email</label>
						  <input type="email" class="form-control" id="usr" placeholder="Email" name="email" onblur="validateEmail(this);">
						</div>
					</div>
					<script>
						function validateEmail(emailField){
							var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
							if (reg.test(emailField.value) == false){
								alert('Invalid Email Address');return false;
							}return true;}
					</script>
					<div class="col-sm-3">
						<div class="form-group">
						  <label for="usr">Mobile Number <span class="fas fa-star-of-life"></span></label>
						  <input type="tel" class="form-control" id="usr" placeholder="Mobile Number" required name="mobile_number" pattern="\d{10}">
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
						  <label for="usr">Landline Number</label>
						  <input type="tel" class="form-control" id="usr" placeholder="Landline Number" name="landline_number" pattern="\d{3}[\-]\d{3}[\-]\d{5}">
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
						  <label for="usr">Notes</label>
						  <input type="text" class="form-control" id="usr" placeholder="Notes" name="notes">
						</div>
					</div>
					<div class="col-sm-3">
						<label for="usr">Photo</label>
						<div >
							<input type="file" class="" name="photo">
							<!--<label class="custom-file-label" for="customFile">Choose file</label>-->
						</div>
					</div>
					<div class="col-sm-12">
						<div class="form-group">
						  <button type="submit" class="btn btn-primary btn-lg btn-block" name="create_contact">Add Contact</button>
						</div>
					</div>
			</div>
				</form>
			</div>




		  </div>
		  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">Contact</div>
		</div>
	</div>
</div>
</body>
</html>
<!--<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>
-->
<?php
	if(!isset($_SESSION['email']))
	{
		echo '<script >location.href ="index.php" </script>';
	}
 ?>