@extends('layout.app')
@section('content')   

<section class="section">
    <div class="section-header">
      <h1>Detail Stok Aksesoris</h1>
      <div class="section-header-breadcrumb">
        
        @if ($auth->role == 1)
        <div class="breadcrumb-item active"><a href="{{url('/dashboard-admin')}}">Dashboard</a></div>
        <div class="breadcrumb-item active"><a href="{{url('/stok-material')}}">Stok Aksesoris</a></div>
        @else
        <div class="breadcrumb-item active"><a href="{{url('/dashboard-users')}}">Dashboard</a></div>
        <div class="breadcrumb-item active"><a href="{{url('/data-stok-material')}}">Stok Aksesoris</a></div>
        @endif
        <div class="breadcrumb-item">Detail Stok Aksesoris</div>
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
            <div class="col-sm-8">
                <h2 class="section-title">Tabel Data Stok Aksesoris {{$jenis->nama_material}}</h2>
                <p class="section-lead">
                  Anda dapat mengelola stok aksesoris pada halaman ini.
                </p>
            </div>
           @if ($auth->role == 1)
           <div class="col-sm-4 mt-3 text-right">
            <button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#exampleModal">
                <i class="fas fa-plus"></i>&nbsp; Tambah Stok
            </button>
            <button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#exampleModal1">
                <i class="fas fa-minus"></i>&nbsp; Ambil Stok
            </button>
        </div>
           @else
               
           @endif
            <div class="col-sm-12">
              
              @php
                $totalWarnaStok = $jenis->totalWarnaStok();
                $totalWarnaStokAmbil = $jenis->totalWarnaStokAmbil();
                $sisaStok = $jenis->sisaStok();
              @endphp
          <hr>
          <table class="table">
            <tr>
              <th>Warna</th>
              <th>Stok</th>
              <th>Diambil</th>
              <th>Sisa</th>
            </tr>
            <tr>
              <td>
                @if($totalWarnaStok->isNotEmpty())
                @foreach($jenis->totalWarnaStok() as $warna => $total)
                @if ($warna == "Merah")
                <span><i class="fas fa-square" style="color: red"></i> {{ $warna }}</span><br>
                @elseif ($warna == "Biru")
                <span><i class="fas fa-square" style="color: blue"></i> {{ $warna }}</span><br>
                @elseif ($warna == "Hitam")
                <span><i class="fas fa-square" style="color: black"></i> {{ $warna }}</span><br>
                @elseif ($warna == "Silver")
                <span><i class="fas fa-square" style="color: silver"></i> {{ $warna }}</span><br>
                @else
                <span>-</span><br>
               
                @endif
                   
                @endforeach
                @else
                        <span>-</span>
                    @endif
              </td>
              <td>
                @if($totalWarnaStok->isNotEmpty())
                @foreach($jenis->totalWarnaStok() as $warna => $total)
                @if ($warna == "Merah")
                <span>{{ $total }}</span><br>
                @elseif ($warna == "Biru")
                <span>{{ $total }}</span><br>
                @elseif ($warna == "Hitam")
                <span>{{ $total }}</span><br>
                @elseif ($warna == "Silver")
                <span>{{ $total }}</span><br>
                @else
                <span>{{ $total }}</span><br>
               
                @endif
                   
                @endforeach
                @else
                        <span>Tidak ada stok</span>
                    @endif
              </td>
              <td>
                @if($totalWarnaStokAmbil->isNotEmpty())
                @foreach($jenis->totalWarnaStokAmbil() as $warna => $total)
                @if ($warna == "Merah")
                <span>{{ $total }}</span><br>
                @elseif ($warna == "Biru")
                <span>{{ $total }}</span><br>
                @elseif ($warna == "Hitam")
                <span>{{ $total }}</span><br>
                @elseif ($warna == "Silver")
                <span>{{ $total }}</span><br>
                @else
                <span>{{ $total }}</span><br>
               
                @endif
                   
                @endforeach
                @else
                        <span>Tidak ada stok</span>
                    @endif
              </td>
              <td>
                @if($totalWarnaStok->isNotEmpty())
                @foreach($jenis->sisaStok() as $warna => $total)
                @if ($warna == "Merah")
                <span>{{ $total }}</span><br>
                @elseif ($warna == "Biru")
                <span>{{ $total }}</span><br>
                @elseif ($warna == "Hitam")
                <span>{{ $total }}</span><br>
                @elseif ($warna == "Silver")
                <span>{{ $total }}</span><br>
                @else
                <span>{{ $total }}</span><br>
               
                @endif
                   
                @endforeach
                @else
                        <span>Tidak ada stok</span>
                    @endif
              </td>
            </tr>
          </table>
          <hr>
        </div>
        </div>
    

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Tabel Data Stok Ditambah</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                @if ($auth->role == 1)
                <table class="table table-striped" id="table-1">
                  <thead>                                 
                    <tr>
                      <th>No</th>
                      <th>Tanggal</th>
                      <th>Warna</th>
                      <th>Stok Ditambah</th>
                 

                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>                                 
                    @foreach ($stok as $no => $s)
                        <tr>
                            <td>{{$no+1}}</td>
                            <td>{{date("d/M/Y", strtotime($s->created_at));}}</td>
                            @if ($s->warna == "Bawaan")
                                <td>-</td>
                            @else
                            <td>{{$s->warna}}</td>
                            @endif
                            
                            <td>{{$s->stok}}</td>
                    
                            <td>
                                <center>

                                <a href="" class="btn btn-primary" title="Edit" data-toggle="modal" data-target="#exampleModal2{{$s->id}}"><i class="fas fa-edit text-white"></i></a>
                                <a href="" class="btn btn-danger" title="Hapus" data-toggle="modal" data-target="#exampleModal3{{$s->id}}"><i class="fas fa-trash text-white"></i></a>
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
                      <th>Tanggal</th>
                      <th>Warna</th>
                      <th>Stok Ditambah</th>
                    </tr>
                  </thead>
                  <tbody>                                 
                    @foreach ($stok as $no => $s)
                        <tr>
                            <td>{{$no+1}}</td>
                            <td>{{date("d/M/Y", strtotime($s->created_at));}}</td>
                            @if ($s->warna == "Bawaan")
                                <td>-</td>
                            @else
                            <td>{{$s->warna}}</td>
                            @endif
                            
                            <td>{{$s->stok}}</td>
                    
                         
                        </tr>
                    @endforeach
                  </tbody>
                </table>
                @endif
              </div>
            </div>
          </div>
        </div>

        <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Tabel Data Stok Diambil</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  @if ($auth->role == 1)
                  <table class="table table-striped" id="table-11">
                    <thead>                                 
                      <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Warna</th>
                        <th>Stok Diambil</th>
                   
  
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>                                 
                      @foreach ($stok_ambil as $no => $s)
                          <tr>
                              <td>{{$no+1}}</td>
                              <td>{{date("d/M/Y", strtotime($s->created_at));}}</td>
                              @if ($s->warna == "Bawaan")
                                <td>-</td>
                            @else
                            <td>{{$s->warna}}</td>
                            @endif
                              <td>{{$s->diambil}}</td>
                      
                              <td>
                                  <center>
  
                                    <a href="" class="btn btn-primary" title="Edit" data-toggle="modal" data-target="#exampleModal4{{$s->id}}"><i class="fas fa-edit text-white"></i></a>
                                    <a href="" class="btn btn-danger" title="Hapus" data-toggle="modal" data-target="#exampleModal5{{$s->id}}"><i class="fas fa-trash text-white"></i></a>
                              </center>
                              </td>
                          </tr>
                      @endforeach
                    </tbody>
                  </table>
                  @else
                  <table class="table table-striped" id="table-11">
                    <thead>                                 
                      <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Warna</th>
                        <th>Stok Diambil</th>
                      </tr>
                    </thead>
                    <tbody>                                 
                      @foreach ($stok_ambil as $no => $s)
                          <tr>
                              <td>{{$no+1}}</td>
                              <td>{{date("d/M/Y", strtotime($s->created_at));}}</td>
                              @if ($s->warna == "Bawaan")
                                <td>-</td>
                            @else
                            <td>{{$s->warna}}</td>
                            @endif
                              <td>{{$s->diambil}}</td>
                      
                             
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

