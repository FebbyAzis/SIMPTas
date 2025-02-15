@extends('layout.app')
@section('content')   

<section class="section">
    <div class="section-header">
      <h1>Dashboard</h1>
      <div class="section-header-breadcrumb">
        
        <div class="breadcrumb-item">Dashboard</div>
      </div>
      
    </div>
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-primary">
            <i class="far fa-user"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Users</h4>
            </div>
            <div class="card-body">
              
              {{$users}}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-danger">
            <i class="fas fa-medal"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Stok Aksesoris</h4>
            </div>
            <div class="card-body">
              @php
                  $total1 = $stok1 - $ambil1;
              @endphp
              {{$total1}}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-warning">
            <i class="fas fa-tshirt"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Stok Bahan</h4>
            </div>
            <div class="card-body">
              @php
                  $total2 = $stok2 - $ambil2;
              @endphp
              {{$total2}}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-success">
            <i class="fas fa-briefcase"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Stok tas</h4>
            </div>
            <div class="card-body">
              @php
              $total3 = $stok3 - $ambil3;
          @endphp
          {{$total3}}
            </div>
          </div>
        </div>
      </div>                  
    </div>

    <div class="section-body">
      <h4 class="section-title">Detail Login</h4>
      <div class="card p-3">
        <div class="row">
          <div class="col-sm-2">
            <p><b>Username</b></p>
            <p><b>Email</b></p>
            <p><b>Level Hak Akses</b></p>
          </div>
          <div class="col-sm-1">
            <p>:</p>
            <p>:</p>
            <p>:</p>
          </div>
          <div class="col-sm-9">
            <p>{{AUTH::user()->name}}</p>
            <p>{{AUTH::user()->email}}</p>
            @if ($user->role == 1)
                <p>Administrator</p>
            @else
                <p>Pengguna</p>
            @endif
          </div>
        </div>

      </div>
    </div>
      
    </div>
  </section>
@endsection