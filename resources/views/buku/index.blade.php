@extends('admintp/app')
@section('title', 'Buku')
@section('active-buku', 'active')
@section('content')
    @include('buku/form')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">@yield('title')</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active">Data master</li>
                    <li class="breadcrumb-item active">@yield('title')</li>
                </ol>
                <div class="section-body">
                    <div class="card ">
                        <div class="card-header">
                            <div class="card-header-form d-md-flex justify-content-md-end">
                                <button type="button" class="btn btn-success " data-bs-toggle="modal"
                                    data-bs-target="#modal-tambah">+Tambah Buku</button>
                            </div>
                        </div>
                            <table class="table table-bordered table-striped ">
                                <thead>
                                    <tr>
                                        <th style="widht: 10%">No.</th>
                                        <th>sampul</th>
                                        <th>judul</th>
                                        <th>penulis</th>
                                        <th>penerbit</th>
                                        <th>kategori</th>
                                        <th style="width: 15%">Aksi</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bukus as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><img src="/storage/{{ $item->sampul }}" alt="{{ $item->judul }}"
                                                    width="100" height="150"></td>
                                            <td>{{ $item->judul }}</td>
                                            <td>{{ $item->penulis }}</td>
                                            <td>{{ $item->penerbit->nama }}</td>
                                            <td>{{ $item->kategori->nama }}</td>
                                            <td>
                                                <form action="/buku/{{ $item->id }}" method="GET">

                                                    @method('delete')

                                                    <div class="btn-group">
                                                        <button type="button" data-bs-toggle="modal"
                                                            data-bs-target="#modal-edit{{ $item->id }}"
                                                            class="btn btn-sm btn-primary bi bi-pencil-square mr-2"></button>
                                                       <button type="button" data-bs-toggle="modal"
                                                            data-bs-target="#modal-show{{ $item->id }}"
                                                            class="btn btn-sm btn-success bi bi-eye mr-2"></button>
                                                        <button class="btn btn-sm btn-danger bi bi-trash"
                                                            type="submit"></button>
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class= "d-md-flex justify-content-md-end">
                                {{ $bukus->links() }}
                            </div>
                        </div>
                    </div>
                    @include('admintp/footer')
                </div>
               
            </div>
           
        </main>
    </div>
    </div>

    {{-- modal-edit --}}
    @foreach ($bukus as $ite)
        <div class="modal fade" id="modal-edit{{ $ite->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data buku</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/buku/{{ $ite->id }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-groub">
                                <label for="judul" style="margin-bottom: 2%">judul</label>
                                <input type="text" name="judul" id="nama" class="form-control"
                                    value="{{ $ite->judul }}">
                                @error('judul')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                                <label class="mt-1" for="penulis" style="margin-bottom: 2%">penulis</label>
                                <input type="text" name="penulis" id="nama" class="form-control"
                                    value="{{ $ite->penulis }}">
                                @error('penulis')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                                <label class="mt-1" for="stok" style="margin-bottom: 2%">stok</label>
                                <input type="number" name="stok" min="1" id="stok" class="form-control"
                                    value="{{ $ite->stok }}">
                                @error('stok')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                                <label class="mt-1" for="sampul" style="margin-bottom: 2%">Sampul</label>
                                <input type="file" name="sampul" id="sampul" min="1" class="form-control"
                                    value="{{ $ite->sampul }}">
                                <img class="mt-2" src="/storage/{{ $ite->sampul }}" alt="{{ $ite->judul }}"
                                    width="100" height="150">
                                @error('sampul')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                                <div class="row mt-2">
                                    <div class="col-md-4">
                                        <div>
                                            <label for="kategori">Kategori</label>
                                            <select class="form-control" name="kategori_id">
                                                <option selected value="{{ $ite->kategori_id }}">
                                                    {{ $ite->kategori->nama }}</option>
                                                @foreach ($kategoris as $item)
                                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div>
                                            <label for="penerbit">penerbit</label>
                                            <select class="form-control" name="penerbit_id">
                                                <option selected value="{{ $ite->penerbit_id }}">
                                                    {{ $ite->penerbit->nama }}</option>
                                                @foreach ($penerbit as $item)
                                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div>
                                            <label for="rak">rak</label>
                                            <select class="form-control" name="rak_id">
                                                <option selected value="{{ $ite->rak_id }}">Rak :
                                                    {{ $ite->rak->rak }}, Baris : {{ $ite->rak->baris }}</option>
                                                @foreach ($rak as $item)
                                                    <option value="{{ $item->id }}">Rak : {{ $item->rak }}, Baris
                                                        : {{ $item->baris }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Batal</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                    </form>
                
                </div>
            </div>
        </div>
    @endforeach
    {{-- modal-tambah --}}



    {{-- modal show --}}
    @foreach ($bukus as $dd)
    <div class="modal fade" id="modal-show{{ $dd->id }}" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLongTitle"><b> Show Buku</b></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="row ">
                                <div class="d-flex justify-content-center"">
                                <img class="mt-2" src="/storage/{{ $dd->sampul }}" alt="{{ $dd->judul }}"
                                    width="250" height="350">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>Judul</th>
                                        <td>:</td>
                                        <td>{{ $dd->judul }}</td>
                                    </tr>
                                    <tr>
                                        <th>Penulis</th>
                                        <td>:</td>
                                        <td>{{ $dd->penulis }}</td>
                                    </tr>
                                    <tr>
                                        <th>Penerbit</th>
                                        <td>:</td>
                                        <td>{{ $dd->penerbit->nama }}</td>
                                    </tr>
                                    <tr>
                                        <th>Kategori</th>
                                        <td>:</td>
                                        <td>{{ $dd->kategori->nama }}</td>
                                    </tr>
                                    <tr>
                                        <th>Rak</th>
                                        <td>:</td>
                                        <td>{{ $dd->rak->rak }}</td>
                                    </tr>
                                    <tr>
                                        <th>Baris</th>
                                        <td>:</td>
                                        <td>{{ $dd->rak->baris }}</td>
                                    </tr>
                                    <tr>
                                        <th>Stok</th>
                                        <td>:</td>
                                        <td>{{ $dd->stok }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>



                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-undo"></i>
                        Close</button>
                </div>
                </form>

            </div>
        </div>
    </div>
@endforeach
    <!-- Modal Show Buku -->


    @include('sweetalert::alert')
@endsection
