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
            <center>LAPORAN PEMAKAIAN BAHAN</center>
        </h2>
        <br>

            <div class="row mb-3">
                <div class="col-md-6">
                    <strong>Tahun : {{ date('Y') }}</strong>
                </div>
              
            </div>

            <br />
            <table style="width: 100%" class="receipt-table full-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kegiatan</th>
                        <th>Tanggal</th>
                        <th>Bahan</th>
                        <th>Jumlah</th>
                        <th>Status</th>
                        <th>Keterangan</th>
                    </tr>

                </thead>
                <tbody>
                    @foreach ($data as $index => $row)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{$row->kegiatanProyek->nama_kegiatan}}</td>
                        <td>
                            {{$row->tanggal}}
                        </td>
                        <td>
                            {{$row->bahanMaterial->nama_bahan}}
                        </td>
                        <td align="center">
                            {{$row->jumlah}}
                        </td>
                        <td>
                            {{$row->statusDisplay()}}
                        </td>
                        <td>
                            {{$row->keterangan}}
                        </td>
                       
                       
                    </tr>
                    @endforeach
                </tbody>
            </table>
       
       
      
        @include('livewire.laporan.footer')
    </section>
</body>

</html>
