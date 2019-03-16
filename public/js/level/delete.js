function deleteMenu(id){
  $('#button-'+id).attr('disabled',true);
  swal({
    title: 'Peringatan!',
    text: 'Apa anda yakin menghapus level ini ?',
    buttons: true,
    icon: 'warning',
    dangerMode: true
  }).then((del) => {
    if(del){
      console.log('delete')
    }else{
      $('#button-'+id).attr('disabled',false);
    }
  })
}