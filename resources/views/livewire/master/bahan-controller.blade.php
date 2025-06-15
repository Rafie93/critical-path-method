<div>
    <h1 class="mt-4">Bahan Material</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">Bahan Material</li>
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
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Bahan</th>
                            <th>Kategori</th>
                            <th>Merk</th>
                            <th>Ukuran</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no=1;
                    @endphp
                    @foreach ($data as $key=> $k)
                    <tr>
                        <td>{{ $no++}}</td>
                        <td>{{$k->nama_bahan}}</td>
                        <td>{{$k->kategori}}</td>
                        <td>{{$k->merk}}</td>
                        <td>{{$k->ukuran}}</td>
                        <td align="right">{{number_format($k->harga)}}</td>
                        <td><a wire:click="showForm('{{$k->id_bahan}}')" class="btn btn-secondary" 
                            >Edit</a>
                            <button wire:click="delete('{{$k->id_bahan}}')" class="btn btn-danger" 
                            >Hapus</a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $data->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>

    
    {{-- @if ($openForm) --}}
    <div wire:ignore.self class="modal fade" tabindex="-1" id="add_menu_item_modal">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">{{$openForm ?'Edit ' : 'Tambah'}} Data Bahan Material</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              </button>
            </div>
            <div class="modal-body">
              <form wire:submit.prevent="store">
                <div class="form-group">
                  <label for="recipient" class="form-control-label">Nama Bahan : (*)</label>
                  <input type="text" class="form-control" id="recipient" wire:model="nama_bahan"/>
                  @error('nama_bahan') <i class="text-danger">{{ $message }}</i> @enderror
                </div>
                <div class="form-group">
                    <label for="recipient" class="form-control-label">Kategori : (*)</label>
                    <input type="text" class="form-control" id="recipient" wire:model="kategori"/>
                    @error('kategori') <i class="text-danger">{{ $message }}</i> @enderror
                  </div>
                <div class="form-group mt-2">
                    <label for="recipient" class="form-control-label">Merk :</label>
                    <input type="text" class="form-control" id="recipient" wire:model="merk"/>
                    @error('merk') <i class="text-danger">{{ $message }}</i> @enderror
                </div>
                <div class="form-group mt-2">
                    <label for="recipient" class="form-control-label">Ukuran :</label>
                    <input type="text" class="form-control" id="recipient" wire:model="ukuran"/>
                    @error('ukuran') <i class="text-danger">{{ $message }}</i> @enderror
                </div>
                <div class="form-group mt-2">
                    <label for="recipient" class="form-control-label">Harga : (*)</label>
                    <input type="number" class="form-control" id="recipient" wire:model="harga"/>
                    @error('harga') <i class="text-danger">{{ $message }}</i> @enderror
                </div>
               
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">{{$openForm ? 'Update' : 'Simpan'}}</button>
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
