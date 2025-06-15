@inject('query', 'App\Models\KehadiranQuery')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Laporan Proyek</title>
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
            <center>LAPORAN PROYEK</center>
        </h2>
        <br>
       
        <div class="row mb-3">
            <div class="col-md-6">
                <strong>Tahun : {{ date('Y') }}</strong>
            </div>
            <div class="col-md-6 text-end">
                <strong>Proyek : {{ $data->nama_proyek }} ({{ number_format($data->progress_proyek,2) }}%)</strong>
            </div>
        </div>

        <br />
        <table style="width: 100%" class="receipt-table full-bordered">
            <thead>
                <tr>
                    <th rowspan="2">No</th>
                    <th rowspan="2">Kegiatan</th>
                    <th rowspan="2">Durasi<br>(Hari)</th>
                    <th colspan="8">Minggu Ke</th>
                </tr>

            </thead>
            <tbody>
                @foreach ($kegiatans as $index => $kegiatan)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td class="text-start">{{ $kegiatan['nama'] }}</td>
                    <td align="center">{{ $kegiatan['durasi_hari'] }}</td>
                    @for ($i = 1; $i <= 8; $i++)
                        <td class="{{ $kegiatan['minggu_aktif'][$i] ? 'week-active' : '' }}">
                            {{ $kegiatan['minggu_aktif'][$i] ? '✓' : '' }}
                        </td>
                    @endfor
                </tr>
                @endforeach
            </tbody>
        </table>
      
        @include('livewire.laporan.footer')
    </section>
</body>

</html>
