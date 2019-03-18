<html>
  <head>

 </head>
  <style>
    table {
      border-collapse:collapse;
      table-layout:fixed;width: 630px;
    }
    table td {
      word-wrap:break-word;
      width: 30%;
    }
  </style>
  <body>
    <h3>Laporan Invoice Tanggal Transaksi {{ $data[0]->created_at }}</h3>
    <table border="1px">
      <tr>
        <th>No</th>
        <th>Nama Masakan</th>
        <th>Harga</th>
        <th>Jumlah</th>
        <th>Total Harga</th>
      </tr>
      @foreach($data as $data)
        <tr>
          <td>{{ ++$loop->index }}</td>
          <td>{{ $data->name }}</td>
          <td>{{ number_format($data->price) }}</td>
          <td>{{ $data->qty }}</td>
          <td>{{ number_format($data->qty * $data->price) }}</td>
          @php
            $total += $data->qty * $data->price;
          @endphp
        </tr>
      @endforeach
      <tr>
        <td colspan="4">Total</td>
        <td>{{ $total }}</td>
      </tr>
    </table>
  </body>
</html>