function validateForm() {
    var tgl = document.forms["myForm"]["tgl"].value;
    var barang = document.forms["myForm"]["barang"].value;
    var kondisi = document.forms["myForm"]["kondisi"].value;
    var jmlbarang = document.forms["myForm"]["jmlbarang"].value;
    if (tgl == '') {
        validasi('Tanggal Masuk wajib di isi!', 'warning');
        return false;
    }
        else if (barang == '') {
        validasi('Barang wajib di isi!', 'warning');
        return false;
    } else if (kondisi == '') {
        validasi('Kondisi wajib di isi!', 'warning');
        return false;
    } else if (jmlbarang == '') {
        validasi('Jumlah Masuk wajib di isi!', 'warning');
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