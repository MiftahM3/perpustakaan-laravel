<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="/dashboard">M3DIA | BOOK</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
            class="fas fa-bars"></i></button>


    </form>
    <!-- Navbar-->
    <ul class="ms-auto me-0 me-md-3 my-2 my-md-0">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                data-bs-toggle="dropdown" aria-expanded="false">{{ Auth::user()->username }} <i
                    class="fas fa-user fa-fw"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                <li>
                    <hr class="dropdown-divider" />
                </li>
                <li><a class="dropdown-item" href="/logout">Logout</a></li>
            </ul>
    </ul>
</nav>