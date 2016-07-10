<!DOCTYPE HTML>
<html>
	<head>
		@include('includes.head')
		<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/jquery-migrate.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/jquery.history.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/jquery.tooltip.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/raphael-min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/Tween.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/bubbletree.js') }}"></script>

		<link rel="stylesheet" type="text/css" href="{{ asset('css/bubbletree.css') }}" />
		<script type="text/javascript">
			$(function() {
				String.prototype.capitalizeFirstLetter = function() {
				    return this.charAt(0).toUpperCase() + this.slice(1);
				}
				var data = {
					label: '<a href="/patient/{{$patient->name}}">'+'{{$patient->name}}'.capitalizeFirstLetter() + '</a>',
					amount: 50,
					color: '#0066bb',  // color for root node, will be inherited by children
					children: [
						@foreach($nodes as $object)
						{ label: '<a href="/patient/{{$object->name}}">'+'{{$object->name}}'.capitalizeFirstLetter() + '<br/><span>' + '{{$object->pivot->relation}}'.capitalizeFirstLetter() + '</span></a>', amount: 20, color: '#F43434' },
						@endforeach
					]
				};

				new BubbleTree({
					data: data,
					container: '.bubbletree'
				});


			});
		</script>
	</head>
	<body class="height-full">
		<header>
			@include('includes.header')
		</header>
		<aside>
			@include('includes.sidebar')
		</aside>
		<main>
			<div class="bubbletree-wrapper">
				<div class="bubbletree"></div>
			</div>
			<form class="search-form" method="post" role="form" action="/patient/{{$patient->name}}/search">
				{{ csrf_field() }}
				<div class="form-group inline">
					<input type="text" name="value"/>
				</div>
				<div class="form-group inline">	
					<button type="submit" class="btn btn-primary">
						Search
					</button>	
				</div>				
			</form>	
		</main>
		@include('includes.footer')
	</body>
</html>