@extends('../template')
@section('content')
  <div class="card-body">
    <center><a href="{{ url('user/tambah') }}" class="btn btn-success mt-2 mb-4">Tambah User</a></center>
    <table class="table table-striped">
      <tr>
        <th>Nomor</th>
        <th>Nama</th>
        <th>Nama Pengguna</th>
        <th>Level</th>
        <th>Aksi</th>
      </tr>
      @foreach($user as $data)
      <tr>
        <td>{{ ++$loop->index }}</td>
        <td>{{ $data->uname }}</td>
        <td>{{ $data->username }}</td>
        <td>{{ $data->lname }}</td>
        <td>
          <a href="{{ route('user.edit',['id' => $data->id]) }}" class="btn btn-warning">Sunting</a> | 
          <button class="btn btn-danger" onclick="deleteUser({{ $data->id }})" id="button-{{ $data->id }}">Hapus</button>
        </td>
      </tr> 
      @endforeach
    </table>             
  </div>
@endsection