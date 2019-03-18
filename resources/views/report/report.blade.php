@extends('../template')
@section('content')
  <div class="card-body">
    <table class="table table-striped">
      <tr>
        <th>No</th>
        <th>Nomor Order</th>
        <th>Nama Pengguna</th>
        <th>Tanggal</th>
        <th>Aksi</th>
      </tr>
      @foreach($order as $data)
      <tr>
        <td>{{ ++$loop->index }}</td>
        <td>{{ $data->id }}</td>
        <td>{{ $data->name }}</td>
        <td>{{ $data->created_at }}</td>
        <th>
          <a href="{{ route('report.print',['id' => $data->id ]) }}" class="btn btn-success" >Cetak</a>
        </th>
      </tr>
      @endforeach
    </table>             
  </div>
@endsection