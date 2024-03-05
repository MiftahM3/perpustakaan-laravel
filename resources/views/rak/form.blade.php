

<div class="modal fade" id="modal-tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Rak</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
          <div class="modal-body">
            <form action="/rak/store" method="POST">
              @csrf
              <div class="form-groub">
              <label for="rak" style="margin-bottom: 2%">Rak</label>
              <input type="number" name="rak" id="nama" class="form-control">
              <label for="baris" style="margin-bottom: 2%">Baris</label>
              <input type="number" name="baris" id="nama" class="form-control">
              <label for="kategori">Kategori</label>
              <select class="form-control" name="kategori_id">
                <option selected value="">Pilih Kategori</option>
                @foreach ($kategori as $item)
                <option value="{{$item->id}}">{{$item->nama}}</option>
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
  {{-- modal-tambah --}}