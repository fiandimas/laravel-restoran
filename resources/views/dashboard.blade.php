@extends('../template')
@section('dashboard')
  <div class="row">
    <div class="col-lg-3 col-md-3 col-sm-12">
      <div class="card card-statistic-2">
        <div class="card-icon shadow-primary bg-primary">
          <i class="fas fa-archive"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4><a href="{{ url('masakan') }}">Masakan</a></h4>
          </div>
          <div class="card-body">
            {{ $menu }}
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-12">
      <div class="card card-statistic-2">
        <div class="card-icon shadow-primary bg-primary">
          <i class="fas fa-dollar-sign"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4><a href="{{ url('level') }}">Level</a></h4>
          </div>
          <div class="card-body">
            {{ $level }}
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-12">
      <div class="card card-statistic-2">
        <div class="card-icon shadow-primary bg-primary">
          <i class="fas fa-shopping-bag"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4><a href="{{ url('pengguna') }}">Pengguna</a></h4>
          </div>
          <div class="card-body">
            {{ $user }}
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-12">
      <div class="card card-statistic-2">
        <div class="card-icon shadow-primary bg-primary">
          <i class="fas fa-shopping-bag"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Transaksi</h4>
          </div>
          <div class="card-body">
            {{ $transaction }}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection