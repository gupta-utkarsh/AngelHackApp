<!DOCTYPE HTML>
<html>
	<head>
		@include('includes.head')
	</head>
	<body class="height-full">
		<header>
			@include('includes.header')
		</header>
		<aside>
			@include('includes.sidebar')
		</aside>
		<main class="main-body">	
			<div class="panel-container col-md-offset-1 col-md-10 col-xs-12">	
				<div class="panel panel-default">
					<div class="panel-heading">
						Current Patients
					</div>
				    <table class="table">
				    	<thead>
				    		<tr>
				    			<th>#</th>
				    			<th>Name</th>
				    			<th>Email</th> 
				    			<th>Treatment Started At</th>
				    			<th>Current Status</th> 
				    		</tr>
				    	</thead>
				        <tbody>
				        	<tr>
				        		<th scope="row">1</th>
				        		<td>Mark</td>
				        		<td>Otto</td>
				        		<td>@mdo</td>
				            </tr>
				        </tbody> 
				    </table>
				</div>
			</div>		
		</main>
		@include('includes.footer')
	</body>
</html>