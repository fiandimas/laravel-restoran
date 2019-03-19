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
        text: 'Sukses sunting masakan',
        icon: 'success',
        button: 'Kembali',
        button: false
      })
      setInterval(() => {
        window.location.href = url + '/masakan'
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