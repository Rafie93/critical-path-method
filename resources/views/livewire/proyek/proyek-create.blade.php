<div>
    <h1 class="mt-4">Proyek</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">Proyek</li>
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
                                <input type="text" class="form-control" id="nama_proyek" wire:model="nama_proyek">
                                @error('nama_proyek') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="status_proyek">Client</label>
                                <select class="form-control" id="id_client" wire:model="id_client">
                                    <option value="">Pilih Status</option>
                                     @foreach ($clients as $item)
                                         <option value="{{$item->id_client}}">{{$item->nama_perusahaan}} | {{$item->nama_client}}</option>
                                     @endforeach
                                </select>
                                @error('id_client') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                          
                            <div class="form-group">
                                <label for="alamat_proyek">Alamat Proyek</label>
                                <input type="text" class="form-control" id="alamat_proyek" wire:model="alamat_proyek">
                                @error('alamat_proyek') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                           
                            <div class="form-group">
                                <label for="deskripsi_proyek">Deskripsi Proyek</label>
                                <textarea class="form-control" id="deskripsi_proyek" wire:model="deskripsi_proyek"></textarea>
                                @error('deskripsi_proyek') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="tgl_mulai">Tgl Mulai</label>
                                <input type="date" class="form-control" id="tgl_mulai" wire:model="tgl_mulai">
                                @error('tgl_mulai') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="batas_waktu">Batas Waktu</label>
                                <input type="date" class="form-control" id="batas_waktu" wire:model="batas_waktu">
                                @error('batas_waktu') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group">
                                <label for="foto_rancangan">Foto Rancangan</label>
                                <input type="file" class="form-control" id="foto_rancangan" wire:model="foto_rancangan">
                                @error('foto_rancangan') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                          
                            <div class="form-group">
                                <label for="status_proyek">Status Proyek</label>
                                <select class="form-control" id="status_proyek" wire:model="status_proyek">
                                    <option value="">Pilih Status</option>
                                    <option value="Persiapan">Persiapan</option>
                                    <option value="Mulai">Mulai</option>
                                    <option value="Proses">Proses</option>
                                    <option value="Selesai">Selesai</option>
                                </select>
                                @error('status_proyek') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="progress_proyek">Progress Proyek</label>
                                <input type="number" class="form-control" id="progress_proyek" wire:model="progress_proyek">
                                @error('progress_proyek') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="arsip_proyek">Arsip Proyek</label>
                                <input type="file" class="form-control" id="arsip_proyek" wire:model="arsip_proyek">
                                @error('arsip_proyek') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Create Proyek</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
