@inject('query', 'App\Models\KehadiranQuery')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Laporan Perhitungan Proyek</title>
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
            <center>LAPORAN PERHITUNGAN PROYEK</center>
        </h2>
        <br>

        @foreach ($data as $item)
            <div class="row mb-3">
                <div class="col-md-6 text-end">
                    <strong>Proyek : {{ $item->nama_proyek }} ({{ number_format($item->progress_proyek,2) }}%)</strong>
                </div>
            </div>

            <br />
            <table style="width: 100%" class="receipt-table full-bordered">
                <thead>
                    <tr>
                        <th rowspan="2">No</th>
                        <th rowspan="2">Item</th>
                        <th rowspan="2">Kode</th>
                        <th rowspan="2">Pendahulu</th>
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
                    @php
                        $no=1;
                    @endphp
                    @foreach ($item->kegiatanProyek()->get() as $row)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$row->nama_kegiatan}}</td>
                            <td align="center">{{$row->kode_kegiatan}}</td>
                            <td align="center">{{$row->kegiatan_sebelum}}</td>
                            <td align="center">{{$row->durasi}}</td>
                            <td align="center">{{$row->es}}</td>
                            <td align="center">{{$row->ef}}</td>
                            <td align="center">{{$row->ls}}</td>
                            <td align="center">{{$row->lf}}</td>
                            <td align="center">{{$row->total_float}}</td>
                            <td align="center">{{$row->free_float}}</td>
                        </tr>
                    @endforeach

                </tbody>
               
            </table>
        @endforeach
       
       
      
        @include('livewire.laporan.footer')
    </section>
</body>

</html>
