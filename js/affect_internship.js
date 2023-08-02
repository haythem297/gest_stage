$(document).ready(function () {
  $('#date_debut').datepicker({numberOfMonths: 1,showButtonPanel: false});
  $('#date_fin').datepicker({numberOfMonths: 1,showButtonPanel: false});
  $(".affect").on("click", function () {
    var id = $(this).data('id');
    window.location.href = "attribution_affect_trainee.php?id="+id;
  });
  $("#btn-affect-trainee").on("click", function (e) {
    e.preventDefault();
    var date_debut = $("#date_debut").val();
    var date_fin = $("#date_fin").val();
    $(".msg").slideUp("slow");
    $(".msg").html("");
    $(".msg").removeClass("success");
    $(".msg").removeClass("error");
    if (date_debut.length == 0)
      $(".msg").append("Veuillez renseigner la date de debut du stage.<br>");
    if (date_fin.length == 0)
      $(".msg").append("Veuillez renseigner la date de  du stage.<br>");
    if ($(".msg").html() == "") {
      var frm = $("#frmaffectstage").serialize();
      $.ajax({
        url: "queries/affect_trainee.php",
        method: "POST",
        dataType: "json",
        data: frm,
        success(result) {
          if (result.state == "error") {
            $(".msg").html(result.msg);
            $(".msg").addClass("error").slideDown("slow");
            setTimeout(function () {
              $(".msg").slideUp("slow").removeClass("error").html("");
            }, 3000);
          }else if (result.state == "ok") {
            $(".msg").html(result.msg);
            $(".msg").addClass("success").slideDown("slow");
            setTimeout(function () {
              $(".msg").slideUp("slow").removeClass("success").html("");
              window.location.href = "gest_attribution_trainee.php";
            }, 3000);
          }
        },
      });
    }else{
        $(".msg").addClass("error").slideDown("slow");
      setTimeout(function () {
          $('.msg').slideUp('slow').removeClass('error').html('');
      }, 3000);
    }
  });
});
