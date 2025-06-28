<div>
    <h1 class="mt-4">Suplai Bahan</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">Suplai Bahan</li>
        <li class="breadcrumb-item active">Data</li>
    </ol>
    <div class="row">
        <div class="card mb-4">
           
            <div class="col-xl-3 col-md-3">
                <br>
                <a  class="btn btn-primary" 
                    href="{{route('suplai.create')}}"
                        >
                    <i class="fas fa-plus-circle fs-4 me-2"></i>
                  Tambah Suplai Bahan
                </a>
            </div>
            <div class="col-xl-9 col-md-9">
            </div>
            <div class="card-body ">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tukang Meminta</th>
                            <th>Tanggal</th>
                            <th>Proyek</th>
                            <th>Kegiatan</th>
                            <th>Bahan</th>
                            <th>Jumlah</th>
                            <th>Status</th>
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
                        <td>{{$item->tukang ? $item->tukang->nama : '-'}}</td>
                        <td>{{ $item->tanggal }}</td>
                        <td>{{ $item->kegiatanProyek->proyek->nama_proyek }}</td>
                        <td>{{ $item->kegiatanProyek->nama_kegiatan }}</td>
                         <td>{{ $item->bahanMaterial->nama_bahan }}</td>
                         <td align="center">{{ $item->jumlah }}</td>
                         <td>{{ $item->statusDisplay() }}</td>

                         <td>
                            <a href="{{route('suplai.edit',$item->id)}}" class="btn btn-success" 
                                >Edit</a>
                            <a wire:click="delete('{{$item->id}}')" class="btn btn-danger" 
                                >Delete</a>
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
