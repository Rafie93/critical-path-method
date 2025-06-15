@inject('query', 'App\Models\KehadiranQuery')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Laporan Aktivitas</title>
    <link rel="stylesheet" href="{{ asset('css/pdf.css') }}" />
    <style type="text/css">
        @page {
            size: A4;
            margin: 0;
            /* landscape */
            size: 29.7cm 21cm;
        }

        body {
            margin: 0;
        }
        .week-active {
            background-color: #d4edda;
        }

        @media screen {
            div.divFooter {
                display: none;
            }
        }

        @media print {
            div.divFooter {
                position: fixed;
                bottom: 0.6cm;
                text-align: right;

            }

            .noPrint {
                display: none;
            }
        }
    </style>
</head>

<body >
    <section class="sheet padding-5mm">

        @include('livewire.laporan.header')
        <hr>

        <h2>
            <center>LAPORAN AKTIVITAS PROYEK</center>
        </h2>
        <br>

        @foreach ($data as $item)
            <div class="row mb-3">
                <div class="col-md-6">
                    <strong>Tahun : {{ date('Y') }}</strong>
                </div>
                <div class="col-md-6 text-end">
                    <strong>Proyek : {{ $item->nama_proyek }} ({{ number_format($item->progress_proyek,2) }}%)</strong>
                </div>
            </div>

            <br />
            <table style="width: 100%" class="receipt-table full-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kegiatan</th>
                        <th>Aktivitas</th>
                        <th>Tgl Aktivitas</th>
                        <th>Progress</th>
                        <th>Status</th>
                        <th>Keterangan</th>
                    </tr>

                </thead>
                <tbody>
                    @foreach ($item->kegiatanProyek()->get() as $index => $row)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{$row->nama_kegiatan}}</td>
                        <td>
                            @foreach ($row->aktivitasProyek()->get() as $item)
                            {{$item->nama_aktivitas}} <br/>
                            @endforeach
                        </td>
                        <td>
                            @foreach ($row->aktivitasProyek()->get() as $item)
                            {{$item->tgl_aktivitas}} <br/>
                            @endforeach
                        </td>
                        <td>
                            @foreach ($row->aktivitasProyek()->get() as $item)
                            {{$item->progress_kegiatan}} <br/>
                            @endforeach
                        </td>
                        <td>
                            @foreach ($row->aktivitasProyek()->get() as $item)
                            {{$item->status}} <br/>
                            @endforeach
                        </td>
                        <td>
                            @foreach ($row->aktivitasProyek()->get() as $item)
                            {{$item->keterangan}} <br/>
                            @endforeach
                        </td>
                       
                       
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endforeach
       
       
      
        @include('livewire.laporan.footer')
    </section>
</body>

</html>
