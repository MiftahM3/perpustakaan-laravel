
<div class="modal fade" id="modal-tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Penerbit</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
          <div class="modal-body">
            <form action="/penerbit/store" method="POST">
              @csrf
              <div class="form-groub">
              <label for="nama" style="margin-bottom: 2%">Nama Penerbit</label>
              <input type="text" name="nama" id="nama" class="form-control">
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
  
  
  
  
  
  
    