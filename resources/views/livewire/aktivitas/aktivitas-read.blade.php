<div>
    <h1 class="mt-4">Aktivitas</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">Aktivitas</li>
        <li class="breadcrumb-item active">Data</li>
    </ol>
    <div class="row">
        <div class="card mb-4">
           
            <div class="col-xl-3 col-md-3">
                <br>
                <a  class="btn btn-primary" 
                    href="{{route('aktivitas.create')}}"
                        >
                    <i class="fas fa-plus-circle fs-4 me-2"></i>
                  Tambah Aktivitas
                </a>
            </div>
            <div class="col-xl-9 col-md-9">
            </div>
            <div class="card-body ">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Proyek</th>
                            <th>Kegiatan</th>
                            <th>Aktivitas</th>
                            <th>Tanggal</th>
                            <th>Progress</th>
                            <th>Status</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no=1;
                    @endphp
                    @foreach ($data as $key=> $item)
                    <tr>
                        <td>{{ $no++}}</td>
                        <td>{{$item->kegiatanProyek->proyek->nama_proyek}}</td>
                        <td>{{$item->kegiatanProyek->nama_kegiatan." (".$item->kegiatanProyek->kode_kegiatan.")"}}</td>

                        <td>{{ $item->nama_aktivitas }}</td>
                        <td>{{ $item->tgl_aktivitas }}</td>
                        <td>{{ $item->progress_kegiatan }}</td>
                        <td>{{ $item->status }}</td>
                         <td>{{ $item->keterangan }}</td>
                         <td><a href="{{route('aktivitas.edit',$item->id_aktivitas)}}" class="btn btn-secondary" 
                            >Edit</a>
                            <button wire:click="delete('{{$item->id_aktivitas}}')" class="btn btn-danger" 
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

</div>
