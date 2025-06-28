<div>
    <h1 class="mt-4">Suplai Bahan</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">Suplai</li>
        <li class="breadcrumb-item active">Tambah Data</li>
    </ol>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form wire:submit.prevent="store">
                            <div class="form-group">
                                <label for="nama_proyek">Nama Proyek</label>
                                <select class="form-control" id="id_proyek" wire:change="getProyek" wire:model="id_proyek">
                                    <option value="">Pilih Proyek</option>
                                     @foreach ($proyeks as $item)
                                         <option value="{{$item->id_proyek}}">{{$item->nama_proyek}} </option>
                                     @endforeach
                                </select>
                                @error('nama_proyek') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="id_kegiatan">Kegiatan</label>
                                <select class="form-control" id="id_kegiatan" wire:model="id_kegiatan">
                                    <option value="">Pilih Kegiatan</option>
                                     @foreach ($kegiatans as $item)
                                         <option value="{{$item->id_kegiatan}}">{{$item->nama_kegiatan}} </option>
                                     @endforeach
                                </select>
                                @error('id_kegiatan') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                          
                          
                            <div class="form-group">
                                <label for="tanggal">Tanggal Permintaan</label>
                                <input type="date" class="form-control" id="tanggal" wire:model="tanggal">
                                @error('tanggal') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="id_bahan">Bahan</label>
                                <select class="form-control" id="id_bahan" wire:model="id_bahan">
                                    <option value="">Pilih Kegiatan</option>
                                     @foreach ($bahans as $item)
                                         <option value="{{$item->id_bahan}}">{{$item->nama_bahan.' | '.$item->satuan}} </option>
                                     @endforeach
                                </select>
                                @error('id_bahan') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                          

                            
                            <div class="form-group">
                                <label for="jumlah">Jumlah</label>
                                <input type="number" class="form-control" id="jumlah" wire:model="jumlah">
                                @error('jumlah') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group">
                                <label for="id_tukang">Tukang Yang Meminta</label>
                                <select class="form-control" id="id_tukang" wire:model="id_tukang">
                                    <option value="">Tidak Ada</option>
                                     @foreach ($tukangs as $item)
                                         <option value="{{$item->id_tukang}}">{{$item->nama}} </option>
                                     @endforeach
                                </select>
                                @error('id_tukang') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="arsip_proyek">Keterangan</label>
                                <input type="text" class="form-control" id="keterangan" wire:model="keterangan">
                                @error('keterangan') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" id="status" wire:model="status">
                                    <option value="0">Draft</option>
                                    <option value="1">Pengajuan</option>
                                    <option value="2">Suplai Disetujui</option>
                                    <option value="9">Dibatalkan</option>
                                </select>
                                @error('status') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">SIMPAN</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
