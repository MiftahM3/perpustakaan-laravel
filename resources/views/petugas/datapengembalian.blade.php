@extends('admintp/app')
@section('title', 'Data Pengembalian')
@section('active-pengembalian', 'active')
@section('content')
    <div id="layoutSidenav_content">
        <main>
            <!-- Begin Page Content -->
            <div class="container-fluid px-4">
                <h1 class="mt-4">@yield('title')</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item active">Data master</li>
                    <li class="breadcrumb-item active">@yield('title')</li>
                </ol>
                <div class="section-body">
                    <div class="card ">
                        <div class="card-header">
                            <div class="card-header-form d-md-flex justify-content-md-end">

                            </div>
                            <table id="example1" class="table table-bordered table-hover table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th width="8%">Kode Peminjaman</th>
                                        <th>Kode Buku</th>
                                        <th>Peminjam</th>
                                        <th>Buku</th>
                                        <th width="12%">Tanggal Pinjam</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($data as $row)
                                        @if ($row->status == 0)
                                        @elseif($row->status == 1)
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
                                                        <a type="button" href="/ubahStatus/{{ $row->id }}"
                                                            class="btn btn-success text-white ">
                                                            <i class="fas fa-save text-white">
                                                            </i> Konfirmasi
                                                        </a>
                                                    @elseif($row->status == 1)
                                                        <a type="button" href="/ubahStatus1/{{ $row->id }}"
                                                            class="btn btn-primary text-white ">
                                                            <i class="fa-solid fa-backward text-white">
                                                            </i> Kembali
                                                        </a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @else
                                        @endif
                                    @endforeach
                                </tbody>

                            </table>
                     
                        </div>
                    </div>
                </div>

            </div>

    </div>

    <!-- /.container-fluid -->

    </main>

    <!-- End of Main Content -->
@endsection
