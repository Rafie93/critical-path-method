<div>
    <h1 class="mt-4">Tukang</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">Tukang</li>
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
                        <th>Nama</th>
                        <th>No Telp</th>
                        <th>Email</th>
                        <th>Alamat</th>
                        <th>Kepala</th>
                        <th>Aksi</th>
                    </tr>
                    @php
                        $no=1;
                    @endphp
                    @foreach ($sales as $key=> $sale)
                    <tr>
                        <td>{{ $no++}}</td>
                        <td>{{ $sale->nama }}</td>
                        <td>{{ $sale->no_telp }}</td>
                        <td>{{ $sale->user ? $sale->user->email : '' }}</td>
                        <td>{{ $sale->alamat }}</td>
                        <td align="center">{{ $sale->is_kepala==1 ? 'Ya' : 'Tidak' }}</td>
                        <td><a wire:click="edit('{{$sale->id_tukang}}')" class="btn btn-secondary" 
                            >Edit</a>
                            <button wire:click="delete('{{$sale->id_tukang}}')" class="btn btn-danger" 
                            >Hapus</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
                {{ $sales->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>

    
    {{-- @if ($openForm) --}}
    <div wire:ignore.self class="modal fade" tabindex="-1" id="add_menu_item_modal">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">{{$updateMode ?'Edit ' : 'Tambah'}} Data Tukang</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              </button>
            </div>
            <div class="modal-body">
              <form wire:submit.prevent="store">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" wire:model="nama" name="nama" >
                </div>
                @error('nama') <i class="text-danger">{{ $message }}</i> @enderror
                <div class="form-group">
                    <label for="no_telp">No Telp</label>
                    <input type="text" class="form-control" id="no_telp" wire:model="no_telp" name="no_telp" >
                </div>
                @error('no_telp') <i class="text-danger">{{ $message }}</i> @enderror
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" wire:model="email" name="email" >
                </div>
                @error('email') <i class="text-danger">{{ $message }}</i> @enderror
                <div class="form-group">
                    <label for="area_sales">Alamat</label>
                    <input type="text" class="form-control" id="alamat" wire:model="alamat" name="alamat" >
                    @error('alamat') <i class="text-danger">{{ $message }}</i> @enderror

                </div>
                <div class="form-group">
                    <label for="target">Jabatan</label>
                    <select name="is_kepala" wire:change="iskepala" wire:model="is_kepala" class="form-control">
                        <option value="0">Anggota</option>
                        <option value="1">Kepala Tukang</option>
                        
                    </select>
                    @error('is_kepala') <i class="text-danger">{{ $message }}</i> @enderror

                </div>
                @if ($is_kepala==1)
                    <div class="form-group">
                        <label for="area_sales">Password Login Kepala Tukang</label>
                        <input type="password" class="form-control" id="password" wire:model="password" name="password" >
                        @error('password') <i class="text-danger">{{ $message }}</i> @enderror
                    </div>
                @endif
               
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">{{$updateMode ? 'Update' : 'Simpan'}}</button>
              <button type="button" class="btn btn-secondary"
              data-bs-dismiss="modal">Close</button>
            </div>
        </form>

          </div>
    </div>
    {{-- @endif --}}
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
