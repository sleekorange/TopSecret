<?php 
	require_once 'functions/token.php';
	$token = setToken();
?>

<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $title ?></title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css" />
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	    <link rel="stylesheet" type="text/css" href="css/style.css">

	    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,600,700" rel="stylesheet" type="text/css">
	</head>
	<body>		
	    <div id="wrapper">
	    	<div id="loginBar">
		    	<div class="container">
		    	<?php 
		    	$obj = new user();
		    	if($obj->checkSession()){
		    		echo 'Welcome, '.urlencode($obj->getUserNameSession());
		    		echo '<button data-toggle="modal" data-target="#myChange">Change info</button>    ';
		    		echo '<button id="logOutBtn">Log Out</button>';
		    		if($obj->getUserLevel() == 1){
		    			echo '    IM ADMIN! YEAH!';
		    		}
		    	} else {
		    		echo '<button data-toggle="modal" data-target="#myLogin">Login</button>    ';
		    		echo '<button data-toggle="modal" data-target="#myRegister">Register</button>';
		    	}


		    	?>
		    	
		    	</div>
	    	</div>
	        <div id="top">
	            <div class="container">
	                <div class="row">
	                    <div class="col-sm-6">
	                        <img src="images/logo.png" />
	                    </div>
	                </div>
	            </div>
	        </div>
	        <div id="banner">
	        	<div id="overlay">
	        	</div>
	        </div>
	        <div id="content">
	            <div class="container">	

	                <?php  
	                include 'templates/'.$layout.'.php';
	                	// switch ($layout) {
	                	// 	case 'fullWidth':
	                	// 		include 'templates/'.$layout.'.php';
	                	// 		break;
	                	// 	case 'split':
	                	// 		include 'templates/split.php';
	                	// 		break;
	                	// 	case 'fourEight':
	                	// 		include 'templates/fourEight.php';
	                	// 		break;
	                	// 	case 'blogPost':
	                	// 		include 'templates/blogPost.php';
	                	// 		break;		                		
	                	// 	default:
	                	// 		include 'templates/fullWidth.php';
	                	// 		break;
	                	// }
	                ?>
	            </div>
	        </div>

			<div class="border-gfx"></div>
	        <div id="footer">
	            <div class="container">
	                <p>Rate my Pet - Copyright 2016 ©</p>
	            </div>
	        </div>

	        <!-- Login Modal -->
			<div class="modal fade" id="myLogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h4 class="modal-title" id="myModalLabel">Login</h4>
			      </div>
			      <div class="modal-body">
			          	<form id="ajaxLoginForm" method="POST" action="functions/functions.php">
			          		<input type="hidden" name="function" value="logIn">
							<input type="text" placeholder="username" name="username">
							<input type="text" placeholder="password" name="password">
							<input type="hidden" value="<?php echo $token ?>" name="token">
							<button type="submit" data-id="ajaxLoginForm">Login</button>
					  	</form>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      </div>
			    </div>
			  </div>
			</div>

			<!-- Register Modal -->
			<div class="modal fade" id="myRegister" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h4 class="modal-title" id="myModalLabel">Register</h4>
			      </div>
			      <div class="modal-body">
				  	<form id="ajaxRegisterForm" method="POST" action="functions/functions.php">
				  		<input type="hidden" name="function" value="register">
				  		<input type="text" placeholder="username" name="username"></input>
				  		<input type="password" placeholder="password" name="password">
				  		<input type="text" placeholder="email" name="email">
				  		<input type="number" placeholder="phone" name="phone">
				  		<input type="text" placeholder="First Name" name="firstName">
				  		<input type="text" placeholder="Last Name" name="lastName">
				  		<input type="hidden" value="<?php echo $token ?>" name="token">
						<button type="submit" data-id="ajaxRegisterForm">Register</button>
				  	</form>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      </div>
			    </div>
			  </div>
			</div>

			<!-- Change Modal -->
			<div class="modal fade" id="myChange" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h4 class="modal-title" id="myModalLabel">Change my info</h4>
			      </div>
			      <div class="modal-body">
				  	<form>
				  		<label>Password</label>
				  		<input type="checkbox" class="changeInfoCheck" id="passwordCheck" value="passwordCheck">
				  		<label>First Name</label>
				  		<input type="checkbox" class="changeInfoCheck" id="firstNameCheck" value="firstNameCheck">
				  		<label>Last Name</label>
				  		<input type="checkbox" class="changeInfoCheck" id="lastNameCheck" value="lastNameCheck">
				  		<label>Phone</label>
				  		<input type="checkbox" class="changeInfoCheck" id="phoneCheck" value="phoneCheck">
					</form>

						<form class="changeInfoForm" id="passwordForm" method="POST" action="functions/functions.php" style="display:none">
							<input type="hidden" name="function" value="changeInfo">
							<label for="oldPassword">Old password</label>
							<input type="text" name="oldPassword">
							<label for="password">Password</label>
							<input type="text" name="password">
							<input type="hidden" name="action" value="password">
							<input type="hidden" value="<?php echo $token ?>" name="token">
							<button type="submit" data-id="passwordForm">Change password</button>
						</form>
						<form class="changeInfoForm" id="firstNameForm" method="POST" action="functions/functions.php" style="display:none">
							<input type="hidden" name="function" value="changeInfo">
							<input type="text" name="firstName">
							<input type="hidden" name="action" value="firstName">
							<input type="hidden" value="<?php echo $token ?>" name="token">
							<button type="submit" data-id="firstNameForm">Change first name</button>
						</form>
						<form class="changeInfoForm" id="lastNameForm" method="POST" action="functions/functions.php" style="display:none">
							<input type="hidden" name="function" value="changeInfo">
							<input type="text" name="lastName">
							<input type="hidden" name="action" value="lastName">
							<input type="hidden" value="<?php echo $token ?>" name="token">
							<button type="submit" data-id="lastNameForm">Change lastname</button>
						</form>
						<form class="changeInfoForm" id="phoneForm" method="POST" action="functions/functions.php" style="display:none">
							<input type="hidden" name="function" value="changeInfo">
							<input type="number" name="phone">
							<input type="hidden" name="action" value="phone">
							<input type="hidden" value="<?php echo $token ?>" name="token">
							<button type="submit" data-id="phoneForm">Change Phone</button>
						</form>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      </div>
			    </div>
			  </div>
			</div>
	        
	    </div>

	    <!-- jQuery (necessary for Bootstraps JavaScript plugins) -->
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script> -->
	    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	    <script src="js/scripts.js"></script>
	</body>
</html>