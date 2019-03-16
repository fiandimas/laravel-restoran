function deleteMenu(id){
  $('#button-'+id).attr('disabled',true);
  swal({
    title: 'Peringatan!',
    text: 'Apa anda yakin menghapus menu ini ?',
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
            icon: 'success'
          }).then((back) => {
            if(back){
              window.location.href = url + '/masakan';
            }else{
              window.location.href = url + '/masakan';
            }
          })
        }
      })
    }else{
      $('#button-'+id).attr('disabled',false);
    }
  })
}