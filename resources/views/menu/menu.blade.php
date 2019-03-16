@extends('../template')
@section('content')
  <div class="card-body">
    <center><a href="{{ url('masakan/tambah') }}" class="btn btn-success mt-2 mb-4">Tambah Masakan</a></center>
    <table class="table table-striped">
      <tr>
        <th>No</th>
        <th>Nama Masakan</th>
        <th>Harga</th>
        <th>Aksi</th>
      </tr>
      @foreach($menu as $data)
      <tr>
        <td>{{ ++$loop->index }}</td>
        <td>{{ $data->name }}</td>
        <td>{{ $data->price }}</td>
        <td>
          <a href="{{ route('menu.edit',['id' => $data->id]) }}" class="btn btn-warning">Edit</a> | 
          <button class="btn btn-danger" onclick="deleteMenu({{ $data->id }})">Delete</button>
        </td>
      </tr> 
      @endforeach
    </table>             
  </div>
@endsection