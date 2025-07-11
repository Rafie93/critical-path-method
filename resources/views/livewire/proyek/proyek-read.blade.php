<div>
    <h1 class="mt-4">Proyek</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">Proyek</li>
        <li class="breadcrumb-item active">Data</li>
    </ol>
    <div class="row">
        <div class="card mb-4">
           
            <div class="col-xl-3 col-md-3">
                <br>
                <a  class="btn btn-primary" 
                    href="{{route('proyek.create')}}"
                        >
                    <i class="fas fa-plus-circle fs-4 me-2"></i>
                  Tambah Proyek
                </a>
            </div>
            <div class="col-xl-9 col-md-9">
            </div>
            <div class="card-body ">
                <table class="table table-bordered">
                    <tr>
                        <th>No</th>
                        <th>Proyek</th>
                        <th>Client</th>
                        <th>Alamat</th>
                        <th>Tgl Mulai</th>
                        <th>Batas Waktu</th>
                        <th>Kegiatan</th>
                        <th>Progress</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                    @php
                        $no=1;
                    @endphp
                    @foreach ($data as $key=> $item)
                    <tr>
                        <td>{{ $no++}}</td>
                        <td>{{$item->nama_proyek}}</td>
                        <td>{{ $item->client->nama_perusahaan }}</td>
                        <td>{{ $item->alamat_proyek }}</td>
                        <td>{{ $item->tgl_mulai }}</td>
                        <td>{{ $item->batas_waktu }}</td>
                        <td>{{ $item->display_kegiatan() }}</td>
                        <td align="center">{{ number_format($item->progress_proyek,2) }} %</td>
                        <td>{{ $item->status_proyek }}</td>

                        <td>
                            <a href="{{route('proyek.kegiatan',$item->id_proyek)}}" class="btn btn-success" 
                                >Kegiatan</a>
                            {{-- <a wire:click="detail('{{$item->id_proyek}}')" class="btn btn-primary" 
                                >View</a> --}}
                            <a wire:navigate href="{{route('proyek.edit',$item->id_proyek)}}" class="btn btn-secondary" 
                            >Edit</a>
                            <a wire:click="delete('{{$item->id_proyek}}')" class="btn btn-danger" 
                                >Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
                {{ $data->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>

</div>
