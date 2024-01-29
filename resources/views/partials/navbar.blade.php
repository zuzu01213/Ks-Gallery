<nav class="navbar navbar-expand-lg fixed-top hide">
    <a class="navbar-brand" href="/home">K's</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item {{ request()->is('home', '/') ? 'active' : '' }}">
                <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item {{ request()->is('about') ? 'active' : '' }}">
                <a class="nav-link" href="/about">About Creator</a>
            </li>
            <li class="nav-item {{ request()->is('posts') ? 'active' : '' }}">
                <a class="nav-link" href="/posts">All Image</a>
            </li>
            <li class="nav-item {{ request()->is('categories') ? 'active' : '' }}">
                <a class="nav-link" href="/categories/">All Videos</a>
            </li>
            <li class="nav-item {{ request()->is('') ? 'active' : '' }}">
                <a class="nav-link" href="/pricing/">Categories</a>
            </li>
            <li class="nav-item {{ request()->is('pricing') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('pricing.index') }}">Pricing</a>
            </li>
            <li class="nav-item {{ request()->is('my-project') ? 'active' : '' }}">
                <a class="nav-link" href="http://coba-laravel-2.test/3?jumlahProduk=10&generateButton=#" target="_blank">My Project</a>
            </li>

        </ul>

            <ul class="navbar-nav ms-auto">
                @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Welcome, {{auth()->user()->name}}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-sidebar-reverse"></i> My Dashboard</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form action="/logout" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Logout</button>
                            </form>
                        </li>
                    </ul>
                  </li>
                @else
                <li class="nav-item login-link {{ request()->is('login', 'register') ? 'active' : '' }}">
                    <a href="/login" class="nav-link"><i class="bi bi-box-arrow-in-right"></i> Login</a>
                </li>
                @endauth
            </ul>
    </div>
</nav>




<style>

    nav {
        background-color: transparent;
        transition: background-color 0.3s ease;

    }

    .navbar-brand,
    .navbar-nav .nav-link {
        color: whitesmoke;
        transition: color 0.3s ease;
    }

    .navbar-toggler-icon {
        background-color: rgb(211, 73, 73);
    }

    .navbar-toggler {
        border: none;
    }

    .navbar-nav .nav-item.active .nav-link,
    .navbar-nav .nav-item.login-link.active .nav-link {
        font-weight: bold;
        color: rgb(211, 73, 73);
    }

    .navbar-nav .nav-link:hover,
    .navbar-nav .nav-item.login-link .nav-link:hover {
        color: #76453B;
    }

    ul {
        margin-left: 30px;
        margin-right: 50px;
    }

    .navbar-brand {
        margin-left: 30px;
        margin-right: 0px;
        font-size: 20px;
        color: rgb(211, 73, 73);
    }

    h1 {
        text-align: center;
    }

    /* Navbar Dropdown Styles */
    .navbar-nav .nav-link.dropdown-toggle {
        color: whitesmoke;
    }

    /* Change color when any dropdown item is active */
    .navbar-nav .nav-item.dropdown.show .nav-link.dropdown-toggle,
    .navbar-nav .nav-item.dropdown:hover .nav-link.dropdown-toggle {
        color: rgb(211, 73, 73);
    }

    /* Hover effect for dropdown toggle */
    .navbar-nav .nav-link.dropdown-toggle:hover {
        color: lightcyan;
    }

    .dropdown-menu a {
        color: black;
    }

    .dropdown-menu a:hover {
        background-color: rgb(149, 19, 19);
        color: #fff;
    }

    /* Additional styles for smooth transitions */
    .dropdown-menu {
        transition: opacity 0.3s ease;
    }

    .navbar-nav .nav-item.dropdown:hover .dropdown-menu {
        opacity: 1;
        visibility: visible;
    }

    .navbar-nav .nav-item.dropdown .dropdown-menu {
        opacity: 0;
        visibility: hidden;
    }

    .nav.nav-underline.justify-content-around a {
        color: white !important; /* Change link text color to white */
    }

    .nav.nav-underline.justify-content-around a.link-body-emphasis.active {
        color: #3F72AF !important; /* Change link text color to #3F72AF for active links */
    }

    .nav.nav-underline.justify-content-around a:hover {
        color: lightcyan; /* Change link text color on hover to lightcyan or any color you prefer */
    }
</style>
@if(request()->is('pricing'))
    <style>
         nav {
        background-color: #132f38;
        transition: background-color 0.3s ease;
    }
    </style>

@endif



