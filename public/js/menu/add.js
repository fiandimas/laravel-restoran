$('#form').submit(function(e){
  e.preventDefault();
  $('#submit').attr('disabled',true);
  $.ajax({
    type: 'POST',
    url: $('#form').attr('action'),
    data: $('#form').serialize(),
    success: function(data){
      $('#submit').attr('disabled',false);
      swal({
        title: 'Sukses!',
        text: 'Sukses menambahkan masakan',
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
      $('#submit').attr('disabled',false);
      swal({
        title: 'Gagal!',
        text: 'Silahkan coba lagi',
        icon: 'error'
      })
    }
  })
})