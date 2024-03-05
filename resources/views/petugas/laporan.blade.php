@extends('admintp/app')
@section('title', 'Laporan')
@section('active-laporan', 'active')
@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">@yield('title')</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
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
                                        <th width="8%">Nama Peminjam</th>
                                        <th>Buku</th>
                                        <th width="16%">Tanggal Pinjam</th>
                                        <th width="12%">Tanggal Pengembalian</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($data as $index => $row)
                                        @if ($row->status == 0)
                                        @elseif($row->status == 1)
                                
                                        @else
                                            <tr>
                                                <td>{{ $no++ }}
                                                <td>{{ $row->kode_pinjam }}
                                                </td>
                                                <td> {{ $row->users->username }}</td>
                                                <td> {{ $row->buku->judul }}</td>
                                                <td>{{ $row->tanggal_pinjam }}</td>
                                                <td>{{ $row->tanggal_kembali }}</td>
                                                <td style="font-size: 90%">
                                                    @if ($row->status == 0)
                                                        <span class="badge bg-danger">Menunggu
                                                            Konfirmasi</span>
                                                    @elseif($row->status == 1)
                                                        <span class="badge bg-warning text-white">Sedang
                                                            Dipinjam</span>
                                                    @else
                                                        <span class="badge bg-success text-white">Peminjaman
                                                            Selesai</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                            <div class= "d-md-flex justify-content-md-end">
                                {{ $data->links() }}
                               </div>
                        </div>
                    </div>
                </div>

            </div>
    
    <!-- /.container-fluid -->
    </main>



    <!-- End of Main Content -->
@endsection

