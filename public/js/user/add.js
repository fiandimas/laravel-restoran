$('#form').submit(function(e){
  e.preventDefault();
  $('#submit').attr('disabled',true);
  $.ajax({
    type: 'POST',
    url: $('#form').attr('action'),
    data: $('#form').serialize(),
    success: function(data){
      $('#submit').attr('disabled',false);
      if(!data.success){
        $('#username').html(data.message)
      }else{
        swal({
          title: 'Sukses',
          text: 'Sukses menambah user',
          icon: 'success',
          button: 'Kembali'
        }).then((back) => {
          if(back){
            window.location.href = url + '/user';
          }else{
            window.location.href = url + '/user';
          }
        })
      }
    },
    error: function(){
      $('#submit').attr('disabled',false);
      swal({
        title: 'Gagal!',
        text: 'Silahkan coba lagi',
        icon: 'error'
      })
    }
  })
})