<form action="{{ url('tambah-stok-material') }}" method="POST">
    @csrf
    @method('POST')
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Stok Aksesoris</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Warna</label>
                    <select class="form-control" name="warna">
                        <option value="-">-</option>
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
                  <input type="hidden" name="jenis_material_id" value="{{$jenis->id}}">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </div>
        </div>
      </div>
    </form>

    <form action="{{ url('ambil-stok-material') }}" method="POST">
        @csrf
        @method('POST')
        <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Ambil Stok Aksesoris</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Warna</label>
                        <select class="form-control" name="warna">
                            <option value="-">-</option>
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
                      <input type="hidden" name="jenis_material_id" value="{{$jenis->id}}">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
              </div>
            </div>
          </div>
        </form>

    @foreach ($stok as $item)
    <form action="{{ url('edit-stok-tambah/'. $item->id) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="modal fade" id="exampleModal2{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Stok Aksesoris</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                @if ($item->warna == "Bawaan")
                <span>Warna : -</span>
                @else
                <span>Warna : {{$item->warna}}</span>
                @endif
                  
                    <div class="form-group">
                      <label>Stok</label>
                      <input type="text" class="form-control" name="stok" value="{{$item->stok}}" required>
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

    @foreach ($stok as $item)
    <form action="{{ url('hapus-stok-tambah/'. $item->id) }}" method="POST">
      @csrf
      @method('DELETE')
      <div class="modal fade" id="exampleModal3{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Stok Aksesoris</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p>Apakah anda yakin ingin menghapus data stok material
                  @if ($item->warna == "Bawaan")
                  Warna : -
                  @else
                  Warna : {{$item->warna}}
                  @endif 
                  , Stok : {{$item->stok}}?</p>
                   
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
                <button type="submit" class="btn btn-primary">Ya</button>
              </div>
            </div>
          </div>
        </div>
      </form>        
    @endforeach

    @foreach ($stok_ambil as $item)
    <form action="{{ url('edit-stok-ambil/'. $item->id) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="modal fade" id="exampleModal4{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Stok Aksesoris yang Diambil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                @if ($item->warna == "Bawaan")
                <span>Warna : -</span>
                @else
                <span>Warna : {{$item->warna}}</span>
                @endif
                  
                    <div class="form-group">
                      <label>Diambil</label>
                      <input type="text" class="form-control" name="diambil" value="{{$item->diambil}}" required>
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

    @foreach ($stok_ambil as $item)
    <form action="{{ url('hapus-stok-ambil/'. $item->id) }}" method="POST">
      @csrf
      @method('DELETE')
      <div class="modal fade" id="exampleModal5{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Stok Aksesoris yang Diambil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p>Apakah anda yakin ingin menghapus data stok material yang diambil
                  @if ($item->warna == "Bawaan")
                  Warna : -
                  @else
                  Warna : {{$item->warna}}
                  @endif 
                , Diambil : {{$item->diambil}}?</p>
                   
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
                <button type="submit" class="btn btn-primary">Ya</button>
              </div>
            </div>
          </div>
        </div>
      </form>        
    @endforeach