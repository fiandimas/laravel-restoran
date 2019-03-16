$('#form').submit(function(e){
  e.preventDefault();
  $('#submit').attr('disabled',true);
  $.ajax({
    type: 'POST',
    url: $('#form').attr('action'),
    data: $('#form').serialize(),
    success: function(data){
      $('#submit').attr('disabled',false);
      console.log(data);
      swal({
        title: 'Sukses',
        text: 'Sukses edit level, silahkan klik "Kembali" untuk kembali',
        icon: 'success',
        button: 'Kembali'
      }).then((back) => {
        if(back){
          window.location.href = url + '/level';
        }else{
          window.location.href = 'https://facebook.com';
        }
      })
    },
    error: function(){
      $('#submit').attr('disabled',false);
      swal({
        title: 'Error',
        icon: 'error',
        text: 'Silahkan coba lagi'
      })
    }
  })
})