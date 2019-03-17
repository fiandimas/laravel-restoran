@extends('../template')
@section('content')
  <div class="card-body">
    <form id="form" action="{{ route('user.update',['id' => $user->id ]) }}">
      @csrf
      <input type="hidden" name="id" value="{{ $user->id }}">
      <div class="row">
        <div class="col form-group">
          <label class="control-label">Nama</label>
          <input type="text" class="form-control" name="name" value="{{ $user->uname }}">
        </div>
      </div>

      <div class="row">
        <div class="col form-group">
          <label class="control-label">Nama Pengguna</label>
          <input type="text" class="form-control"  name="username" value="{{ $user->username }}" readonly>
          <font color="red" id="username"></font>
        </div>
      </div>

      <div class="row">
        <div class="col form-group">
          <label class="control-label">Level</label>
          <select class="form-control" name="id_level">
            <option value="{{ $user->lid }}">{{ $user->lname }}</option>
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
    <a href="{{ url('user') }}" class="btn btn-success">Kembali</a>
  </div>
@endsection