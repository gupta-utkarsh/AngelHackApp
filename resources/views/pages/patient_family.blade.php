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
				var data = {
					label: 'Total',
					amount: 100,
					color: '#0066bb',  // color for root node, will be inherited by children
					children: [
						{ label: 'First child', amount: 30 },
						{ label: 'Second child', amount: 40 },
						{ label: 'Third child', amount: 30, color: '#ff3300' }
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
		</main>
		@include('includes.footer')
	</body>
</html>