$(document).ready(function () {
 // sembunyikan tombol cari
 $("#tombol").hide();

 // tampilkan loader saat mengetik keyword
 $("#keyword").on("keyup", function () {
  $(".loader").show();

  //  ajax dengan fungsi load
  //  $("#keyword").on("keyup", function () {
  //   $("#container").load("ajax/test.php?keyword=" + $("#keyword").val());
  //  });

  //  ajax dengan fungsi get
  $.get("ajax/test.php?keyword=" + $("#keyword").val(), function (data) {
   $("#container").html(data);
   //   sembunyikan loader saat data nya ketemu
   $(".loader").hide();
  });
 });
});
