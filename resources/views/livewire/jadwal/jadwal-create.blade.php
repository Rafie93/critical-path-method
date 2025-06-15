<div>
    <h1 class="mt-4">Progress Jadwal dengan Metode CPM</h1>
    <ol class="breadcrumb mb-2">
        <li class="breadcrumb-item">Jadwal</li>
        <li class="breadcrumb-item active">Progress Data</li>
    </ol>
    
    <main class="container container-custom my-5">
      <div class="card shadow-sm p-4 bg-white rounded-3">
        {{-- <h3 class="mb-4">Data Penjadwalan Proyek</h3> --}}
        {{-- <form > --}}
          <!-- Nama Proyek -->
          <div class="mb-3 row align-items-center">
            <label for="nama_proyek" class="col-sm-4 col-form-label fw-semibold">Nama Proyek</label>
            <div class="col-sm-8">
              <select id="id_proyek" wire:model="id_proyek" wire:change="getProyek"
                 name="id_proyek" class="form-select @error('id_proyek') is-invalid @enderror" required>
                <option value="">Pilih Proyek</option>
                @foreach ($proyeks as $item)
                    <option value="{{$item->id_proyek}}">{{$item->nama_proyek}}</option>
                @endforeach                
              </select>
              @error('id_proyek')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
    
          <!-- Nama Client -->
          <div class="mb-3 row">
            <label for="nama_client" class="col-sm-4 col-form-label fw-semibold">Nama Client</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" style="background-color: #b5b8b9"  id="nama_client" name="nama_client" 
                wire:model="nama_client"
                readonly />
              @error('nama_client')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
    
          <!-- Tanggal Mulai -->
          <div class="mb-3 row">
            <label for="tanggal_mulai" class="col-sm-4 col-form-label fw-semibold">Tanggal Mulai</label>
            <div class="col-sm-8">
              <input type="date" id="tanggal_mulai" name="tanggal_mulai" wire:model="tanggal_mulai"
                class="form-control @error('tanggal_mulai') is-invalid @enderror"
                style="background-color: #b5b8b9" />
              @error('tanggal_mulai')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
    
          <!-- Jumlah Item Kegiatan -->
          <div class="mb-3 row">
            <label for="jumlah_item_kegiatan" class="col-sm-4 col-form-label fw-semibold">Jumlah Item Kegiatan</label>
            <div class="col-sm-8">
              <input type="number" id="jumlah_item_kegiatan" wire:model="jumlah_item_kegiatan" name="jumlah_item_kegiatan" min="0"
                class="form-control @error('jumlah_item_kegiatan') is-invalid @enderror"
                style="background-color: #b5b8b9"  />
              @error('jumlah_item_kegiatan')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
    
          <!-- Total Durasi Kegiatan -->
          <div class="mb-3 row">
            <label for="total_durasi_kegiatan" class="col-sm-4 col-form-label fw-semibold">Total Durasi Kegiatan (Awal)</label>
            <div class="col-sm-8">
              <input type="number" id="total_durasi_kegiatan" wire:model="total_durasi_kegiatan" name="total_durasi_kegiatan" min="0"
                class="form-control @error('total_durasi_kegiatan') is-invalid @enderror"
                style="background-color: #b5b8b9"  />
              @error('total_durasi_kegiatan')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
    
          {{-- <!-- Total Float -->
          <div class="mb-3 row">
            <label for="total_float" class="col-sm-4 col-form-label fw-semibold">Total Float</label>
            <div class="col-sm-8">
              <input type="number" wire:model="total_float" id="total_float" name="total_float" min="0" step="any"
                class="form-control @error('total_float') is-invalid @enderror"
                />
              <div class="form-label-small">total waktu yang dapat ditunda tanpa mempengaruhi tanggal selesai proyek</div>
              @error('total_float')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
    
          <!-- Free Float -->
          <div class="mb-4 row">
            <label for="free_float" class="col-sm-4 col-form-label fw-semibold">Free Float</label>
            <div class="col-sm-8">
              <input type="number" wire:model="free_float" id="free_float" name="free_float" min="0" step="any"
                class="form-control @error('free_float') is-invalid @enderror"
                 />
              <div class="form-label-small">total waktu yang dapat ditunda tanpa mempengaruhi tugas berikutnya</div>
              @error('free_float')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div> --}}
    
          <!-- Submit -->
          <div class="d-flex justify-content-center">
            <button wire:click="hitung" class="btn btn-primary fw-semibold px-5 py-2">
              <span class="material-icons align-middle me-1"></span> HITUNG DAN SIMPAN
            </button>
          </div>
    
        {{-- </form> --}}
      </div>
    </main>

    {{--  --}}
    
  <main class="container px-3 px-md-5 py-4">
    <h1 class="mb-4 text-center">Result Schedule</h1>
    <div class="table-responsive">
      <table class="table table-bordered table-striped align-middle text-center">
        <thead class="table-dark align-middle">
          <tr>
            <th scope="col"  rowspan="2">No</th>
            <th scope="col"  rowspan="2">Item Pekerjaan</th>
            <th scope="col"  rowspan="2">Kode</th>
            <th scope="col"  rowspan="2">Pendahulu</th>
            <th scope="col"  rowspan="2">Durasi (Hari)</th>
            <th colspan="2" scope="col">Paling Cepat</th>
            <th colspan="2" scope="col">Paling Lambat</th>
            <th scope="col" rowspan="2">Total Float</th>
            <th scope="col" rowspan="2">Free Float</th>
          </tr>
          <tr>
       
            <th scope="col">Mulai (ES)</th>
            <th scope="col">Selesai (EF)</th>
            <th scope="col">Mulai (LS)</th>
            <th scope="col">Selesai (LF)</th>
            
          </tr>
        </thead>
        <tbody>
         @if ($result)
            @foreach ($result as $key =>$item)
                <tr>
                   <td>{{$item['no']}}</td>
                   <td>{{$item['item']}}</td>
                   <td>{{$item['code']}}</td>
                   <td>{{$item['pendahulu']}}</td>
                   <td>{{$item['durasi']}}</td>
                   <td>{{$item['es']}}</td>
                   <td>{{$item['ef']}}</td>
                   <td>{{$item['ls']}}</td>
                   <td>{{$item['lf']}}</td>
                   <td>{{$item['float']}}</td>
                   <td>{{$item['free']}}</td>
                </tr> 
            @endforeach
         @endif
        </tbody>
        
      </table>
      <div>

      </div>
      @if ($criticalPath)
        <h2 class="mb-4 text-center">Hasil Diagram</h2>
        <h4 class="mb-4 text-center">{{$criticalPath}}</h4>
        <h4 class="mb-4 text-center">Total = {{$total}} Hari (Jalur Critical)</h4>

      @endif

    </div>
  </main>

        
</div>

@push('styles')
    <style>
        .form-label-small {
          font-size: 0.875rem;
          color: #6c757d;
        }
        .table-responsive {
            max-width: 1440px;
            margin: 0 auto;
        }

        /* Responsive container max-width for large desktop */
        @media (min-width: 1440px) {
          .container-custom {
            max-width: 1200px;
          }
        }
    </style>
@endpush
