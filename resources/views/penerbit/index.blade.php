@extends('admintp/app')
@section('title','Penerbit')
@section('active-penerbit','active')
@section('content')

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
              <button type="button" class="btn btn-success " data-bs-toggle="modal" data-bs-target="#modal-tambah">+Tambah penerbit</button>
              </div>
            </div>
                  <table class="table table-bordered table-hover table-striped">
                      <thead>
                          <tr>
                              <th style="widht: 10%">No.</th>
                              <th>Nama</th>
                              <th style="width: 15%">Aksi</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($penerbit as $item)
                        <tr>
                          <td>{{$loop->iteration}}</td>
                          <td>{{$item->nama}}</td>
                          <td>
                            <form action="/penerbit/{{$item->id}}" method="GET">
                              @method('delete')
                            <div class="btn-group">
                              <button type="button" data-bs-toggle="modal" data-bs-target="#modal-edit{{$item->id}}" class="btn btn-sm btn-primary bi bi-pencil-square mr-2"></button>
                              <button class="btn btn-sm btn-danger bi bi-trash" type="submit"></button>
                            </div>
                          </form>
                          </td>
                      </tr>
                      @endforeach      
                      </tbody>
                  </table>
                  <div class= "d-md-flex justify-content-md-end">
                    {{ $penerbit->links() }}
                   </div>
              </div>
           </div>
          
          </div>
          @include('admintp/footer')
      </div>
     
  </main>
  @include('penerbit.form')
</div>

{{-- modal-edit --}}

@foreach($penerbit as $item)
<div class="modal fade" id="modal-edit{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Penerbit</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body">
          <form action="/penerbit/{{$item->id}}" method="POST">
            @csrf
            @method('put') 

            <div class="form-groub">
            <label for="nama" style="margin-bottom: 2%">Nama Penerbit</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{$item->nama}}">
           </div>
           <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-success">Update</button>
          </div>
          </form>
          
        </div>
    </div>
    </div>
  </div>
@endforeach
@include('sweetalert::alert')
@endsection