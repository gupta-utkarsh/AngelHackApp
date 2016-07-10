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
				<form class="right" method="post" role="form" action="/current_patients">
					{{ csrf_field() }}
					<div class="form-group inline">
						<input type="text" name="name"/>
					</div>
					<div class="form-group inline">	
						<button type="submit" class="btn btn-primary">
							Add Appointment
						</button>	
					</div>				
				</form>	
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
				        	<?php $a=1; ?>
				        	@foreach($ongoing as $row)
					        	<tr>
					        		<th scope="row"><?php echo $a++; ?></th>
					        		<td class="capitalize">
					        			<a href="/patient/{{$row->user->name}} ">{{ $row->user->name}}</a>
					        		</td>
					        		<td>{{ $row->user->email}}</td>
					        		<td>{{ $row->started_at }}</td>
									@if($row->disease)
					        		<td>Diagnosed with {{ $row->disease}}</td>
					        		@else
					        		<td>Unknown</td>
					        		@endif
					            </tr>
					        @endforeach    
				        </tbody> 
				    </table>
				</div>
			</div>		
		</main>
		@include('includes.footer')
	</body>
</html>