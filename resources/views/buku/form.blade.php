<div class="modal fade" id="modal-tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data buku</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/buku/store" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-groub">
                        <label for="judul" style="margin-bottom: 2%">judul</label>
                        <input type="text" name="judul" id="nama" class="form-control">
                        @error('judul') <small class="text-danger">{{ $message }}</small> @enderror
                        <label for="penulis" style="margin-bottom: 2%">penulis</label>
                        <input type="text" name="penulis" id="nama" class="form-control">
                        @error('penulis') <small class="text-danger">{{ $message }}</small> @enderror
                        <label for="stok" style="margin-bottom: 2%">stok</label>
                        <input type="number" name="stok" min="1" id="stok" class="form-control">
                        @error('stok') <small class="text-danger">{{ $message }}</small> @enderror
                        <label for="sampul" style="margin-bottom: 2%">Sampul</label>
                        <input type="file" name="sampul" id="sampul" min="1" class="form-control">
                        @error('sampul') <small class="text-danger">{{ $message }}</small> @enderror
                        <div class="row mt-2">
                            <div class="col-md-4">
                                <div>
                                    <label for="kategori">Kategori</label>
                                    <select class="form-control" name="kategori_id">
                                        <option selected value="">Pilih Kategori</option>
                                        @foreach ($kategoris as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div>
                                    <label for="penerbit">penerbit</label>
                                    <select class="form-control" name="penerbit_id">
                                        <option selected value="">Pilih penerbit</option>
                                        @foreach ($penerbit as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div>
                                    <label for="rak">rak</label>
                                    <select class="form-control" name="rak_id">
                                        <option selected value="">Pilih rak</option>
                                        @foreach ($rak as $item)
                                            <option value="{{$item->id}}">Rak : {{$item->rak}}, Baris : {{$item->baris}}</option>
                                        @endforeach
                                   </select>
                                </div>
                            </div>

                        </div>
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
