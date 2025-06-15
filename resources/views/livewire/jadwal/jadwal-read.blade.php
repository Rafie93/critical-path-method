<div>
    <h1 class="mt-4">Jadwal</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">Jadwal</li>
        <li class="breadcrumb-item active">Data</li>
    </ol>
    <div class="row">
        <div class="card mb-4">
           
            <div class="col-xl-3 col-md-3">
                <br>
                <a  class="btn btn-primary" 
                    href="{{route('jadwal.create')}}"
                        >
                    <i class="fas fa-plus-circle fs-4 me-2"></i>
                  Progress Jadwal
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
                            <th>Kode</th>
                            <th>Kegiatan</th>
                            <th>Terdahulu</th>
                            <th>Durasi</th>
                            <th>Paling Cepat</th>
                            <th>Paling Lambat</th>
                            <th>Float</th>
                            <th>Free</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no=1;
                    @endphp
                    @foreach ($data as $key=> $item)
                    <tr>
                        <td>{{ $no++}}</td>
                        <td>{{$item->kegiatan->proyek->nama_proyek}}</td>
                        <td>{{ $item->kegiatan->kode_kegiatan }}</td>
                        <td>{{ $item->kegiatan->nama_kegiatan }}</td>
                        <td>{{ $item->kegiatan->kegiatan_sebelum }}</td>
                        <td>{{ $item->durasi }}</td>
                        <td>{{ $item->cepat_selesai }}</td>
                         <td>{{ $item->lambat_selesai }}</td>
                        <td>{{ $item->total_float }}</td>
                        <td>{{ $item->free_float }}</td>
                        
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $data->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>

</div>
