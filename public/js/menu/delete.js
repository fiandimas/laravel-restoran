function deleteMenu(id){
  $('#button-'+id).attr('disabled',true);
  swal({
    title: 'Peringatan!',
    text: 'Apa anda yakin menghapus masakan ini ?',
    icon: 'warning',
    buttons: true
  }).then((ok) => {
    if(ok){
      $.ajax({
        type: 'DELETE',
        url: url + '/masakan/' + id,
        data: {
          id: id
        },
        success: function(){
          swal({
            title: 'Sukses',
            text: 'Sukses hapus masakan',
            button: 'Kembali',
            icon: 'success',
            button: false
          })
          setInterval(() => {
            window.location.href = url + '/masakan'
          }, 2000);
        }
      })
    }else{
      $('#button-'+id).attr('disabled',false);
    }
  })
}