function deleteUser(id){
  swal({
    title: 'Perhatian',
    text: 'Apa anda yakin menghapus user ini ?',
    icon: 'warning',
    buttons: true,
    dangerMode: true
  }).then((confirm) => {
    if(confirm){
      $('#delete-'+id).attr('disabled',true);
      $.ajax({
        type: 'DELETE',
        url: url + '/user/' + id,
        success: function(){
          swal({
            title: 'Sukses',
            text: 'Sukses menghapus data user',
            icon: 'success'
          }).then((back) => {
            if(back){
              window.location.href = url + '/user';
            }else{
              window.location.href = url + '/user';
            }
          })
        }
      })
    }
  })
}