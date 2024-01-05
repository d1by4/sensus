$(function () {
  // modal tambah data
  $(".buttonAdd").on("click", function () {
    $("#formModalLabel").html("Tambah Data Penduduk"); //mengubah nama modal
    $(".modal-footer button[type=submit]").html("Tambah data"); //mengubah tombol menjadi Tambah data
  });

  // modal ubah data
  $(".buttonEdit").on("click", function () {
    $("#formModalLabel").html("Ubah Data Penduduk"); //mengubah nama modal menjadi Ubah Data Penduduk
    $(".modal-footer button[type=submit]").html("Ubah data"); //mengubah tombol menjadi Ubah data
    $(".modal-content form").attr("action", "http://localhost/sensus/public/penduduk/edit");
    const id = $(this).data("id");

    // mmenampilkan data dari controller ke modal di mahasiswa/index.php
    $.ajax({
      url: "http://localhost/sensus/public/penduduk/getEdit",
      data: { id: id },
      method: "post",
      dataType: "json",
      success: function (data) {
        $("#nama").val(data.nama);
        $("#asal").val(data.asal);
        $("#no_tlpn").val(data.no_tlpn);
        $("#id").val(data.id);
      },
    });
  });
});
