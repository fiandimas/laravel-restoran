@extends('../template')
@section('content')
  <div class="card-body">
    <form method="post" action="{{ route('level.update', ['id' => $level->id]) }}">
      @csrf
      <div class="row">
        <div class="col form-group">
          <label class="control-label">Name</label>
          <input type="text" class="form-control" value="{{ $level->name }}" name="name">
        </div>
      </div>

      <div class="row">
        <div class="col form-group">
          <input type="submit" class="btn btn-warning" value="Simpan">
        </div>
      </div>
    </form>
  </div>
  <div class="card-footer">
    <a href="{{ url('level') }}" class="btn btn-success">Kembali</a>
  </div>
@endsection