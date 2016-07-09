<div class="col-xs-12 col-md-1 height-full sidebar-container">
	<div class="col-xs-12 sidebar">
		<ul class="sidebar-list">
			@if(Auth::user())
				<li class="sidebar-list-item">Medical History</li>
				<li class="sidebar-list-item">Family</li>
				<li class="sidebar-list-item">Profile</li>
			@else
				<li class="sidebar-list-item">Medical History</li>
				<li class="sidebar-list-item">Family</li>
				<li class="sidebar-list-item">Profile</li>
			@endif
		</ul>
	</div>
</div>