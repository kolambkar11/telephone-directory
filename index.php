<!DOCTYPE html>
<html lang="en">
<head>
  <title>Telephone Directory</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="scripts/bootstrap.min.css">
  <script src="scripts/jquery.min.js"></script>
  <script src="scripts/popper.min.js"></script>
  <script src="scripts/bootstrap.min.js"></script>
  <script src="scripts/f5b9b492ec.js" crossorigin="anonymous"></script>
  <style>
  .borders{border:2px solid #ccc;padding:10px;border-radius:10px;}
  </style>
</head>
<body>
<div class="jumbotron text-center">
	<h1>Telephone Directory</h1>
	<p>Save Contacts!</p>
</div>  
<div class="container">
	<div class="borders">
		<div class="row text-center">
			<div class="col-sm-6 col-xs-12 mb-2">
				<button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#registration">Register</button>
			</div>
			<div class="col-sm-6 col-xs-12">
				<button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#login">Login</button>
			</div>
		</div>
	</div>
</div>
<!--this is for registration-->
<div class="modal fade" id="registration">
	<div class="modal-dialog modal-lg">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Register</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
			<form method="post" action="register.php">
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
						  <label for="usr">Name:</label>
						  <input type="text" class="form-control" id="usr" placeholder="Name" name="fullname">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
						  <label for="usr">Email Address:</label>
						  <input type="email" class="form-control" id="usr" placeholder="Email Address" name="email">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
						  <label for="usr">Contact Number:</label>
						  <input type="text" class="form-control" id="usr" placeholder="Contact Number" name="cnum">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
						  <label for="pwd">Password:</label>
						  <input type="password" class="form-control" id="pwd" placeholder="Password" name="pass">
						</div>
					</div>
					<div class="col-sm-12">
					<button type="submit" name="register_btn" class="btn btn-secondary col-sm-12" >Register</button>
					</div>
				</div>
			</form>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>

        </div>
	</div>
</div>
<div class="modal fade" id="login">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Login</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
			<form method="post" action="login.php">
				<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
					  <label for="usr">Email Address:</label>
					  <input type="text" class="form-control" id="usr" name="email">
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
					  <label for="pwd">Password:</label>
					  <input type="password" class="form-control" id="pwd" name="password">
					</div>
				</div>
				<div class="col-sm-12">
					<button type="submit" class="btn btn-secondary col-sm-12" name="login_btn">Login</button>
				</div>
				</div>
			</form>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>

        </div>
      </div>
    </div>
</body>
</html>
