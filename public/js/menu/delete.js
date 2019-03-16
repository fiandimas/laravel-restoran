function deleteMenu(id){
  swal({
    title: 'Peringatan!',
    text: 'Apa anda yakin hapus menu ini ?',
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
    }
  })
}