@extends('admintp/app')
@section('title','Daftar User')
@section('active-daftar-user','active')
@section('content')

<div id="layoutSidenav_content">
  <main>
      <div class="container-fluid px-4">
          <h1 class="mt-4">@yield('title')</h1>
          <ol class="breadcrumb mb-4">
              <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active">@yield('title')</li>
          </ol>
          <div class="section-body">
           <div class="card ">
            <div class="card-header">
             <div class="card-header-form d-md-flex justify-content-md-end">
              <button type="button" class="btn btn-success " data-bs-toggle="modal" data-bs-target="#modal-tambah">+Tambah User</button>
              </div>
            </div>
                  <table  class="table table-stripped table-bordered">
                      <thead>
                          <tr>
                              <th style="widht: 10%">No.</th>
                              <th>Usernama</th>
                              <th>Email</th>
                              <th>Role</th>
                              <th style="width: 15%">Aksi</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($users as $item)
                        <tr>
                          <td>{{$loop->iteration}}</td>
                          <td>{{$item->username}}</td>
                          <td>{{$item->email}}</td>
                          <td style="font-size: 100%">
                            @if ($item->role->name == 'admin')
                                <span class="badge bg-danger text-white">Admin</span>
                            @elseif($item->role->name == 'petugas')
                                <span class="badge bg-warning text-white">Petugas</span>
                            @else
                                <span class="badge bg-success text-white">Peminjam</span>
                            @endif
                        </td>
                          <td>
                            <form action="/daftar-user/{{$item->id}}" method="GET">
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
              </div>
           </div>
          </div>
      </div>
      
  </main>
  @include('tambahuser.form')
</div>

{{-- modal-edit --}}

@foreach($users as $item) 

<div class="modal fade" id="modal-edit{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data User</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body">
            <form action="/daftar-user/{{$item->id}}" method="POST">
                @csrf
                @method('put') 
                <div class="form-groub">
                <label for="email" class="mt-1" style="margin-bottom: 2%">Username</label>
                <input type="text" name="username" id="username" class="form-control" value="{{$item->username}}">

                <label for="email" class="mt-1" style="margin-bottom: 2%">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{$item->email}}">

                <label for="password" class="mt-1" style="margin-bottom: 2%">Password</label>
                <input type="password" name="password" id="password" class="form-control" value="{{$item->password}}">
                

                <label class="mt-2" for="roles">Role</label>
                <select class="form-control" name="role_id">
                    <option selected value="{{ $item->role_id }}">
                        {{ $item->role->name }}</option>
                    @foreach ($roles as $itm)
                        <option value="{{ $itm->id }}">{{ $itm->name }}</option>
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