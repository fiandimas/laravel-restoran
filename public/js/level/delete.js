function deleteMenu(id){
  swal({
    title: 'Apa anda yakin menghapus level ini ?',
    buttons: true,
    icon: 'warning',
    dangerMode: true
  }).then((del) => {
    if(del){
      console.log('delete')
    }
  })
}