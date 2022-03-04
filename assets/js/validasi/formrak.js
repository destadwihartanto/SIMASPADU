function validateForm() {
	var kode_rak = document.forms["myForm"]["kode_rak"].value;
    var nama_rak = document.forms["myForm"]["nama_rak"].value;

    if (kode_rak == "") {
        validasi('Kode rak wajib di isi!', 'warning');
        return false;
    } else if(nama_rak ==""){
		validasi('nama rak wajib di isi !' , 'warning');
		return false;
	}

}

function validateFormUpdate() {
    var kode_rak = document.forms["myFormUpdate"]["kode_rak"].value;
    var nama_rak = document.forms["myFormUpdate"]["nama_rak"].value;

    if (kode_rak == "") {
        validasi('Kode Rak wajib di isi!', 'warning');
        return false;
    } else if (nama_rak == "") {
        validasi('Nama Rak wajib di isi!', 'warning');
        return false;
    }

}


function validasi(judul, status) {
    swal.fire({
        title: judul,
        icon: status,
        confirmButtonColor: '#4e73df',
    });
}
