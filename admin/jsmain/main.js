$(document).ready(function () {
  $('#ksajdkasdj').DataTable();
});

function modalSetujui(param) {
  let id = $(param).data('id')
  swal({
    title: "Beneran?",
    text: "Kalo Sudah mensetujui, Tidak Bisa Membatalkan!",
    icon: "info",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
      window.open(site + "/admin/Dashboard/acceptSampah/" + id, '_self')
      swal("Poof! Your imaginary file has been deleted!", {
        icon: "success",
      });
    }
  });
}

function modalSetujuUser(param) {
  let id = $(param).data('id')
  console.log(id)
  swal({
    title: "Beneran?",
    text: "Kalo Sudah mensetujui, Tidak Bisa Membatalkan!",
    icon: "info",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
      window.open(site + "/admin/Dashboard/acceptUser/" + id, '_self')
      swal("Poof! Your imaginary file has been deleted!", {
        icon: "success",
      });
    }
  });
}

function modalSetujuSuperUser(param) {
  let id = $(param).data('id')
  console.log(id)
  swal({
    title: "Beneran?",
    text: "Kalo Sudah mensetujui, Tidak Bisa Membatalkan!",
    icon: "info",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
      window.open(site + "/admin/Dashboard/acceptSuperUser/" + id, '_self')
      swal("Poof! Your imaginary file has been deleted!", {
        icon: "success",
      });
    }
  });
}

function sendsegment(params) {
  let a = $(params).data('id');

  $.ajax({
    type : 'POST',
    url: site + "/login/Login/getSegment/",
    data: { segment: a },
    success: function (data) {
      console.log(data);
    },
    error: function (response) {
      console.log(response)    
    },
  });
}

function detailSuperAkun(params) {
  let data = $(params).data('id');
  let exp = data.split("~")

  $('#idGet1').val(exp[0])
  $('#usmGet1').val(exp[1])
  $('#nmGet1').val(exp[2])
}

function selectKabupaten() {
  let idProv = $('#selectProv').val();
  let exp = idProv.split("~")

  $.ajax({
    url: site + "/login/Login/getKabupaten",
    type: "post",
    data: { 'idProv' : exp[0] },
    success: function (data) {
      $('#selectKota').html(data)
    }, error: function (x) {
      swal("Gagal Proses!!", "Gagal Memproses, Silahkan Restart Page ini!", "error");
    }
  });
}

function selectKecamatans() {
  let idKec = $('#selectKota').val();
  let exp = idKec.split("~")

  $.ajax({
    url: site + "/login/Login/getKecamatan",
    type: "post",
    data: { 'idKec' : exp[0] },
    success: function (data) {
      $('#selectKecamatan').html(data)
    }, error: function (x) {
      swal("Gagal Proses!!", "Gagal Memproses, Silahkan Restart Page ini!", "error");
    }
  });
}