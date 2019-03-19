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
            icon: 'success'
          }).then((back) => {
            if(back){
              window.location.href = url + '/pengguna';
            }else{
              window.location.href = url + '/pengguna';
            }
          })
        }
      })
    }else{
      $('#button-'+id).attr('disabled',false);
    }
  })
}