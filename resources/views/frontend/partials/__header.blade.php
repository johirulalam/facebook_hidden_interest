<!-- Add your site or application content here -->

  <nav class="navbar navbar-light navbar-expand-lg fixed-top">
    <div class="container">
      <a href="" class="logo"><img src="{{ asset('assets/frontend/img/logo.svg')}}"></a>
      <ul class="nav mr-auto">
        <li class="nav-item"><a class="nav-link" href="">Pricing</a></li>
        <li class="nav-item"><a class="nav-link" href="">Login</a></li>
      </ul>
      <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item pricing"><a class="nav-link" href="">Pricing</a></li>

          @if(Auth::user())
          <li>{{Auth()->user()->name}}</li>
          
          @else   
          <li class="nav-item register"><a class="nav-link" href="{{route('login.facebook')}}">{{ __('Login with Facebook') }}</a></li>
          @endif

        </ul>
      </div>
    </div>
  </nav>
