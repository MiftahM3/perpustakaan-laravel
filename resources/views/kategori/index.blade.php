@extends('admintp/app')
@section('title','kategori')
@section('active-kategori','active')
  
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
              <button type="button" class="btn btn-success " data-bs-toggle="modal" data-bs-target="#modal-tambah">+Tambah data</button>
              </div>
            </div>
                  <table class="table table-bordered table-hover table-striped text-center">
                      <thead>
                          <tr>
                              <th style="width: 5%" >No.</th>
                              <th>Nama</th>
                              <th style="width: 25%">Aksi</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($kategori as $item)
                        <tr>
                          <td>{{$loop->iteration}}</td>
                          <td>{{$item->nama}}</td>
                          <td>
                            <form action="/kategori/{{$item->id}}" method="GET">
                              @method('delete')
                            <div class="btn-group">
                              <button type="button" data-bs-toggle="modal" data-bs-target="#modal-edit{{$item->id}}" class="btn btn-sm btn-primary bi bi-pencil-square mr-2"></button>
                              <button class="btn btn-sm btn-danger bi bi-trash" type="submit" id="delete"></button>
                            </div>
                          </form>
                          </td>
                      </tr>
                      @endforeach      
                      </tbody>
                  </table>
                  <div class= "d-md-flex justify-content-md-end">
                    {{ $kategori->links() }}
                   </div>
              </div>
              @include('admintp/footer')
           </div>
          </div>
      </div>
      
  </main>
  @include('kategori.form')
</div>

{{-- modal-edit --}}
@foreach($kategori as $item)
<div class="modal fade" id="modal-edit{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Kategori</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body">
          <form action="/kategori/{{$item->id}}" method="POST">
            @csrf
            @method('put') 

            <div class="form-groub">
            <label for="nama" style="margin-bottom: 2%">Nama Kategori</label>
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