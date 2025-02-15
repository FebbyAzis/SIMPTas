@extends('layout.app')
@section('content')   

<section class="section">
    <div class="section-header">
      <h1>Laporan</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{url('/dashboard-admin')}}">Dashboard</a></div>
        <div class="breadcrumb-item">Laporan</div>
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
                <h2 class="section-title">Cetak Laporan</h2>
                <p class="section-lead">
                  Anda dapat mencetak laporan pada halaman ini.
                </p>
            </div>
            
        </div>
    

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Form Cetak Laporan</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Stok</label>
                    <input type="date" class="form-control" name="stok" id="tglawal" required>
                  </div>
                  <div class="form-group">
                    <label>Stok</label>
                    <input type="date" class="form-control" name="stok" id="tglakhir" required>
                  </div>
                  <a href=""
                  onclick="this.href='/cetak-laporan/'+document.getElementById('tglawal').value+'/'+document.getElementById('tglakhir').value"
                  target="_blank">
                  <button type="submit" class="btn btn-primary ml-1">
                      <i class="bx bx-check d-block d-sm-none"></i>
                      <span class="d-none d-sm-block">Cetak</span>
                  </button>
              </a>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>

@endsection
