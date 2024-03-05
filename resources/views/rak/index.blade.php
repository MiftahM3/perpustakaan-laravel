@extends('admintp/app')
@section('title','Rak')
@section('active-rak','active')
@section('content')
@include('rak/form')
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
              <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal-tambah">Tambah data</button>
              </div>
            </div>
                  <table class="table table-bordered table-striped ">
                      <thead>
                          <tr>
                              <th style="widht: 10%">No.</th>
                              <th>Rak</th>
                              <th>Baris</th>
                              <th>Kategori</th>
                              <th style="width: 15%">Aksi</th>

                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($raks as $item)
                        <tr>
                          <td>{{$loop->iteration}}</td>
                          <td>{{$item->rak}}</td>
                          <td>{{$item->baris}}</td>
                          <td>{{$item->kategori->nama}}</td>
                          <td>
                            <form action="/rak/{{$item->id}}" method="GET">
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
                  {{ $raks->links() }}
                 </div>
              </div>
                  
              </div>
           </div>
          </div>
      </div>
      
  </main>
</div>



{{-- modal-edit --}}
@foreach($raks as $ite)
<div class="modal fade" id="modal-edit{{$ite->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Rak</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body">
          <form action="/rak/{{$ite->id}}" method="POST">
            @csrf
            @method('put') 
            <div class="form-groub">
            <label for="rak" style="margin-bottom: 2%">Rak</label>
            <input type="number" name="rak" id="rak" class="form-control" value="{{$ite->rak}}">
            <label for="baris" style="margin-bottom: 2%">Baris</label>
            <input type="number" name="baris" id="baris" class="form-control" value="{{$ite->baris}}">
            <label for="kategori">Kategori</label>
            <select class="form-control" name="kategori_id">
              <option selected value="{{ $ite->kategori_id }}">
                  {{ $ite->kategori->nama }}</option>
              @foreach ($kategori as $item)
                  <option value="{{ $item->id }}">{{ $item->nama }}</option>
              @endforeach
          </select>
           </div>
           <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-success">Simpan</button>
          </div>
          </form>
          
        </div>
    </div>
    </div>
  </div>

@endforeach


@include('sweetalert::alert')
@endsection