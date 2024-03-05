@extends('layouts.app')
@section('title', 'Detail Pinjam | Perpus')
@section('active-detail', 'active')
@section('content')
    <div class="container">
        <div class="row mt-3">
            <div class="col mb-4">

                <h1>Detail Pinjam</h1>

            </div>

            <div class="col-auto">

                <a href="/home" style="" class="btn btn-primary mt-2 mb-2 ml-3">
                    <i class="fa fa-arrow-left text-white"></i> Kembali
                </a>


            </div>

            <div class="container-fluid">

                <div class="card shadow mb-4">
                    <div class="card-body rounded" style="background-color: white">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Peminjaman</th>
                                    <th>Kode Buku</th>
                                    <th>Peminjam</th>
                                    <th>Buku</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Status</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp

                                @foreach ($data as $row)
                                    @if ($row->status == 0|| $row->status == 1)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $row->kode_pinjam }} </td>
                                        <td>{{ $row->buku_id }} </td>
                                        <td> {{ $row->users->username }}</td>
                                        <td> {{ $row->buku->judul }}</td>
                                        <td>{{ $row->tanggal_pinjam }}</td>

                                        <td style="font-size: 90%">
                                            @if ($row->status == 0)
                                                <span class="badge bg-danger text-white">Menunggu
                                                    Konfirmasi</span>
                                            @elseif($row->status == 1)
                                                <span class="badge bg-warning text-white">Sedang
                                                    Dipinjam</span>
                                            @else
                                                <span class="badge bg-success text-white">Peminjaman
                                                    Selesai</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($row->status == 0)
                                                <a type="button" href="/batal/{{ $row->id }}"
                                                    class="btn btn-danger ">
                                                    <i class="fas fa-trash">
                                                    </i> Batal
                                                </a>
                                            @elseif($row->status == 1)
                                                
                                            @endif
                                        </td>

                                        </tr>
                                        
                                    @elseif($row->status == 1 )
                                    
                                    @else
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>



            </div>


            @include('sweetalert::alert')

        @endsection
