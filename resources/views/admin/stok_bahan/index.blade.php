@extends('layout.app')
@section('content')   

<section class="section">
    <div class="section-header">
      <h1>Stok Bahan</h1>
      <div class="section-header-breadcrumb">
       @if ($auth->role == 1)
       <div class="breadcrumb-item active"><a href="{{url('/dashboard-admin')}}">Dashboard</a></div>
       @else
       <div class="breadcrumb-item active"><a href="{{url('/dashboard-users')}}">Dashboard</a></div>
       @endif
        <div class="breadcrumb-item">Stok Bahan</div>
      </div>
    </div>
    @if (session('Success'))
    <div class="alert alert-primary alert-dismissible show fade">
        <div class="alert-body">
          <button class="close" data-dismiss="alert">
            <span>&times;</span>
          </button>
          <strong>Success!</strong> {{ session('Success') }}.
        </div>
      </div>
      @endif

      @if (session('Successs'))
    <div class="alert alert-primary alert-dismissible show fade">
        <div class="alert-body">
          <button class="close" data-dismiss="alert">
            <span>&times;</span>
          </button>
          <strong>Success!</strong> {{ session('Successs') }}.
        </div>
      </div>
      @endif

      @if (session('Successss'))
    <div class="alert alert-primary alert-dismissible show fade">
        <div class="alert-body">
          <button class="close" data-dismiss="alert">
            <span>&times;</span>
          </button>
          <strong>Success!</strong> {{ session('Successss') }}.
        </div>
      </div>
      @endif

      @if (session('Ssuccess'))
    <div class="alert alert-primary alert-dismissible show fade">
        <div class="alert-body">
          <button class="close" data-dismiss="alert">
            <span>&times;</span>
          </button>
          <strong>Success!</strong> {{ session('Ssuccess') }}.
        </div>
      </div>
      @endif
    <div class="section-body">
        <div class="row">
            <div class="col-sm-9">
                <h2 class="section-title">Tabel Data Stok Bahan</h2>
                <p class="section-lead">
                  Anda dapat mengelola stok Bahan pada halaman ini.
                </p>
            </div>
            @if ($auth->role == 1)
            <div class="col-sm-3 mt-3 text-right">
              <button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#exampleModal">
                  <i class="fas fa-plus"></i>&nbsp; Tambah Jenis Bahan
              </button>
          </div>
            @else
                
            @endif
           
        </div>
    

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Tabel Data</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                @if ($auth->role == 1)
                <table class="table table-striped" id="table-1">
                  <thead>                                 
                    <tr>
                      <th>No</th>
                      <th>Jenis Bahan</th>
                      <th>Stok</th>
                      <th>Diambil</th>
                      <th>Sisa</th>

                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>                                 
                    @foreach ($jenis as $no => $j)
                        <tr>
                            <td>{{$no+1}}</td>
                            <td>{{$j->nama_bahan}}</td>
                            <td>
                                @php
                            $totalWarnaStok = $j->totalWarnaStok();
                        @endphp
                        @if($totalWarnaStok->isNotEmpty())
                            @foreach($j->totalWarnaStok() as $warna => $total)
                            @if ($warna == "Merah")
                            <span class="badge text-white mt-1" style="background-color: red">{{ $warna }}: {{ $total }}</span><br>
                            @elseif ($warna == "Biru")
                            <span class="badge text-white mt-1" style="background-color: blue">{{ $warna }}: {{ $total }}</span><br>
                            @elseif ($warna == "Hitam")
                            <span class="badge text-white mt-1" style="background-color: black">{{ $warna }}: {{ $total }}</span><br>
                            @elseif ($warna == "Silver")
                            <span class="badge text-dark mt-1" style="background-color: silver">{{ $warna }}: {{ $total }}</span><br>
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
                            <span class="badge text-white mt-1" style="background-color: red">{{ $warna }}: {{ $total }}</span><br>
                            @elseif ($warna == "Biru")
                            <span class="badge text-white mt-1" style="background-color: blue">{{ $warna }}: {{ $total }}</span><br>
                            @elseif ($warna == "Hitam")
                            <span class="badge text-white mt-1" style="background-color: black">{{ $warna }}: {{ $total }}</span><br>
                            @elseif ($warna == "Silver")
                            <span class="badge text-dark mt-1" style="background-color: silver">{{ $warna }}: {{ $total }}</span><br>
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
                                 <span class="badge text-white mt-1" style="background-color: red">{{ $warna }}: {{ $total }}</span><br>
                                 @elseif ($warna == "Biru")
                                 <span class="badge text-white mt-1" style="background-color: blue">{{ $warna }}: {{ $total }}</span><br>
                                 @elseif ($warna == "Hitam")
                                 <span class="badge text-white mt-1" style="background-color: black">{{ $warna }}: {{ $total }}</span><br>
                                 @elseif ($warna == "Silver")
                                 <span class="badge text-dark mt-1" style="background-color: silver">{{ $warna }}: {{ $total }}</span><br>
                                 @else
                                 <span>{{ $total }}</span>
                                 @endif
                                    
                                 @endforeach
                                 @else
                            <span class="text-muted">Tidak ada stok</span>
                        @endif
                            </td>
                            <td>
                                <center>
                                <a href="{{url('detail-stok-bahan/'. $j->id)}}" class="btn btn-success" title="Lihat"><i class="fas fa-eye text-white"></i></a>
                                <a href="" class="btn btn-primary" title="Tambah" data-toggle="modal" data-target="#exampleModal4{{$j->id}}"><i class="fas fa-plus text-white"></i></a>
                                <a href="" class="btn btn-danger" title="Ambil" data-toggle="modal" data-target="#exampleModal5{{$j->id}}"><i class="fas fa-minus text-white"></i></a>
                                <a href="" class="btn btn-info" title="Edit" data-toggle="modal" data-target="#exampleModal6{{$j->id}}"><i class="fas fa-edit text-white"></i></a>
                              </center>
                            </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
                @else
                <table class="table table-striped" id="table-1">
                  <thead>                                 
                    <tr>
                      <th>No</th>
                      <th>Jenis Bahan</th>
                      <th>Stok</th>
                      <th>Diambil</th>
                      <th>Sisa</th>
                      <th>Acction</th>
                
                    </tr>
                  </thead>
                  <tbody>                                 
                    @foreach ($jenis as $no => $j)
                        <tr>
                            <td>{{$no+1}}</td>
                            <td>{{$j->nama_bahan}}</td>
                            <td>
                                @php
                            $totalWarnaStok = $j->totalWarnaStok();
                        @endphp
                        @if($totalWarnaStok->isNotEmpty())
                            @foreach($j->totalWarnaStok() as $warna => $total)
                            @if ($warna == "Merah")
                            <span class="badge text-white mt-1" style="background-color: red">{{ $warna }}: {{ $total }}</span><br>
                            @elseif ($warna == "Biru")
                            <span class="badge text-white mt-1" style="background-color: blue">{{ $warna }}: {{ $total }}</span><br>
                            @elseif ($warna == "Hitam")
                            <span class="badge text-white mt-1" style="background-color: black">{{ $warna }}: {{ $total }}</span><br>
                            @elseif ($warna == "Silver")
                            <span class="badge text-dark mt-1" style="background-color: silver">{{ $warna }}: {{ $total }}</span><br>
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
                            <span class="badge text-white mt-1" style="background-color: red">{{ $warna }}: {{ $total }}</span><br>
                            @elseif ($warna == "Biru")
                            <span class="badge text-white mt-1" style="background-color: blue">{{ $warna }}: {{ $total }}</span><br>
                            @elseif ($warna == "Hitam")
                            <span class="badge text-white mt-1" style="background-color: black">{{ $warna }}: {{ $total }}</span><br>
                            @elseif ($warna == "Silver")
                            <span class="badge text-dark mt-1" style="background-color: silver">{{ $warna }}: {{ $total }}</span><br>
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
                                 <span class="badge text-white mt-1" style="background-color: red">{{ $warna }}: {{ $total }}</span><br>
                                 @elseif ($warna == "Biru")
                                 <span class="badge text-white mt-1" style="background-color: blue">{{ $warna }}: {{ $total }}</span><br>
                                 @elseif ($warna == "Hitam")
                                 <span class="badge text-white mt-1" style="background-color: black">{{ $warna }}: {{ $total }}</span><br>
                                 @elseif ($warna == "Silver")
                                 <span class="badge text-dark mt-1" style="background-color: silver">{{ $warna }}: {{ $total }}</span><br>
                                 @else
                                 <span>{{ $total }}</span>
                                 @endif
                                    
                                 @endforeach
                                 @else
                            <span class="text-muted">Tidak ada stok</span>
                        @endif
                            </td>
                            <td>
                              <center>
                              <a href="{{url('detail-data-stok-bahan/'. $j->id)}}" class="btn btn-success" title="Lihat"><i class="fas fa-eye text-white"></i></a>
                             
                            </center>
                          </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>

