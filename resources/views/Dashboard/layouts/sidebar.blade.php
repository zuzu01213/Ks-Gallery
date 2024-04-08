<div class="sidebar col-md-3 col-lg-2 p-0 bg-body-tertiary" style="background-color: #132f38 !important; min-height: 100vh;">
    <div class="offcanvas-md " style="background-color: #132f38 !important; border: none;" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="sidebarMenuLabel">Company name</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 {{ request()->is('dah') ? 'active' : '' }}" aria-current="page" href="/dashboard" style="color: {{ request()->is('dashboard') ? 'rgb(211, 73, 73)' : 'white' }}; transition: color 0.3s;"onmouseover="this.style.color='rgb(211, 73, 73)'"
                        onmouseout="this.style.color='{{ request()->is('dashboard') ? 'rgb(211, 73, 73)' : 'white' }}'">
                        <svg class="bi"><use xlink:href="#house-fill"/></svg>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/gallery/main') ? 'active' : '' }}"
                       href="{{ route('dashboard.gallery.main') }}"
                       style="color: {{ Request::is('dashboard/gallery/main') ? 'rgb(211, 73, 73)' : 'white' }}; transition: color 0.3s;"
                       onmouseover="this.style.color='rgb(211, 73, 73)'"
                       onmouseout="this.style.color='{{ Request::is('dashboard/gallery/main') ? 'rgb(211, 73, 73)' : 'white' }}'">
                        <svg class="bi"><use xlink:href="#file-earmark-text"/></svg>
                        My Gallery
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 {{Request::is('dashboard/posts')? 'active' : ''}}" href="/dashboard/gallery/collections/index " style="color: white; transition: color 0.3s;" onmouseover="this.style.color='rgb(211, 73, 73)'" onmouseout="this.style.color='white'">
                        <i class="bi bi-file-earmark"></i>
                        Collections
                    </a>
                </li>
            </ul>
            <hr class="my-3">
            <ul class="nav flex-column mb-auto">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 {{Request::is('dashboard')? 'active' : ''}}" href="#" style="color: white; transition: color 0.3s;" onmouseover="this.style.color='rgb(211, 73, 73)'" onmouseout="this.style.color='white'">
                        <svg class="bi"><use xlink:href="#gear-wide-connected"/></svg>
                        Settings
                    </a>
                </li>
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="nav-link d-flex align-items-center gap-2" style="color: white; transition: color 0.3s;" onmouseover="this.style.color='rgb(211, 73, 73)'" onmouseout="this.style.color='white'">
                        <svg class="bi"><use xlink:href="#door-closed"/></svg> Log Out
                    </button>
                </form>
            </ul>
            @if(auth()->user()->isAdmin() || auth()->user()->isOperator())
                <h6 class="d-flex justify-content-between align-items-center px-3 mt-4 mb-1" style="color: brown; transition: color 0.3s;">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color: brown;">
                            <path d="M17 20a4 4 0 1 1-8 0M12 2a2 2 0 1 1-2 2 2 2 0 0 1 2-2zm7 18v-1a5 5 0 0 0-10 0v1"></path>
                        </svg>
                        Administration
                    </span>
                </h6>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/categories') ? 'active' : '' }}" href="{{ route('categories.store') }}" style="color: {{ Request::is('dashboard/categories') ? 'brown' : 'white' }}; transition: color 0.3s;" onmouseover="this.style.color='rgb(0, 123, 255)';" onmouseout="this.style.color='{{ Request::is('dashboard/categories') ? 'brown' : 'white' }}';">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-bar-graph" viewBox="0 0 16 16" style="color: brown;">
                                <path d="M2 1v14a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V1H2zm5.5 2.5a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm1 1.634a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm-2 1.366a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm1 1.634a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zM4 12a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.5-.5zm9-8a.5.5 0 0 0-.5-.5h-2a.5.5 0 0 0 0 1h2a.5.5 0 0 0 .5-.5zM8.5 9a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1zm1 3.5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                            </svg>
                            Post Categories
                        </a>
                    </li>
                </ul>
            @endif


        </div>
    </div>
</div>
<style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
    vertical-align: -.125em;
    fill: currentColor;
    width: 1em;
    height: 1em;
}


      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }

      .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
      }

      .bd-mode-toggle {
        z-index: 1500;
      }

      .bd-mode-toggle .dropdown-menu .active .bi {
        display: block !important;
      }
    </style>
