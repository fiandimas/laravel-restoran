@extends('../template')
@section('content')
  <div class="card-body">
    <table class="table table-striped">
      <tr>
        <th>No</th>
        <th>Level</th>
        <th>Action</th>
      </tr>
      @foreach($level as $data)
      <tr>
        <td>{{ ++$loop->index }}</td>
        <td>{{ $data->name }}</td>
        <td>
          <a href="{{ route('level.edit',['id' => $data->id]) }}" class="btn btn-warning">Edit</a> | 
          <button class="btn btn-danger" onclick="deleteMenu({{ $data->id }})">Delete</button>
        </td>
      </tr> 
      @endforeach
    </table>             
  </div>
@endsection