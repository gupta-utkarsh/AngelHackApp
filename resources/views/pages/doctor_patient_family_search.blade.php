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
				<a href="/patient/{{$patient->name}}/family"><span class="right">Back</span></a>	
				<h3 class="capitalize page-heading">Patient : {{$patient->name}}</h3>
				<div class="panel panel-default">
					<div class="panel-heading">
						Search Results : Diseases
					</div>
				    <table class="table">
				    	<thead>
				    		<tr>
				    			<th>#</th>
				    			<th>Relation</th>
				    			<th>Diseases</th>
				    		</tr>
				    	</thead>
				        <tbody>
				        	<?php $a=1; ?>
				        	@foreach($diseases as $disease_chunk)
						        @foreach($disease_chunk as $appointment)	
						        	<tr>
						        		<th scope="row"><?php echo $a++; ?></th>
						        		<td>
						        			
						        		</td>
						        		<td class="capitalize">{{ $appointment->disease}}</td>
						            </tr>
						        @endforeach    
					        @endforeach
				        </tbody> 
				    </table> 
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						Search Results : Symptoms and Medicines
					</div>
				    <table class="table">
				    	<thead>
				    		<tr>
				    			<th>#</th>
				    			<th>Relation</th>
				    			<th>Symptoms</th> 
				    			<th>Diagnosis</th>
				    			<th>Medicines</th> 
				    		</tr>
				    	</thead>
				        <tbody>
				        	<?php $a=1; ?>
				        	@foreach($symptoms as $symptom_chunk)
						        @foreach($symptom_chunk as $medical_log)	
						        	<tr>
						        		<th scope="row"><?php echo $a++; ?></th>
						        		<td>
						        			
						        		</td>
						        		<td class="capitalize">{{ $medical_log->symptoms}}</td>
						        		<td class="capitalize">{{ $medical_log->diagnosis }}</td>
						        		<td class="capitalize">{{ $medical_log->medicines}}</td>
						        		<td> </td>
						            </tr>
						        @endforeach    
					        @endforeach
					        @foreach($medicines as $symptom_chunk)
						        @foreach($symptom_chunk as $medical_log)	
						        	<tr>
						        		<th scope="row"><?php echo $a++; ?></th>
						        		<td>
						        			
						        		</td>
						        		<td class="capitalize">{{ $medical_log->symptoms}}</td>
						        		<td class="capitalize">{{ $medical_log->diagnosis }}</td>
						        		<td class="capitalize">{{ $medical_log->medicines}}</td>
						        		<td> </td>
						            </tr>
						        @endforeach    
					        @endforeach
				        </tbody> 
				    </table> 
				</div>
			</div>
			
		</main>
		@include('includes.footer')
	</body>
</html>