<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> M3DIA | BOOKS </title>
    <link rel="stylesheet" href="css/bootstrap.min.style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">M3DIA | BOOKS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link @yield('active-home')" href="/home">Buku</a>
                    </li>

                    <li class="nav-item dropdown d-flex">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Kategori
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/home">Semua Kategori</a>
                            <div class="dropdown-divider"></div>
                            @foreach ($kategori as $kt)
                                <li><a class="dropdown-item"
                                        href="/pilih-kategori/{{ $kt->id }}/{{ $kt->nama }}">{{ $kt->nama }}</a>
                                </li>
                            @endforeach
                        </ul>
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Penerbit
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/home">Semua Penerbit</a>
                            <div class="dropdown-divider"></div>
                            @foreach ($penerbit as $pb)
                                <li><a class="dropdown-item"
                                        href="/pilih-penerbit/{{ $pb->id }}/{{ $pb->nama }}">{{ $pb->nama }}</a>
                                </li>
                            @endforeach
                        </ul>

                        <?php
                        
                        $user = auth()->id();
                        
                        $jumlahfav = App\Models\Favorit::where('users_id', $user)->get();
                        
                        ?>
                        @if ($jumlahfav)
                    <li class="nav-item  d-flex">
                        <a class="nav-link @yield('active-favorit')" href="/favorit">Favorit
                            <span class="badge bg-danger">{{ $jumlahfav->count() }} </span> </a>

                    </li>
                    @endif
                    <?php
                    
                    $user = auth()->id();
                    
                    $jumlahpinjam = App\Models\Peminjaman::where('users_id', $user)->get();
                    
                    ?>
                    @if ($jumlahpinjam)
                        <?php
                        $countStatus0 = $jumlahpinjam->where('status', 0)->count();
                        $countStatus1 = $jumlahpinjam->where('status', 1)->count();
                        ?>

                        <li class="nav-item  d-flex">
                            <a class="nav-link @yield('active-detail')" href="/detailPinjam">Data Pinjam
                                <span class="badge bg-danger">{{ $countStatus0 }} </span>
                                <span class="badge bg-warning">{{ $countStatus1 }} </span> </a>
                    @endif
                    </li>
                </ul>
            </ul>
                </li>
                <li class="nav-item dropdown d-flex">
                    <a class="nav-link dropdown-toggle " id="navbarDropdown" href="#" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false" style="color: white">{{ Auth::user()->username }} <i
                        class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="/logout">Logout</a></li>

                    </ul>
                </li>
            </div>
        </div>
    </nav>
    @include('sweetalert::alert')
    @yield('content')
</body>

</html>
