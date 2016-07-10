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
				<a href="/current_patients"><span class="right">Back</span></a>	
				<h3 class="capitalize page-heading">Patient : {{$patient->name}}</h3>
				@if($status == 0)
					<h4 class="page-sub-heading">
						@if($appointment->disease)
							<td>Status : Diagnosed with {{ $appointment->disease}}</td>
						@else
							<td>Status : Unknown Illness</td>
						@endif
					</h4>
				@endif
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
				        	@if($status == 0)
					        	<form action="/patient/{{ $patient->name }}/addlog" method="post">
					        		{{ csrf_field() }}
					        		<tr>
					        			<td></td>
					        			<td></td>
										<td><input type="text" name="symptoms"></td>
										<td><input type="text" name="diagnosis"></td>
										<td><input type="text" name="medicines"></td>
										<td><input type="submit" name="submit" value="Add"></td>
					        		</tr>
					        	</form>
					        @endif	
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
				<div class="btn-group" role="group" aria-label="...">
				  <a href="/patient/{{ $patient->name }}/family"><button type="button" class="btn btn-default">Family Tree</button></a>
				  <a href="/patient/{{ $patient->name }}/logs"><button type="button" class="btn btn-default">All Medical Appointments Till Date</button></a>
				</div>	
			</div>
			
		</main>
		@include('includes.footer')
	</body>
</html>