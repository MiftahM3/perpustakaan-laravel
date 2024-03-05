@extends('layouts.app')
@section('title', 'Favorit | Perpus')
@section('active-favorit', 'active')
@section('content')
<div class="container">
    <div class="row">
        <div class="col mb-4 mt-4">

            <h1>Buku Favorit</h1>

        </div>

        <div class="col-auto">
            <a href="/home" style="" class="btn btn-primary mt-2 mb-2 ml-3">
                <i class="fa fa-arrow-left text-white"></i> Kembali
            </a>
        </div>
    </div>
    @if ($data->isNotEmpty())
        <div class="row">
            @foreach ($data as $dd)
                <div class="col-md-3">
                    <div class="card mb-4 shadow" style="cursor: pointer">
                        <img src="/storage/{{ $dd->buku->sampul }}" alt="{{ $dd->judul }}"
                            class="card-img-top" width="300" height="400">
                        <div class="card-body">
                            <h5 class="card-title">{{ $dd->buku->judul }}</h5>
                            <p class="card-text">{{ $dd->buku->penulis }}</p>
                        </div>
                        <div class="card-footer">
                            <button type="button" data-bs-toggle="modal"
                            data-bs-target="#modalDetailFav{{ $dd->id }}"
                            class="btn btn-primary">Buku Favorit</button>
                         
                            <a type="button" class="btn btn-success" href="/pinjamBuku/{{ $dd->id }}">
                                <i class="fa fa-book text-white"></i> Pinjam</a>
                        </div>

                    </div>
                </div>
            @endforeach

            <!-- Modal Show Buku -->
            @foreach ($data as $item)
            <div class="modal fade" id="modalDetailFav{{ $item->id }}" tabindex="-2" role="dialog"
                aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="exampleModalLongTitle"><b>Buku Favorit</b></h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="row ">
                                        <div class="d-flex justify-content-center">
                                            <img class="mt-2" src="/storage/{{ $item->buku->sampul }}"
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
                                                <td>{{ $item->buku->judul }}</td>
                                            </tr>
                                            <tr>
                                                <th>Penulis</th>
                                                <td>:</td>
                                                <td>{{ $item->buku->penulis }}</td>
                                            </tr>
                                            <tr>
                                                <th>Penerbit</th>
                                                <td>:</td>
                                                <td>{{ $item->buku->penerbit->nama }}</td>
                                            </tr>
                                            <tr>
                                                <th>Kategori</th>
                                                <td>:</td>
                                                <td>{{ $item->buku->kategori->nama }}</td>
                                            </tr>
                                            <tr>
                                                <th>Rak</th>
                                                <td>:</td>
                                                <td>{{ $item->buku->rak->rak }}</td>
                                            </tr>
                                            <tr>
                                                <th>Baris</th>
                                                <td>:</td>
                                                <td>{{ $item->buku->rak->baris }}</td>
                                            </tr>
                                            <tr>
                                                <th>Stok</th>
                                                <td>:</td>
                                                <td>{{ $item->buku->stok }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>



                        <div class="modal-footer">
                            <a type="button" href="/deleteFav/{{ $item->id }}" style=""
                                class="btn btn-danger mt-2 mb-2 ml-3" alt="Tambahkan Favorit">
                                <i class="fa fa-trash text-white"></i> Hapus Favorit
                            </a>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i
                                    class="fa fa-undo"></i>
                                Close</button>
                        </div>
                        </form>

                    </div>
                </div>
            </div>

              
            @endforeach
        </div>
    @else
        <div class="alert alert-danger">
            Data Tidak Ada
        </div>
    @endif

@endsection
