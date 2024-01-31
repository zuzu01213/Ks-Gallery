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
                    <a class="nav-link d-flex align-items-center gap-2 {{Request::is('dashboard/posts')? 'active' : ''}}" href="/dashboard/gallery/index " style="color: white; transition: color 0.3s;" onmouseover="this.style.color='rgb(211, 73, 73)'" onmouseout="this.style.color='white'">
                        <i class="bi bi-file-earmark"></i>
                        Gallery
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

            @can('admin')
            <h6 class="d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                <span>Administration</span>
            </h6>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center gap-2 {{Request::is('dashboard/categories')? 'active' : ''}}" href="/dashboard/categories " style="color: black; transition: color 0.3s;" onmouseover="this.style.color='white'" onmouseout="this.style.color='black'">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-grid-3x3-gap" viewBox="0 0 16 16">
                                <path d="M4 2v2H2V2zm1 12v-2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1m0-5V7a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1m0-5V2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1m5 10v-2a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1m0-5V7a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1m0-5V2a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1M9 2v2H7V2zm5 0v2h-2V2zM4 7v2H2V7zm5 0v2H7V7zm5 0h-2v2h2zM4 12v2H2v-2zm5 0v2H7v-2zm5 0v2h-2v-2zM12 1a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zm-1 6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1zm1 4a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-2a1 1 0 0 0-1-1z"/>
                              </svg>
                            Post Categories
                        </a>
                    </li>
                </ul>
            @endcan
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
