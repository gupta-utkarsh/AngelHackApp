<!DOCTYPE HTML>
<html>
	<head>
		@include('includes.head')
	</head>
	<body class="height-full">
		<div id="overlay">
	        <div id="progstat"></div>
	        <div id="progress"></div>
	    </div>
		<header>
			@include('includes.header')
		</header>
		<div class="container"> 
			<div class="left-border right col-xs-12 col-md-6">
				<form id="login" action="#" method="post" class="col-md-offset-1 form-horizontal login-form">
					<h4>Log in as Patient</h4>
					<div class="form-group">
					    <label for="email" class="control-label col-xs-4">Email</label>
					    <div class="col-xs-8">
					        <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email">
					    </div>
					</div>
					<div class="form-group">
					    <label for="password" class="control-label col-xs-4">Password</label>
					    <div class="col-xs-8">
					        <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password">
					    </div>
					</div>
					<div class="form-group">
					    <div class="col-xs-offset-4 col-xs-8">
					        <div class="checkbox">
					            <label><input type="checkbox"> Remember me</label>
					        </div>
					    </div>
					</div>
					<div class="form-group">
					    <div class="col-xs-offset-4 col-xs-8">
					        <button type="submit" class="btn btn-primary">Login</button>
					    </div>
					</div>
				</form>
				<form id="register" action="#" method="post" class="col-md-offset-1 form-horizontal register-form">
					<h4>Register</h4>
					<div class="form-group">
					    <label for="email" class="control-label col-xs-4">Email</label>
					    <div class="col-xs-8">
					        <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email">
					    </div>
					</div>
					<div class="form-group">
					    <label for="password" class="control-label col-xs-4">Password</label>
					    <div class="col-xs-8">
					        <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password">
					    </div>
					</div>
					<div class="form-group">
					    <div class="col-xs-offset-4 col-xs-8">
					        <button type="submit" class="btn btn-primary">Register</button>
					    </div>
					</div>
				</form>
			</div>
		</div>
		@include('includes.footer')
	</body>
</html>