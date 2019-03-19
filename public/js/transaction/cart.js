function cart(id){
  var status_order = $('#status_order-'+id).find(':selected').val();
  $.ajax({
    type: 'GET',
    url: url + '/transaksi/' + id + '/' + status_order,
    success: function(){
      window.location.href = url + '/transaksi';
    }
  })
}