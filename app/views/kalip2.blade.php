<html>
<head>
	<title>Dear Daily</title> 
	<meta charset="utf8">
	<link rel="stylesheet" type="text/css" href="/daily/app/views/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/daily/app/views/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="/daily/app/views/css/style.css">
	<link rel="stylesheet" type="text/css" href="/daily/app/views/css/styles.css">
	<script src="/daily/app/views/js/jquery-1.11.1.min.js"></script>
	<script src="/daily/app/views/js/bootstrap.min.js"></script>
	<script src="/daily/app/views/js/menuscript.js"></script>
	<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
</head>
<body>
	<div id = "all">
		<div class="header">
			<div>
			<div id='cssmenu'>
				<ul>
					<a href="homepage">
						<img align="left" src="/daily/app/views/images/logo.png" width="90" height="60">
					</a>
				   <li><a href="login">Giriş Yap</a></li>
				   <li><a href="register">Kaydol</a></li>
				</ul>
			</div>
			</div>
		</div>		
			<div id="content">
				@yield('content')
		</div>
			<div class="break"></div>
		<div id="footer">
			<h1>Dear Daily!</h1>
		</div>
	</div>

</body>
</html>