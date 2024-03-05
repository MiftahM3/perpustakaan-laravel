@extends('admintp/app')
@section('title', 'Dashboard')
@section('active-dashboard', 'active')
@section('content')
<script src="{{ $chart->cdn() }}"></script>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">@yield('title')</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
                <div class="row">
                    <div class="row">
                        @if (Auth()->user()->role_id == 1)
                            <div class="col-xl-3 col-md-6 ">
                                <div class="card border-left-info shadow h-200 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah
                                                    Buku
                                                </div>
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col-auto">
                                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                            {{ $bukuCount }}</div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-book fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6 ">
                                <div class="card border-left-info shadow h-200 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah
                                                    Kategori
                                                </div>
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col-auto">
                                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                            {{ $kategoriCount }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6 ">
                                <div class="card border-left-info shadow h-200 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah
                                                    Penerbit
                                                </div>
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col-auto">
                                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                            {{ $penerbitCount }}</div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-list fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6 ">
                                <div class="card border-left-warning shadow h-200 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                    Jumlah User</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $userCount }}
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-users fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>

                    <div class="col-xl-3 col-md-6 ">
                        <div class="card border-left-warning shadow h-200 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                            Jumlah Peminjaman</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $peminjamanct }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-folder-open fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-xl-3 col-md-6 ">
                        <div class="card border-left-info shadow h-200 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Buku
                                        </div>
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-auto">
                                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                    {{ $bukuCount }}</div>
                                            </div>
                                          
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-book fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 ">
                        <div class="card border-left-info shadow h-200 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah
                                            Kategori
                                        </div>
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-auto">
                                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                    {{ $kategoriCount }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 ">
                        <div class="card border-left-info shadow h-200 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah
                                            Penerbit
                                        </div>
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-auto">
                                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                    {{ $penerbitCount }}</div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-list fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="col-xl-3 col-md-6 ">
                        <div class="card border-left-warning shadow h-200 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                            Jumlah Peminjaman</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $peminjamanct }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-folder-open fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>

            </div>

            <div class="row">
                <div class="col-6 col-md-16 mb-3 ">
                    <div class="card border-left-primary shadow h-200 ">
                        <div class="card-body" style="width: 400px height: 400px">
                         {!! $chart->container() !!}
                        </div>
                    </div>
                </div>
    
                <div class="col-6 col-md-16 mb-3 ">
                    <div class="card border-left-primary shadow h-200 ">
                        <div class="card-body" style="width: 400px height: 400px">
                         <table class="table table-bordered table-hover table-striped">
                            <tr>
                                <td>Username</td>
                                <td >:</td>
                                <td> {{ Auth::user()->username }}</td>
                            </tr>
                            <tr>
                                <td>Role</td>
                                <td >:</td>
                                <td> {{ Auth::user()->role->name }}</td>
                            </tr>
                            <tr>
                                <td>Tanggal Login</td>
                                <td >:</td>
                                <td> {{ Date('d-m-y') }}</td>
                            </tr>
    
                         </table>
                        </div>
                    </div>
                </div>
            </div>
         

           

{{ $chart->script() }}
    </div>

    </main>
    @include('sweetalert::alert')
@endsection
