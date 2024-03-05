@extends('layouts/app')

@section('content')
@section('active-home', 'active')
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
                            <a type="button" href="/pinjamBuku/{{ $item->id }}"
                                class="btn btn-success">Pinjam</a>
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
                                <a href="/favorit/{{ $item->id }}" style="" class="btn btn-primary"
                                    alt="Tambahkan Favorit">
                                    <i class="fa fa-heart text-white"></i> Add Favorit
                                </a>
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
@endsection