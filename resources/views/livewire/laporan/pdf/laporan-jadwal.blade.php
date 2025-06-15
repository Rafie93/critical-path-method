@inject('query', 'App\Models\KehadiranQuery')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Laporan Jadwal</title>
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
            <center>LAPORAN JADWAL PROYEK</center>
        </h2>
        <br>
        <h3>
            {{-- BULAN --}}
            <center>
               {{date('Y')}}
            </center>
        </h3>

        <br />
        <table style="width: 100%" class="receipt-table full-bordered">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>NAMA</th>
                    <th>PROGRESS</th>
                    <th>STATUS</th>
                    <th>JAN</th>
                    <th>FEB</th>
                    <th>MAR</th>
                    <th>APR</th>
                    <th>MEI</th>
                    <th>JUN</th>
                    <th>JUL</th>
                    <th>AGS</th>
                    <th>SEP</th>
                    <th>OKT</th>
                    <th>NOV</th>
                    <th>DES</th>
                </tr>

            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
               
                 @foreach ($data as $proyek)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $proyek->nama_proyek.' | '. $proyek->client->nama_client }}</td>
                        <td align="center">{{ number_format($proyek->progress_proyek,2) }} %</td>
                        <td>{{ $proyek->status_proyek }}</td>
                        @foreach($bulan as $index => $namaBulan)
                        @php
                            $bulanIndex = $index + 1;
                            $isActive = false;
                            
                            if ($proyek->tgl_mulai ) {
                                $tahunMulai = \Carbon\Carbon::parse($proyek->tgl_mulai)->year;
                                $tahunSelesai = \Carbon\Carbon::parse($proyek->batas_waktu)->year;
                                for ($tahun = $tahunMulai; $tahun <= $tahunSelesai; $tahun++) {
                                    $tglAwalBulan = \Carbon\Carbon::create($tahun, $bulanIndex, 1)->startOfMonth();
                                    $tglAkhirBulan = \Carbon\Carbon::create($tahun, $bulanIndex, 1)->endOfMonth();
                                    
                                    if ($proyek->tgl_mulai <= $tglAkhirBulan && $proyek->batas_waktu >= $tglAwalBulan) {
                                        $isActive = true;
                                        break;
                                    }
                                }
                            }
                            
                         @endphp
                          <td align="center">{{$isActive ? 'X' : ''}}</td>
                        @endforeach
                    </tr>
                @endforeach 
            </tbody>
        </table>
      
        @include('livewire.laporan.footer')
    </section>
</body>

</html>
