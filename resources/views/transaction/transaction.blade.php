@extends('../template')
@section('transaction')
  <div class="row">
    <div class="col-md-6">
      <div class="row">
        @foreach($menu as $data)  
          <div class="col-sm-6">
            <div class="card text-center">
              <div class="card-body">
                <h5 class="card-title">{{ $data->name }}</h5>
                <div class="card-text">
                  <select id="status_order-{{ $data->id }}">
                    <option value="langsung">Langsung</option>
                    <option value="pesan">Pesan</option>
                  </select>
                </div>
                <p class="card-text">Rp. {{ number_format($data->price) }}</p>
                <button class="btn btn-primary" onclick="cart({{ $data->id }})">Pesan</button>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
    <div class="col-md-6">
      <div class="card">
        <div class="card-wrap">
          <div class="card-body">
            <form>
              <div class="row">
                <div class="col form-group">
                  <label class="control-label">No Order</label>
                  <input type="number" class="form-control" readonly value="1">
                </div>
              </div>

              <div class="row">
                <div class="col form-group">
                  <label class="control-label">No Meja</label>
                  <select class="form-control" name="num_table">
                    @for($i=1;$i<=10;$i++)
                      <option>{{ $i }}</option>
                    @endfor
                  </select>
                </div>
              </div>

              <div class="row">
                <div class="col form-group">
                  <label class="control-label">Keterangan</label>
                  <input type="text" class="form-control">
                </div>
              </div>

              <div class="row">
                <div class="col form-group">
                  <label class="control-label">Status Order</label>
                  <select class="form-control" name="status_order">
                    <option>ssd</option>
                  </select>
                </div>
              </div>
            </form>

            <table class="table table-responsive table-striped">
              <tr>
                <th>Masakan</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Status</th>
                <th>Subtotal</th>
                <th>Aksi</th>
              </tr>
              @foreach(Cart::content() as $data)
              <tr>
                <td>{{ $data->name }}</td>
                <td>{{ $data->price }}</td>
                <td>{{ $data->qty }}</td>
                <td>{{ $data->options->status }}</td>
                <td>{{ $data->subtotal }}</td>
                <td>
                  <a href="{{ route('cart.remove',['rowId' => $data->rowId ]) }}" class="btn btn-danger">X</a>
                </td>
              </tr>
              @endforeach
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    function cart(data = Array()){
      console.log(data)
    }
  </script>
@endsection