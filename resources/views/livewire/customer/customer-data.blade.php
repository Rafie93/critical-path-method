<div>
    <h1 class="mt-4">Client</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">Client</li>
        <li class="breadcrumb-item active">Data</li>
    </ol>
    <div class="row">
        <div class="card mb-4">
           
            <div class="col-xl-3 col-md-3">
                <br>
                <button type="button" class="btn btn-primary" 
                    data-bs-toggle="modal" data-bs-target="#add_menu_item_modal">
                    <i class="fas fa-plus-circle fs-4 me-2"></i>
                    Tambah Data
                </button>
            </div>
            <div class="col-xl-9 col-md-9">
            </div>
            <div class="card-body ">
                <table class="table table-bordered">
                    <tr>
                        <th>No</th>
                        <th>Nama Perusahaan</th>
                        <th>Nama CLient</th>
                        <th>Alamat</th>
                        <th>No HP</th>
                        <th>NIK</th>
                        <th>Deskripsi</th>
                        <th>NPWP</th>
                        
                        <th>Aksi</th>
                    </tr>
                    @php
                        $no=1;
                    @endphp
                    @foreach ($data as $key=> $item)
                    <tr>
                        <td>{{ $no++}}</td>
                        <td>{{$item->nama_perusahaan}}</td>
                        <td>{{ $item->nama_client  }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>{{ $item->no_hp }}</td>
                        <td>{{ $item->nik }}</td>
                        <td>{{ $item->deskripsi }}</td>
                        <td>{{ $item->no_npwp }}</td>
                        <td><a wire:click="edit('{{$item->id_client}}')" class="btn btn-secondary" 
                            >Edit</a>
                            <button wire:click="delete('{{$item->id_client}}')" class="btn btn-danger" 
                            >Hapus</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
                {{ $data->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" tabindex="-1" id="add_menu_item_modal">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">{{$updateMode ?'Edit ' : 'Tambah'}} Data Client</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              </button>
            </div>
            <div class="modal-body">
              <form wire:submit.prevent="store">
                <div class="form-group">
                    <label for="nama">Nama Perusahaan (*)</label>
                    <input type="text" class="form-control" id="nama" wire:model="nama_perusahaan" name="nama" >
                    @error('nama_perusahaan') <i class="text-danger">{{ $message }}</i> @enderror

                </div>
                <div class="form-group">
                    <label for="nama">Nama Client (*)</label>
                    <input type="text" class="form-control" id="nama" wire:model="nama_client">
                    @error('nama_client') <i class="text-danger">{{ $message }}</i> @enderror

                </div>
                <div class="form-group">
                    <label for="no_telp">No HP (*)</label>
                    <input type="text" class="form-control" id="no_hp" wire:model="no_hp" name="no_hp" >
                    @error('no_hp') <i class="text-danger">{{ $message }}</i> @enderror

                </div>
                <div class="form-group">
                    <label for="email">NIK </label>
                    <input type="text" class="form-control" id="nik" wire:model="nik" name="nik" >
                    @error('nik') <i class="text-danger">{{ $message }}</i> @enderror

                </div>
               
                 <div class="form-group">
                    <label for="area_sales">Alamat (*)</label>
                    <input type="text" class="form-control"  id=" alamat " wire:model="alamat" name="alamat " >
                    @error('alamat') <i class="text-danger">{{ $message }}</i> @enderror

                </div>
               
                <div class="form-group">
                    <label for="email">No NPWP</label>
                    <input type="text" class="form-control" id="no_npwp" wire:model="no_npwp" name="no_npwp" >
                    @error('no_npwp') <i class="text-danger">{{ $message }}</i> @enderror

                </div>
                <div class="form-group">
                    <label for="area_sales">Deskripsi</label>
                    <textarea class="form-control"  id=" deskripsi " wire:model="deskripsi" name="deskripsi " ></textarea>
                    @error('deskripsi') <i class="text-danger">{{ $message }}</i> @enderror

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
