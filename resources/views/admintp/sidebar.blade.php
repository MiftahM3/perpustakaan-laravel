<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    @if (Auth()->user()->role_id == 1)
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link @yield('active-dashboard')" href="/dashboard">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link collapsed " href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseLayoutsMaster" aria-expanded="false"
                            aria-controls="collapseLayoutsMaster">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-cubes"></i></div>
                            Data Master
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse " id="collapseLayoutsMaster" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav ">
                                <a class="nav-link @yield('active-buku')" href="/buku">Buku</a>
                                <a class="nav-link @yield('active-penerbit')" href="/penerbit">Penerbit</a>
                                <a class="nav-link @yield('active-kategori')" href="/kategori">Kategori</a>
                                <a class="nav-link @yield('active-rak')" href="/rak">Rak</a>
                            </nav>
                        </div>

                        <a class="nav-link collapsed " href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa fa-check-square"></i></div>
                            Confirm Master
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>

                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav ">
                                <a class="nav-link @yield('active-peminjaman')" href="/DataPeminjaman">Peminjaman</a>
                                <a class="nav-link @yield('active-pengembalian')" href="/DataPengembalian">Pengembalian</a>
                            </nav>
                        </div>

                        <a class="nav-link @yield('active-daftar-user')" href="/daftar-user">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-users"></i></div>
                            Daftar User
                        </a>

                        <a class="nav-link @yield('active-laporan')" href="/laporan">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-file-lines"></i></div>
                            Laporan
                        </a>
                    @else
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link @yield('active-dashboard')" href="index.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Interface</div>
                        <a class="nav-link collapsed " href="#" data-bs-toggle="collapse"
                        data-bs-target="#collapseLayoutsMaster" aria-expanded="false"
                        aria-controls="collapseLayoutsMaster">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-cubes"></i></div>
                        Data Master
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse " id="collapseLayoutsMaster" aria-labelledby="headingOne"
                        data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav ">
                            <a class="nav-link @yield('active-buku')" href="/buku">Buku</a>
                            <a class="nav-link @yield('active-penerbit')" href="/penerbit">Penerbit</a>
                            <a class="nav-link @yield('active-kategori')" href="/kategori">Kategori</a>
                            <a class="nav-link @yield('active-rak')" href="/rak">Rak</a>
                        </nav>
                    </div>

                        <a class="nav-link collapsed " href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa fa-check-square"></i></div>
                            Confirm Master
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>

                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav ">
                                <a class="nav-link @yield('active-peminjaman')" href="/DataPeminjaman">Peminjaman</a>
                                <a class="nav-link @yield('active-pengembalian')" href="/DataPengembalian">Pengembalian</a>
                            </nav>
                        </div>

                        <a class="nav-link @yield('active-laporan')" href="/laporan">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-file-lines"></i></div>
                            Laporan
                        </a>
                    @endif
                </div>

            </div>

        </nav>

    </div>
