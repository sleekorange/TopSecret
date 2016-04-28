

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
	                	switch ($layout) {
	                		case 'fullWidth':
	                			include 'templates/fullWidth.php';
	                			break;
	                		case 'split':
	                			include 'templates/split.php';
	                			break;
	                		case 'fourEight':
	                			include 'templates/fourEight.php';
	                			break;	                		
	                		default:
	                			include 'templates/fullWidth.php';
	                			break;
	                	}
	                ?>
	            </div>
	        </div>

			<div class="border-gfx"></div>
	        <div id="footer">
	            <div class="container">
	                <p>Rate my Pet - Copyright 2016 ©</p>
	            </div>
	        </div>
	        
	    </div>

	    <!-- jQuery (necessary for Bootstraps JavaScript plugins) -->
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
	</body>
</html>