<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIPDKM</title>
    <link rel="shortcut icon" href="{{asset('logo1.jpg')}}" type="image/x-icon">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .kop-surat {
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            border-bottom: 2px solid black;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .kop-surat img {
            width: 80px;
            height: 80px;
            margin-right: 20px;
        }
        .kop-surat .text {
            text-align: center;
        }
        .kop-surat .text h1 {
            margin: 0;
            font-size: 24px;
        }
        .kop-surat .text h2 {
            margin: 0;
            font-size: 20px;
            font-weight: normal;
        }
        .kop-surat .text h3 {
            margin: 0;
            font-size: 16px;
            font-weight: normal;
        }
        .kop-surat .text p {
            margin: 0;
            font-size: 16px;
            font-style: italic;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: center;

        }
        th {
            background-color: #f4f4f4;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #e0e0e0;
        }
        h1{
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div class="kop-surat">
        
        {{-- <img src="{{asset('logo1.jpg')}}" alt="Logo Posyandu"> <!-- Ganti logo.png dengan path logo --> --}}
        <div class="text">
            <center>
            <h1>Sistem Informasi Produksi Tas</h1>
            <h2>Maxvolum</h2>
            <h3>Laporan Stok Produksi</h3>
        </center>
        </div>

    </div>
    <div class="card">
        <center>
        <h1>Laporan Stok Aksesoris</h1>
    </center>
        <div class="col-sm-12">
            <table>
                <thead>                                 
                    <tr>
                      <th>No</th>
                      <th>Tanggal</th>
                      <th>Jenis Bahan</th>
                      <th>Stok</th>
                      <th>Diambil</th>
                      <th>Sisa</th>

               
                    </tr>
                  </thead>
                  <tbody>                                 
                    @foreach ($jenis1 as $no => $j)
                        <tr>
                            <td>{{$no+1}}</td>
                            <td>{{date("d/M/Y", strtotime($j->created_at));}}</td>
                            <td>{{$j->nama_material}}</td>
                            <td>
                                @php
                            $totalWarnaStok = $j->totalWarnaStok();
                        @endphp
                        @if($totalWarnaStok->isNotEmpty())
                            @foreach($j->totalWarnaStok() as $warna => $total)
                            @if ($warna == "Merah")
                            <span>{{ $warna }}: {{ $total }}</span><br>
                            @elseif ($warna == "Biru")
                            <span>{{ $warna }}: {{ $total }}</span><br>
                            @elseif ($warna == "Hitam")
                            <span>{{ $warna }}: {{ $total }}</span><br>
                            @elseif ($warna == "Silver")
                            <span>{{ $warna }}: {{ $total }}</span><br>
                            @else
                            <span>{{ $total }}</span><br>
                           
                            @endif
                               
                            @endforeach
                        @else
                            <span class="text-muted">Tidak ada stok</span>
                        @endif
                            
                      
                            </td>
                            <td>
                                @php
                            $totalWarnaStokAmbil = $j->totalWarnaStokAmbil();
                        @endphp
                      @if($totalWarnaStokAmbil->isNotEmpty())
                            @foreach($j->totalWarnaStokAmbil() as $warna => $total)
                            @if ($warna == "Merah")
                            <span>{{ $warna }}: {{ $total }}</span><br>
                            @elseif ($warna == "Biru")
                            <span>{{ $warna }}: {{ $total }}</span><br>
                            @elseif ($warna == "Hitam")
                            <span>{{ $warna }}: {{ $total }}</span><br>
                            @elseif ($warna == "Silver")
                            <span>{{ $warna }}: {{ $total }}</span><br>
                            @else
                            <span>{{ $total }}</span><br>
                            @endif
                               
                            @endforeach
                            @else
                            <span class="text-muted">Tidak ada stok</span>
                        @endif
                            </td>
                            <td>
                                @php
                                     $sisaStok = $j->sisaStok();
                                 @endphp
                            @if($totalWarnaStok->isNotEmpty())
                                 @foreach($j->sisaStok() as $warna => $total)
                                 @if ($warna == "Merah")
                                 <span>{{ $warna }}: {{ $total }}</span><br>
                                 @elseif ($warna == "Biru")
                                 <span>{{ $warna }}: {{ $total }}</span><br>
                                 @elseif ($warna == "Hitam")
                                 <span>{{ $warna }}: {{ $total }}</span><br>
                                 @elseif ($warna == "Silver")
                                 <span>{{ $warna }}: {{ $total }}</span><br>
                                 @else
                                 <span>{{ $total }}</span>
                                 @endif
                                    
                                 @endforeach
                                 @else
                            <span class="text-muted">Tidak ada stok</span>
                        @endif
                            </td>
                          
                        </tr>
                    @endforeach
                  </tbody>
            </table>
        </div>
    </div>

    <div class="card">
        <center>
        <h1>Laporan Stok Bahan</h1>
    </center>
        <div class="col-sm-12">
            <table>
                <thead>                                 
                    <tr>
                      <th>No</th>
                      <th>Tanggal</th>
                      <th>Jenis Bahan</th>
                      <th>Stok</th>
                      <th>Diambil</th>
                      <th>Sisa</th>

                    </tr>
                  </thead>
                  <tbody>                                 
                    @foreach ($jenis2 as $no => $j)
                        <tr>
                            <td>{{$no+1}}</td>
                            <td>{{date("d/M/Y", strtotime($j->created_at));}}</td>
                            <td>{{$j->nama_bahan}}</td>
                            <td>
                                @php
                            $totalWarnaStok = $j->totalWarnaStok();
                        @endphp
                        @if($totalWarnaStok->isNotEmpty())
                            @foreach($j->totalWarnaStok() as $warna => $total)
                            @if ($warna == "Merah")
                            <span>{{ $warna }}: {{ $total }}</span><br>
                            @elseif ($warna == "Biru")
                            <span>{{ $warna }}: {{ $total }}</span><br>
                            @elseif ($warna == "Hitam")
                            <span>{{ $warna }}: {{ $total }}</span><br>
                            @elseif ($warna == "Silver")
                            <span>{{ $warna }}: {{ $total }}</span><br>
                            @else
                            <span>{{ $total }}</span><br>
                           
                            @endif
                               
                            @endforeach
                        @else
                            <span class="text-muted">Tidak ada stok</span>
                        @endif
                            
                      
                            </td>
                            <td>
                                @php
                            $totalWarnaStokAmbil = $j->totalWarnaStokAmbil();
                        @endphp
                      @if($totalWarnaStokAmbil->isNotEmpty())
                            @foreach($j->totalWarnaStokAmbil() as $warna => $total)
                            @if ($warna == "Merah")
                            <span>{{ $warna }}: {{ $total }}</span><br>
                            @elseif ($warna == "Biru")
                            <span>{{ $warna }}: {{ $total }}</span><br>
                            @elseif ($warna == "Hitam")
                            <span>{{ $warna }}: {{ $total }}</span><br>
                            @elseif ($warna == "Silver")
                            <span>{{ $warna }}: {{ $total }}</span><br>
                            @else
                            <span>{{ $total }}</span><br>
                            @endif
                               
                            @endforeach
                            @else
                            <span class="text-muted">Tidak ada stok</span>
                        @endif
                            </td>
                            <td>
                                @php
                                     $sisaStok = $j->sisaStok();
                                 @endphp
                            @if($totalWarnaStok->isNotEmpty())
                                 @foreach($j->sisaStok() as $warna => $total)
                                 @if ($warna == "Merah")
                                 <span>{{ $warna }}: {{ $total }}</span><br>
                                 @elseif ($warna == "Biru")
                                 <span>{{ $warna }}: {{ $total }}</span><br>
                                 @elseif ($warna == "Hitam")
                                 <span>{{ $warna }}: {{ $total }}</span><br>
                                 @elseif ($warna == "Silver")
                                 <span>{{ $warna }}: {{ $total }}</span><br>
                                 @else
                                 <span>{{ $total }}</span>
                                 @endif
                                    
                                 @endforeach
                                 @else
                            <span class="text-muted">Tidak ada stok</span>
                        @endif
                            </td>
                        
                        </tr>
                    @endforeach
                  </tbody>
            </table>
        </div>
    </div>

    <div class="card">
        <center>
        <h1>Laporan Stok Tas</h1>
    </center>
        <div class="col-sm-12">
            <table>
                <thead>                                 
                    <tr>
                      <th>No</th>
                      <th>Tanggal</th>
                      <th>Jenis Bahan</th>
                      <th>Stok</th>
                      <th>Diambil</th>
                      <th>Sisa</th>

             
                    </tr>
                  </thead>
                  <tbody>                                 
                    @foreach ($jenis3 as $no => $j)
                        <tr>
                            <td>{{$no+1}}</td>
                            <td>{{date("d/M/Y", strtotime($j->created_at));}}</td>
                            <td>{{$j->nama_tas}}</td>
                            <td>
                                @php
                            $totalWarnaStok = $j->totalWarnaStok();
                        @endphp
                        @if($totalWarnaStok->isNotEmpty())
                            @foreach($j->totalWarnaStok() as $warna => $total)
                            @if ($warna == "Merah")
                            <span>{{ $warna }}: {{ $total }}</span><br>
                            @elseif ($warna == "Biru")
                            <span>{{ $warna }}: {{ $total }}</span><br>
                            @elseif ($warna == "Hitam")
                            <span>{{ $warna }}: {{ $total }}</span><br>
                            @elseif ($warna == "Silver")
                            <span>{{ $warna }}: {{ $total }}</span><br>
                            @else
                            <span>{{ $total }}</span><br>
                           
                            @endif
                               
                            @endforeach
                        @else
                            <span class="text-muted">Tidak ada stok</span>
                        @endif
                            
                      
                            </td>
                            <td>
                                @php
                            $totalWarnaStokAmbil = $j->totalWarnaStokAmbil();
                        @endphp
                      @if($totalWarnaStokAmbil->isNotEmpty())
                            @foreach($j->totalWarnaStokAmbil() as $warna => $total)
                            @if ($warna == "Merah")
                            <span>{{ $warna }}: {{ $total }}</span><br>
                            @elseif ($warna == "Biru")
                            <span>{{ $warna }}: {{ $total }}</span><br>
                            @elseif ($warna == "Hitam")
                            <span>{{ $warna }}: {{ $total }}</span><br>
                            @elseif ($warna == "Silver")
                            <span>{{ $warna }}: {{ $total }}</span><br>
                            @else
                            <span>{{ $total }}</span><br>
                            @endif
                               
                            @endforeach
                            @else
                            <span class="text-muted">Tidak ada stok</span>
                        @endif
                            </td>
                            <td>
                                @php
                                     $sisaStok = $j->sisaStok();
                                 @endphp
                            @if($totalWarnaStok->isNotEmpty())
                                 @foreach($j->sisaStok() as $warna => $total)
                                 @if ($warna == "Merah")
                                 <span>{{ $warna }}: {{ $total }}</span><br>
                                 @elseif ($warna == "Biru")
                                 <span>{{ $warna }}: {{ $total }}</span><br>
                                 @elseif ($warna == "Hitam")
                                 <span>{{ $warna }}: {{ $total }}</span><br>
                                 @elseif ($warna == "Silver")
                                 <span>{{ $warna }}: {{ $total }}</span><br>
                                 @else
                                 <span>{{ $total }}</span>
                                 @endif
                                    
                                 @endforeach
                                 @else
                            <span class="text-muted">Tidak ada stok</span>
                        @endif
                            </td>
                          
                        </tr>
                    @endforeach
                  </tbody>
            </table>
        </div>
    </div>
</body>
</html>

<script type="text/javascript">
    window.print();
</script>