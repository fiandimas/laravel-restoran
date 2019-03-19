@extends('../template')
@section('content')
  <div class="card-body">
    <table class="table table-striped">
      <tr>
        <th>Nomor</th>
        <th>Nama Level</th>
      </tr>
      @foreach($level as $data)
      <tr>
        <td>{{ ++$loop->index }}</td>
        <td>{{ $data->name }}</td>
      </tr> 
      @endforeach
    </table>             
  </div>
@endsection