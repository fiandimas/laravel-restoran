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
          <a href="" class="btn btn-danger" onclick="return confirm('Are you sure to delete this level ?')">Delete</a>
        </td>
      </tr> 
      @endforeach
    </table>             
  </div>
@endsection