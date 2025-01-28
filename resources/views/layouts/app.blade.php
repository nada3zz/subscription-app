<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('user/layouts/head')
</head>
<body>
    <div id="app">
        <!-- Navigation Bar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom" data-bs-theme="dark" id="mainNav">
            <div class="container">
                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ route('user.home') }}">Subscription App</a>

                <!-- Hamburger Menu for Mobile -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Navbar Links -->
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <!-- Left Side of Navbar (Empty for now) -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">&nbsp;</li>
                    </ul>

                    <!-- Right Side of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        @if (Auth::guest())
                            <!-- Authentication Links for Guests -->
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register.step-one') }}">Register</a>
                            </li>
                        @else
                            <!-- User Dropdown Menu -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
           
        @yield('content') <!-- Your login form will be rendered here -->
    </div>

    <!-- Scripts -->
    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom Scripts -->
    <script src="{{ asset('user/js/scripts.js') }}"></script>
</body>
</html>
