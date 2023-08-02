$(document).ready(function () {
    $("#btn-submit").click(function (e) {
        e.preventDefault();
        if ($("#username").val().length > 0 && $("#password").val().length > 0) {
            $(".msg").css("display", "none");
            $(".msg").removeClass("error");
            $(".msg").removeClass("success");
            $(".msg").html("");
            var frm = $("#frmlogin").serialize();
            $.ajax({
                url: "queries/submit_login.php",
                type: "POST",
                dataType: "json",
                data: frm,
                success: function (result) {
                    $(".msg").css("display", "none");
                    $(".msg").removeClass("error");
                    $(".msg").removeClass("success");
                    $(".msg").html("");
                    if (result == "ok") {
                        $(".msg").addClass("success");
                        $(".msg").html("Connecté avec success, redirection...");
                        $(".msg").slideDown("slow");
                        setTimeout(function () {
                            document.location.reload();
                        }, 2000);
                    } else if (result == "verif") {
                        $(".msg").addClass("error");
                        $(".msg").html("vérifiez vos cordonnées");
                        $(".msg").slideDown("slow");
                        setTimeout(function () {
                            $(".msg").slideUp("slow");
                        }, 2000);
                    }
                }
            });
        }
    });
});
