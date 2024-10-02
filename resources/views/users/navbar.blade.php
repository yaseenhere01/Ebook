<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container-fluid">

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="fa fa-bars"></span> Menu
      </button>
      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav m-auto">
        <li class="nav-item"><a href="/" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="/comingsoon" class="nav-link">New Release</a></li>
          <li class="nav-item"><a href="contact" class="nav-link">Contact</a></li>
          <li class="nav-item"><a href="blog" class="nav-link">Blog</a></li>
          <li class="nav-item"><a href="about" class="nav-link">About</a></li>
            @if (Auth::user())
                <li class="nav-item"><x-app-layout>

                </x-app-layout></li>
            @else
            <li class="nav-item mt-3">
                <a href="/register" class="btn btn-dark text-light">Register</a>
                <a href="/login" class="btn btn-dark text-light">Login</a>
            </li>
            @endif


        </ul>
      </div>
    </div>
  </nav>
