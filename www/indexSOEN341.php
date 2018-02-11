
	<?php

	$servername = "50.62.177.112";
	$username = "heapflow";
	$password = "hSLvk6YL6";
	$dbname = "heapflowsoen341";

	$conn = mysqli_connect($servername, $username, $password, $dbname);

	// Checking connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}
	echo "Connected successfully";

	$questionQuery = "SELECT * FROM `Question`";
	$result = $conn->query($questionQuery);
	$questionResults = mysqli_fetch_all($result);

	$htmlHomeFeed = "";

	//grabbing each question's data and displaying
	foreach($questionResults as $key=>$value){

		//second lookup for user NAMES given the userIDs

		$userID = $questionResults[$key]['ID'];

		$userQuery = "SELECT * FROM `User` WHERE `ID` = " . $userID;
		$resultU = $conn->query($userQuery);
		$userResults = mysqli_fetch_all($resultU);

		$questionAsker = $userResults['Username']; //CHECK: is this [0]['Username'] or just ['Username']

		$htmlHomeFeed .= "<div class=\"news-item\">";
		$htmlHomeFeed .= "<div class=\"row\"><div class=\"col-md-12\">";
		$htmlHomeFeed .= "<h2><a href=\"#\">" . $questionResults[$key]['Title'] . "</a></h2>";
		$htmlHomeFeed .= "<p>" . substr($questionResults[$key]['Question'], 0 , 200) . "</p>";
		$htmlHomeFeed .= "<ul class=\"blog-tags\">";
		$htmlHomeFeed .= "<li><a class=\"autor\" href=\"#\"><i class=\"fa fa-user\"></i>" . $questionAsker . "</a></li>";
		$htmlHomeFeed .= "<li><a class=\"date\" zhref=\"#\"><i class=\"fa fa-clock-o\"></i>" . $questionResults[$key]['Date'] . "</a></li>";
		$htmlHomeFeed .= "</ul></div></div></div>";
	}

	mysqli_close($conn);

	?>

<!doctype html>


<html lang="en" class="no-js">

<head>
	<title>SOEN 341 - Index</title>

	<meta charset="utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,700,600,300' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" type="text/css" href="css/bootstrap.css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/style.css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/responsive.css" media="screen">

	
</head>
<body>

	<!-- Container -->
	<div id="container">
		<!-- Header ================================================== -->
		<header class="clearfix">
			<!-- Static navbar from singhgurdip24-->
			<div class="navbar navbar-default navbar-fixed-top">
				<div class="container">
					<div class="navbar-collapse collapse">
						<ul class="nav navbar-nav">
							<li><a href="index.html">Home</a></li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
						  <li><a href="#" data-toggle="modal" data-target="#Register-modal"><span class="fa fa-user"></span> Sign Up</a></li>
						  <li><a href="#" data-toggle="modal" data-target="#login-modal"><span class="fa fa-sign-in"></span> Login</a></li>
						</ul>
					</div>
				</div>
			</div>
		</header>
		<!-- End Header -->

			<!-- Container for questions list -->
			<div class="blog-box with-sidebar">
				<div class="container">
					<div class="row">

						<div class="col-md-9 blog-side one-col">

							<?php echo($htmlHomeFeed)?>

							<ul class="pagination-list">
								<li><a class="active" href="#">1</a></li>
								<li><a href="#">2</a></li>
							</ul>
						</div>

						<div class="col-md-3 sidebar">
							<div class="sidebar-widgets">
								<div class="search-widget widget">
									<form>
										<input type="search" placeholder="Search here..."/>
										<button type="submit">
											<i class="fa fa-search"></i>
										</button>
									</form>
								</div>
							</div>
						</div>
					</div>
											
				</div>
			</div>

		</div>
		<!-- End content -->
		
		<!-- Container for the Login Modal -->
		<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
			<div class="modal-dialog">
				<div class="loginmodal-container">
					<h1>Login to Your Account</h1><br>
						<form>
							<input type="text" name="user" placeholder="Username">
							<input type="password" name="pass" placeholder="Password">
							<input type="submit" name="login" class="login loginmodal-submit" value="Login">
						</form>
				</div>
			</div>
		</div>
		<!-- End Login Container -->
		
		<!-- Container for the Register Modal -->
		<div class="modal fade" id="Register-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
			<div class="modal-dialog">
				<div class="loginmodal-container">
					<h1>Sign Up</h1><br>
						<form>
							<input type="text" name="user" placeholder="Select Username">
							<input type="text" name="user" placeholder="Name">
							<input type="Password" name="pass" placeholder="Password">
							<input type="Password" name="pass" placeholder="Choose Password Again">
							<input type="submit" name="Sign Up" class="login loginmodal-submit" value="Sign Up">
						</form>
				</div>
			</div>
		</div>
		<!-- End Register Container -->


		<!-- footer ================================================== -->
		<footer>

			<div class="footer-line">
				<div class="container">
					<div class="footer-line-in">
						<div class="row">
							<div class="col-md-8">
								<p>Created by Gurdip Singh, Francois Theroux, </p>
							</div>
						</div>						
					</div>
				</div>
			</div>

		</footer>
		<!-- End footer -->

		<div class="fixed-link-top">
			<div class="container">
				<a class="go-top" href="#"><i class="fa fa-angle-up"></i></a>
			</div>
		</div>

	</div>
	<!-- End Container -->

	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/plugins-scroll.js"></script>
	<script type="text/javascript" src="js/script.js"></script>

</body>
</html>