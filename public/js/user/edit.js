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
        title: 'Sukses',
        text: 'Sukses update user',
        icon: 'success'
      }).then((back) => {
        if(back){
          window.location.href = url + '/user';
        }else{
          window.location.href = url + '/user';
        }
      })
    },
    error: function(){
      $('#submit').attr('disabled',false);
      swal({
        title: 'Error',
        text: 'Silahkan coba lagi',
        icon: 'error'
      })
    }
  })
})