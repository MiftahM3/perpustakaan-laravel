<div class="modal fade" id="modal-tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/daftar-user/store" method="POST" >
                    @csrf
                    <div class="form-groub">
                        <label  for="username" style="margin-bottom: 2%">username</label>
                        <input type="text" name="username" id="nama" class="form-control">
                        @error('username') <small class="text-danger">{{ $message }}</small> @enderror
                        <label class="mt-1" for="email" style="margin-bottom: 2%">email</label>
                        <input type="email" name="email" id="nama" class="form-control">
                        @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                        <label class="mt-1" for="password" style="margin-bottom: 2%">password</label>
                        <input type="password" name="password" min="1" id="password" class="form-control">
                        @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                                <div>
                                    <label class="mt-1" for="roles">Role</label>
                                    <select class="form-control" name="role_id">
                                        <option selected value="">Pilih Role</option>
                                        @foreach ($roles as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
            </form>

        </div>
    </div>
</div>
{{-- modal-tambah --}}
