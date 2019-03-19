function deleteUser(id){
  $('#button-'+id).attr('disabled',true);
  swal({
    title: 'Peringatan!',
    text: 'Apa anda yakin menghapus pengguna ini ?',
    icon: 'warning',
    buttons: true,
    dangerMode: true
  }).then((confirm) => {
    if(confirm){
      $('#delete-'+id).attr('disabled',true);
      $.ajax({
        type: 'DELETE',
        url: url + '/pengguna/' + id,
        success: function(){
          swal({
            title: 'Sukses!',
            text: 'Sukses menghapus pengguna',
            icon: 'success',
            button: false
          })
          setInterval(() => {
            window.location.href = url + '/pengguna'
          }, 2000);
        }
      })
    }else{
      $('#button-'+id).attr('disabled',false);
    }
  })
}