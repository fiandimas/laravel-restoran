@extends('../template')
@section('content')
  <div class="card-body">
    <table class="table table-striped">
      <tr>
        <th>Nomor</th>
        <th>Nama Level</th>
        <th>Aksi</th>
      </tr>
      @foreach($level as $data)
      <tr>
        <td>{{ ++$loop->index }}</td>
        <td>{{ $data->name }}</td>
        <td>
          <a href="{{ route('level.edit',['id' => $data->id]) }}" class="btn btn-warning">Sunting</a> | 
          <button class="btn btn-danger" onclick="deleteMenu({{ $data->id }})" id="button-{{ $data->id }}">Hapus</button>
        </td>
      </tr> 
      @endforeach
    </table>             
  </div>
@endsection