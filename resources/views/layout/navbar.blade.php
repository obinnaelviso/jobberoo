<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="/">{{ config('app.name') }}</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item @yield('home-active')"><a href="/" class="nav-link">Home</a></li>
          <li class="nav-item @yield('about-active')"><a href="/about" class="nav-link">About</a></li>
          <li class="nav-item @yield('contact-active')"><a href="/contact" class="nav-link">Contact</a></li>
          @guest
            <li class="nav-item @yield('login-active')"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
            <li class="nav-item @yield('register-active')"><a href="{{ route('register') }}" class="nav-link">Register</a></li>
          @else
            <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                Logout
            </a></li>
            <li class="nav-item @yield('dashboard-active')"><a href="{{ route('dashboard') }}" class="nav-link">Go to Dashboard</a></li>
            <li class="nav-item @yield('profile-active')"><a href="{{ route('dashboard.manage.profile') }}" class="nav-link">{{ Auth::user()->firstname.' '.Auth::user()->lastname }}</a></li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          @endguest

          <li class="nav-item cta mr-md-1"><a href="{{ route("jobs.post") }}" class="nav-link">Post a Job</a></li>
          <li class="nav-item cta cta-colored"><a href="{{ route("jobs.categories") }}" class="nav-link">Want a Job</a></li>

        </ul>
      </div>
    </div>
</nav>
