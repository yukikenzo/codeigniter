const flashData = $('.flash-data').data('flashdata');

if (flashData=="diubah"){
        Swal.fire({
        icon: 'success',
        title: 'Deskripsi Profil',
        text: 'Berhasil ' + flashData
        
    });
}