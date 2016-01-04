<?php
$base = 'http://yup.hk/';

$navigation = array(
	'Home' => '/',
	'List' => '/list/',
	'Submit' => '/submit/',
	'About' => '/about/',
	'Contact' => '/contact/'
);

if (getenv('APP_ENV') === 'development') {
	$base = 'http://localhost/yup/public/';
	foreach ($navigation as &$value) {
		$value = $base . substr($value, 1);
	}
}
?><!DOCTYPE html>
<html ng-app="yup">
	<head>
		<title>yup</title>
		<meta name="Description" content="yup - your only one stop for digital solutions" />
		<meta name="Keywords" content="yup, digital solutions, web, app, mobile, applications, development" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<base href="<?php echo $base; ?>" />
		<link href='https://fonts.googleapis.com/css?family=Advent+Pro:400,300' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="vendor/bootstrap/dist/css/bootstrap.css">
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-20542855-2', 'auto');
		ga('send', 'pageview');
		</script>

		<header id="header" class="container-fluid">
			<div class="container">
				<div id="logo" class="logo">yup</div>
				<nav class="collapse navbar-collapse" ng-controller="NavigationController">
					<ul class="nav navbar-nav">
						<?php
						foreach ($navigation as $key => $val) {
							echo "<li ng-class=\"{ active: isActive('$val')}\"><a href=\"$val\">$key</a></li>\n";
						}
						?>
					</ul>
				</nav>
			</div>
		</header>

		<div id="body" class="container" ng-view></div>

		<script src="vendor/jquery/dist/jquery.min.js"></script>
		<script src="vendor/angular/angular.js"></script>
		<script src="vendor/angular-route/angular-route.js"></script>
		<script src="vendor/angular-resource/angular-resource.js"></script>
		<script src="js/bundle.php"></script>
	</body>
</html>
