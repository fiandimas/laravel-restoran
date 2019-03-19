$('#form').submit(function(e){
  e.preventDefault();
  $('#submit').attr('disabled',true);
  $.ajax({
    type: 'PUT',
    url: $('#form').attr('action'),
    data: $('#form').serialize(),
    success: function(){
      $('#submit').attr('disabled',false);
      swal({
        title: 'Sukses!',
        text: 'Sukses sunting pengguna',
        icon: 'success'
      }).then((back) => {
        if(back){
          window.location.href = url + '/pengguna';
        }else{
          window.location.href = url + '/pengguna';
        }
      })
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