@extends('../template')
@section('content')
  <div class="card-body">
    <form id="form" action="{{ route('menu.store') }}" method="POST">
      @csrf
      <div class="row">
        <div class="col form-group">
          <label class="control-label">Nama Masakan</label>
          <input type="text" class="form-control" name="name">
        </div>
      </div>

      <div class="row">
        <div class="col form-group">
          <label class="control-label">Harga</label>
          <input type="text" class="form-control"  name="price">
        </div>
      </div>

      <div class="row">
        <div class="col form-group">
          <input type="submit" class="btn btn-warning" value="Tambah" id="submit">
        </div>
      </div>
    </form>
  </div>
  <div class="card-footer">
    <a href="{{ url('masakan') }}" class="btn btn-success">Kembali</a>
  </div>
@endsection