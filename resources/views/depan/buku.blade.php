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
        <div class="container-fluid ">
            <a class="navbar-brand m" href="/">M3DIA | BOOKS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto  mb-2 mb-lg-0">
                    <li class="nav-item dropdown d-flex">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Kategori
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/">Semua Kategori</a>
                            <div class="dropdown-divider"></div>
                            @foreach ($kategori as $kt)
                                <li><a class="dropdown-item"
                                        href="/daftar-kategori/{{ $kt->id }}">{{ $kt->nama }}</a></li>
                            @endforeach


                        </ul>
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Penerbit
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="">Semua Penerbit</a>
                            <div class="dropdown-divider"></div>
                            @foreach ($penerbit as $pb)
                                <li><a class="dropdown-item"
                                        href="/daftar-penerbit/{{ $pb->id }}">{{ $pb->nama }}</a></li>
                            @endforeach


                        </ul>
                    </li>

                </ul>
                <ul class="navbar-nav ms-auto  mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a href="/login" class="btn btn-outline-success my-2 my-sm-0" type="submit">Login</a>
                    </li>
                    <li class="nav-item">
                        <a type="submit" class="btn btn-dark my-2 my-sm-0" href="/register">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">

        <div class="row mt-3">
            <h1> {{ $title }} </h1>
            <hr class="default">
        </div>
        @if ($data->isNotEmpty())


            <div class="row mt-2">
                @foreach ($data as $item)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="card mb-3 shadow">
                            <img src="/storage/{{ $item->sampul }}" class="card-img-top" alt="{{ $item->judul }}"
                                width="200" height="400">
                            <div class="card-body">
                                <h5 class="card-title"><strong>{{ $item->judul }}</strong></h5>
                                <p class="card-text">{{ $item->penulis }}</p>
                                <button type="button" data-bs-toggle="modal"
                                    data-bs-target="#modalDetail{{ $item->id }}"
                                    class="btn btn-primary">Detail</button>
                            </div>
                        </div>
                    </div>

                    {{-- modal detail --}}


                    <div class="modal fade" id="modalDetail{{ $item->id }}" tabindex="-2" role="dialog"
                        aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="exampleModalLongTitle"><b> Detail Buku</b></h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="row ">
                                                <div class="d-flex justify-content-center">
                                                    <img class="mt-2" src="/storage/{{ $item->sampul }}"
                                                        alt="{{ $item->judul }}" width="250" height="350">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <table class="table text-nowarp">
                                                <tbody>
                                                    <tr>
                                                        <th>Judul</th>
                                                        <td>:</td>
                                                        <td>{{ $item->judul }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Penulis</th>
                                                        <td>:</td>
                                                        <td>{{ $item->penulis }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Penerbit</th>
                                                        <td>:</td>
                                                        <td>{{ $item->penerbit->nama }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Kategori</th>
                                                        <td>:</td>
                                                        <td>{{ $item->kategori->nama }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Rak</th>
                                                        <td>:</td>
                                                        <td>{{ $item->rak->rak }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Baris</th>
                                                        <td>:</td>
                                                        <td>{{ $item->rak->baris }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Stok</th>
                                                        <td>:</td>
                                                        <td>{{ $item->stok }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>



                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i
                                            class="fa fa-undo"></i>
                                        Close</button>
                                </div>
                                </form>

                            </div>
                        </div>
                    </div>

                    <!-- Modal Show Buku -->
                @endforeach

            </div>
        @else
            <div class="alert alert-danger">
                Data tidak ada
            </div>

        @endif
        <div class="row">
            <div class= "d-md-flex justify-content-md-center">
                {{ $data->links() }}
            </div>
        </div>
    </div>
    @include('sweetalert::alert')

</body>

</html>
