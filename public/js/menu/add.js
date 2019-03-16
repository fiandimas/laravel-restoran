$('#form').submit(function(e){
  e.preventDefault();
  $.ajax({
    type: 'POST',
    url: $('#form').attr('action'),
    data: $('#form').serialize(),
    success: function(data){
      swal({
        title: 'Sukses',
        text: 'Sukses menambahkan masakan, klik "Kembali" untuk kembali',
        icon: 'success',
        button: 'Kembali'
      }).then((back) => {
        if(back){
          window.location.href = url + '/masakan';
        }else{
          window.location.href = url + '/masakan';
        }
      })
    },
    error: function(){
      swal({
        title: 'Error',
        text: 'Silahkan coba lagi',
        icon: 'error'
      })
    }
  })
})