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
        icon: 'success',
        button: false
      })
      setInterval(() => {
        window.location.href = url + '/pengguna'
      }, 2000);
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