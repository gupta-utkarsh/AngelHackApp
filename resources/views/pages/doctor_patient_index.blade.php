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
				<h3 class="capitalize page-heading">Patient : {{$patient->name}}</h3>
				<div class="panel panel-default">
					<div class="panel-heading">
						<span class="capitalize">{{$patient->name}}'s</span> previous appointments with you.
					</div>
				    <table class="table">
				    	<thead>
				    		<tr>
				    			<th>#</th>
				    			<th>Date Time</th>
				    			<th>Symptoms</th> 
				    			<th>Diagnosis</th>
				    			<th>Medicines</th> 
				    		</tr>
				    	</thead>
				        <tbody>
				        	<?php $a=1; ?>
				        	<form action="/patient/{{ $patient->name }}/addlog" method="post">
				        		<tr>
				        			<td></td>
				        			<td></td>
									<td><input type="text" name="symptoms"></td>
									<td><input type="text" name="diagnosis"></td>
									<td><input type="text" name="medicines"></td>
									<td><input type="submit" name="submit" value="submit"></td>
				        		</tr>
				        	</form>
				        	@foreach($logs as $row)
					        	<tr>
					        		<th scope="row"><?php echo $a++; ?></th>
					        		<td>
					        			{{$row->created_at}}
					        		</td>
					        		<td class="capitalize">{{ $row->symptoms}}</td>
					        		<td class="capitalize">{{ $row->diagnosis }}</td>
					        		<td class="capitalize">{{ $row->medicines}}</td>
					        		<td> </td>
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