@endsection

<form action="{{ url('tambah-jenis-bahan') }}" method="POST">
    @csrf
    @method('POST')
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Jenis Bahan</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Nama Bahan</label>
                    <input type="text" class="form-control" name="nama_bahan" required>
                  </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </div>
        </div>
      </div>
    </form>

    @foreach ($jenis as $item)
        

<form action="{{ url('tambah-stok-bahan') }}" method="POST">
    @csrf
    @method('POST')
    <div class="modal fade" id="exampleModal4{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Stok Bahan</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Warna</label>
                    <select class="form-control" name="warna">
                        <option value="Bawaan">-</option>
                      <option value="Merah">Merah</option>
                      <option value="Hitam">Hitam</option>
                      <option value="Biru">Biru</option>
                      <option value="Silver">Silver</option>
                      
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Stok</label>
                    <input type="text" class="form-control" name="stok" required>
                  </div>
                  <input type="hidden" name="jenis_bahan_id" value="{{$item->id}}">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </div>
        </div>
      </div>
    </form>
    @endforeach

    @foreach ($jenis as $item)
        

    <form action="{{ url('ambil-stok-bahan') }}" method="POST">
        @csrf
        @method('POST')
        <div class="modal fade" id="exampleModal5{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Ambil Stok Bahan</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Warna</label>
                        <select class="form-control" name="warna">
                            <option value="Bawaan">-</option>
                          <option value="Merah">Merah</option>
                          <option value="Hitam">Hitam</option>
                          <option value="Biru">Biru</option>
                          <option value="Silver">Silver</option>
                          
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Diambil</label>
                        <input type="text" class="form-control" name="diambil" required>
                      </div>
                      <input type="hidden" name="jenis_bahan_id" value="{{$item->id}}">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
              </div>
            </div>
          </div>
        </form>
        @endforeach

        @foreach ($jenis as $item)
        <form action="{{ url('edit-jenis-bahan/'. $item->id) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="modal fade" id="exampleModal6{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Jenis Bahan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    
                      
                        <div class="form-group">
                          <label>Nama Bahan</label>
                          <input type="text" class="form-control" name="nama_bahan" value="{{$item->nama_bahan}}" required>
                        </div>
                       
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                </div>
              </div>
            </div>
          </form>        
        @endforeach