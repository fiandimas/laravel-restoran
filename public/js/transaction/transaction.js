$('#form').submit(function(e){
  e.preventDefault();
  $('#simpan').attr('disabled',true);
  $.ajax({
    type: 'POST',
    url: $('#form').attr('action'),
    data: $('#form').serialize(),
    success: function(data){
      $('#simpan').attr('disabled',false);
      if(!data.success){
        swal({
          title: 'Gagal!',
          text: data.message,
          icon: 'error',
        })
      }else{
        swal({
          title: 'Sukses!',
          text: 'Sukses membeli makanan!',
          icon: 'success',
          button: false
        })
        setInterval(() => {
          window.location.href = url + '/transaksi';
        }, 2000);
      }
    },
    error: function(data){
      console.log(data.responseJSON.message)
    }
  })
})