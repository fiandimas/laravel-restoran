@extends('../template')
@section('content')
  <div class="card-body">
    <form id="form" action="{{ route('user.store') }}" method="POST">
      @csrf
      <div class="row">
        <div class="col form-group">
          <label class="control-label">Nama</label>
          <input type="text" class="form-control" name="name">
        </div>
      </div>

      <div class="row">
        <div class="col form-group">
          <label class="control-label">Nama Pengguna</label>
          <input type="text" class="form-control"  name="username">
          <font color="red" id="username"></font>
        </div>
      </div>

      <div class="row">
        <div class="col form-group">
          <label class="control-label">Kata Sandi</label>
          <input type="password" class="form-control"  name="password">
        </div>
      </div>

      <div class="row">
        <div class="col form-group">
          <label class="control-label">Level</label>
          <select class="form-control" name="id_level">
            @foreach($level as $data)
              <option value="{{ $data->id }}">{{ $data->name }}</option>
            @endforeach
          </select>
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