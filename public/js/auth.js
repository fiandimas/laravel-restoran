$(document).ready(function(){
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  })

  $('#login').submit(function(event){
    event.preventDefault();
    $('#btnLogin').attr('disabled',true);
    $.ajax({
      type: 'POST',
      url: 'http://localhost:8000/login',
      data: $('#login').serialize(),
      dataType: 'JSON',
      success: function(data){
        $('#btnLogin').attr('disabled',false);
        if(!data.success){
          swal({
            title: 'Gagal!',
            text: data.message,
            icon: 'error',
          })
        }else{
          swal({
            title: 'Sukses!',
            text: data.message,
            icon: 'success',
            button: false,
          })
          setInterval(() => {
            window.location.href = data.redirect
          }, 1000);
        }
      },
      error: function(data){
        $('#btnLogin').attr('disabled',false);
        console.log(data)
      }
    })
  })
})