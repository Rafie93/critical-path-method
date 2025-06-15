<div>
    <h1 class="mt-4">Aktivitas</h1>
    <ol class="breadcrumb mb-2">
        <li class="breadcrumb-item">Aktivitas</li>
        <li class="breadcrumb-item active">Tambah Aktivitas</li>
    </ol>
    <div class="row">
    <!-- Main content area -->
    <main class="container my-5">
        {{-- <form> --}}
            <!-- Nama Proyek -->
            <div class="form-group-row">
                <label for="projectName" class="form-label">Nama Proyek</label>
                <select id="projectName" wire:model="id_proyek" wire:change="getProyek" class="form-control form-select" aria-label="Pilih Proyek">
                    <option selected >Pilih Proyek</option>
                    @foreach ($list_proyeks as $item)
                    <option value="{{$item->id_proyek}}">{{$item->nama_proyek. " | ".$item->alamat_proyek}}</option>

                    @endforeach
                  
                </select>
                @error('id_proyek') <span class="text-danger">{{ $message }}</span> @enderror

            </div>

            <!-- Alamat -->
            <div class="form-group-row">
                <label for="address" class="form-label">Alamat</label>
                <input type="text" wire:model="alamat" readonly style="background-color: azure" id="address" class="form-control"placeholder="Masukkan alamat" aria-label="Alamat proyek" />
            </div>

            <!-- Kegiatan -->
            <div class="form-group-row">
                <label for="activity" class="form-label">Kegiatan</label>
                <select id="activity" wire:change="getKegiatan" wire:model="id_kegiatan" class="form-select" aria-label="Pilih Kegiatan Proyek">
                    <option >{{!$list_kegiatan ? 'Pilih dulu proyek...' : 'Pilih Kegiatan Proyek'}}</option>
                   @if ($list_kegiatan)
                    @foreach ($list_kegiatan as $item)
                    <option value="{{$item->id_kegiatan}}">{{$item->kode_kegiatan. " | ".$item->nama_kegiatan}}</option>

                    @endforeach
                   @endif
                   
                </select> 
                @error('id_kegiatan') <span class="text-danger">{{ $message }}</span> @enderror

                {{-- <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar w-75"></div>
                </div> --}}
            </div>

            <!-- Tanggal -->
            <div class="form-group-row">
                <label for="date" class="form-label">Tanggal</label>
                <input type="date" id="tgl_aktivitas" class="form-control"placeholder="Masukkan date aktifitas"
                wire:model="tgl_aktivitas" aria-label="date aktifitas" />
                @error('tgl)aktivitas') <span class="text-danger">{{ $message }}</span> @enderror

            </div>
            <div class="form-group-row">
                <label for="date" class="form-label">Aktifitas</label>
                <input type="text" id="nama_aktivitas" class="form-control"placeholder="Masukkan aktifitas "
                wire:model="nama_aktivitas" aria-label=" aktifitas" />
                @error('nama_aktivitas') <span class="text-danger">{{ $message }}</span> @enderror

            </div>

            <!-- Progress -->
            <div class="form-group-row align-items-center">
                
                <label class="form-label" for="progress">Progress</label>
                
                <input type="number" wire:model="progress_kegiatan" max="100" class="form-control"placeholder="Masukkan progress" aria-label="progress proyek" />
                @error('progress_kegiatan') <span class="text-danger">{{ $message }}</span> @enderror

            </div>

            <!-- Status -->
            <div class="form-group-row">
                <label for="status" class="form-label">Status</label>
                <select id="status" wire:model="status" class="form-select" aria-label="Pilih status">
                    <option selected >Pilih Status</option>
                    <option value="aktif">Aktif</option>
                    <option value="selesai">Selesai</option>
                    <option value="tertunda">Tertunda</option>
                </select>
            </div>

            <!-- Keterangan -->
            <div class="form-group-row">
                <label for="description" class="form-label">Keterangan</label>
                <textarea id="description" class="form-control" rows="4" wire:model="keterangan"
                placeholder="Masukkan keterangan aktifitas" aria-label="Keterangan aktifitas"></textarea>
            </div>

            <!-- Submit Button -->
            <div class="d-flex justify-content-start">
                <button type="button" wire:click="store"
                class="btn btn-primary btn-save">SIMPAN</button>
            </div>
        {{-- </form> --}}
    </main>

    </div>
</div>
@push('styles')
<style>
                
        .form-group-row {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            margin-bottom: 1.5rem;
        }
        /* Separate label vs input on desktop */
        @media (min-width: 768px) {
            .form-group-row .form-label {
                flex: 0 0 150px;
            }
            .form-group-row .form-control,
            .form-group-row .progress-container,
            .form-group-row select,
            .form-group-row textarea {
                flex: 1;
                max-width: 100%;
            }
        }
        /* Progress container aligns horizontally */
        .progress-container {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        /* Progress bar width controlled */
        .progress {
            flex-grow: 1;
            height: 1.25rem;
            border-radius: 0.4rem;
        }
        /* Submit button with fixed width */
        .btn-save {
            width: 150px;
        }
</style>
@endpush
