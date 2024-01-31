<header class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow" data-bs-theme="dark" style="border-bottom: 10px; height: 50px;">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-5 text-purple" href="/">K's Gallery</a>
    <form action="/logout" method="POST">
        @csrf
        <button type="submit" class="nav-link px-3 bg-lg border-0"><i class="bi bi-box-arrow-right"></i> Logout</button>
    </form>
</header>
<style>
    .text-purple {
        color: rgb(144, 143, 143);
    }
    .text-purple:hover {
        color: brown !important;
        transform-style: color 0.3s;
    }
</style>
