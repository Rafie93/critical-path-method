<div>
    <h1 class="mt-4">Proyek</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">Proyek</li>
        <li class="breadcrumb-item active">Kegiatan Proyek</li>
    </ol>

    <div class="container border border-2 border-black rounded" style="border-radius: 0.5rem;">
        <!-- Header -->
        <div class="border-bottom border-2 border-black px-3 py-1">
          <h1 class="fs-6 fw-normal m-0">Detail Proyek - Kegiatan</h1>
        </div>
    
        <!-- Info row -->
        <div class="d-flex border-bottom border-2 border-black px-3 py-2 fs-6">
          <div class="flex-grow-1 d-flex align-items-center border-end border-2 border-black pe-3">
            <span class="text-nowrap">Nama Proyek</span>
            <span class="mx-1">:</span>
            <span class="flex-grow-1 border border-1 border-black rounded px-1 text-center" 
            style="min-width: 6rem;">{{$proyek->nama_proyek}}</span>
          </div>
          <div class="flex-grow-1 d-flex align-items-center border-end border-2 border-black px-3">
            <span class="text-nowrap">Client</span>
            <span class="mx-1">:</span>
            <span class="flex-grow-1 border border-1 border-black rounded px-1 text-center"
             style="min-width: 6rem;">{{$proyek->client->nama_client}}</span>
          </div>
          <div class="flex-grow-1 d-flex align-items-center px-3">
            <span class="text-nowrap">Progress</span>
            <span class="mx-1">:</span>
            <span class="flex-grow-1 border border-1 border-black rounded px-1 text-center"
             style="min-width: 6rem;">{{number_format($proyek->progress_proyek,2)}} %</span>
          </div>
        </div>
    
        <!-- Button -->
        <div class="px-3 py-2">
          <button type="button" class="btn btn-primary" 
            data-bs-toggle="modal" data-bs-target="#add_menu_item_modal" wire:click="clickType(1)">
            <i class="fas fa-plus-circle fs-4 me-2"></i>
            Tambah Kegiatan
        </button>

        {{-- <button type="button" class="btn btn-secondary" 
          data-bs-toggle="modal" data-bs-target="#add_menu_item_modal" wire:click="clickType(2)">
            Import Kegiatan
        </button> --}}
        </div>
    
        <!-- Table -->
        <div class="table-responsive px-3 pb-3">
          <table class="table table-bordered">
             <thead class="table-light" style="background-color: #e5e7eb !important;">
              <tr>
                <th >No</th>
                <th >Kode</th>
                <th  >Nama Kegiatan</th>
                <th  >Terdahulu</th>
                <th >Durasi (Hari)</th>
                {{-- <th style="width: 7rem;">Status</th> --}}
                <th >Progres (%)</th>
                <th >Aksi</th>
              </tr>
            </thead>
            <tbody>
              @php
                  $no=1;
                  $durasi=0;
                  $progress=0;
              @endphp
              @foreach ($proyek->kegiatanProyek()->get() as $item)
                  <tr>
                    <td>{{$no++}}</td>
                    <td>{{$item->kode_kegiatan}}</td>
                    <td>{{$item->nama_kegiatan}}</td>
                    <td>{{$item->kegiatan_sebelum}}</td>
                    <td>{{$item->durasi}}</td>
                    <td>{{$item->progress_kegiatan}}</td>
                    <td><a wire:click="edit('{{$item->id_kegiatan}}')" class="btn btn-secondary" 
                      >Edit</a>
                      <button wire:click="delete('{{$item->id_kegiatan}}')" class="btn btn-danger" 
                      >Hapus</a>
                  </td>
                  </tr>
                  @php
                      $durasi+=$item->durasi;
                      $progress+=$item->progress_kegiatan;
                  @endphp
              @endforeach
             
            </tbody>
            <tfoot>
              <tr>
                <td colspan="4">Total</td>
                <td>{{$durasi}} Hari</td>
                <td>{{$progress!=0 ? number_format($progress/$proyek->kegiatanProyek()->get()->count(),2) : 0}} %</td>
                <td></td>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>

      <div wire:ignore.self class="modal fade" tabindex="-1" id="add_menu_item_modal">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">{{$updateMode ?'Edit ' : 'Tambah'}} Data Kegiatan</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              </button>
            </div>
            <div class="modal-body">
              <form wire:submit.prevent="store">
                <div class="form-group">
                    <label for="code">Kode Kegiatan</label>
                    <input type="text" maxlength="4" class="form-control" id="kode_kegiatan" wire:model="kode_kegiatan" name="kode_kegiatan" >
                    @error('kode_kegiatan') <i class="text-danger">{{ $message }}</i> @enderror
                </div>
                <div class="form-group">
                  <label for="nama">Nama Kegiatan</label>
                  <input type="text" class="form-control" id="nama_kegiatan" wire:model="nama_kegiatan" name="nama_kegiatan" >
                  @error('nama_kegiatan') <i class="text-danger">{{ $message }}</i> @enderror
              </div>
                <div class="form-group">
                    <label for="kegiatan_sebelum">Kegiatan Terdahulu</label>
                      <select name="kegiatan_sebelums" multiple wire:model="kegiatan_sebelum" class="form-control">
                      <option value="-">-</option>
                      @foreach ($proyek->kegiatanProyek()->get() as $item)
                        <option value="{{$item->kode_kegiatan}}">{{$item->kode_kegiatan}}</option>
                      @endforeach
                    </select>
                    {{-- <input type="text" maxlength="4"  class="form-control" id="kegiatan_sebelum" wire:model="kegiatan_sebelum" name="kegiatan_sebelum" > --}}
                    @error('kegiatan_sebelum') <i class="text-danger">{{ $message }}</i> @enderror
                </div>
                <div class="form-group">
                  <label for="nama">Durasi Kegiatan</label>
                  <input type="number" class="form-control" id="durasi" wire:model="durasi" name="durasi" >
                    @error('durasi') <i class="text-danger">{{ $message }}</i> @enderror
                </div>
                <div class="form-group">
                  <label for="nama">Progres Kegiatan</label>
                  <input type="number" class="form-control" id="progress_kegiatan" wire:model="progress_kegiatan" name="progress_kegiatan" >
                    @error('progress_kegiatan') <i class="text-danger">{{ $message }}</i> @enderror
                </div>
             
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">{{$updateMode ? 'Update' : 'Simpan'}}</button>
              <button type="button" class="btn btn-secondary"
              data-bs-dismiss="modal">Close</button>
            </div>
        </form>

          </div>
    </div>

    {{--  --}}
    <div wire:ignore.self class="modal fade" tabindex="-1" id="add_menu_item_modal1">
      <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Import Data Kegiatan Dari Proyek</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
          </div>
          <div class="modal-body">
            <form wire:submit.prevent="store1">
              <div class="form-group">
                  <label for="code">Kode Kegiatan</label>
                  <input type="text" maxlength="4" class="form-control" id="kode_kegiatan" wire:model="kode_kegiatan" name="kode_kegiatan" >
                  @error('kode_kegiatan') <i class="text-danger">{{ $message }}</i> @enderror
              </div>
           
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">IMPORT</button>
            <button type="button" class="btn btn-secondary"
            data-bs-dismiss="modal">Close</button>
          </div>
      </form>

        </div>
  </div>
</div>

@push('scripts')
    <script>
     document.addEventListener('livewire:load', function () {
        // console.log(this.$wire.foo);
    });    
    window.addEventListener('close-modal', event => {
         $('#add_menu_item_modal').modal('hide');
    })
    Livewire.on('show-modal', () => {
      $('#add_menu_item_modal').modal('show');

    });
    </script>
@endpush

