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
					label: '{{$patient->name}}'.capitalizeFirstLetter(),
					amount: 50,
					color: '#0066bb',  // color for root node, will be inherited by children
					children: [
						@foreach($nodes as $object)
						{ label: '{{$object->name}}'.capitalizeFirstLetter() + '<br/><span>' + '{{$object->pivot->relation}}'.capitalizeFirstLetter() + '</span>', amount: 20, color: '#F43434' },
						@endforeach
					]
				};

				console.log();

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
		</main>
		@include('includes.footer')
	</body>
</html>