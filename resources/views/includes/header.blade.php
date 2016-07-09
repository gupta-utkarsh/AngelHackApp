<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Family Doc</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        @if ((Auth::guest()) && (Auth::guard('doctors')->guest()))
          <li><span class="navbar-text">Welcome Guest!</span></li>
          <li @if( $title == "Doctor" ) class="active" @endif><a href="/doclogin">Login as Doctor</a></li>
          <li @if( $title == "Patient" ) class="active" @endif><a href="/login">Login as Patient</a></li>
        @elseif (Auth::user())
          <li><span class="navbar-text">Welcome {{Auth::user()->name}}</span></li>
          <li><a href="/logout">Logout</a></li>
        @elseif (Auth::guard('doctors')->user())
          <li><span class="navbar-text">Welcome {{Auth::guard('doctors')->user()->name}}</span></li>
          <li><a href="/doclogout">Logout</a></li>
        @endif
      </ul>
    </div>
  </div>
</nav>