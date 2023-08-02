$(document).ready(function () {
    $('#btn-new-certif').on('click', function () {
        window.location.href = 'new_certif_template.php';
    });
    $('.edittemplate').on('click', function () {
        var id_tmplate = $(this).data('id');
        window.location.href = 'edit-certificate-template.php?id=' + id_tmplate;
    });
    $('.activate').on('click', function () {
        var id_template = $(this).data('id');
        $.ajax({
            method: 'GET',
            dataType: "json",
            url: 'queries/activate_certif_template.php?id=' + id_template,
            success: function (result) {
                if (result.state === 'ok')
                    window.location.reload();
            }
        });
    });
    $('.delete').on('click', function () {
        var id_template = $(this).data('id');
        $.ajax({
            method: 'GET',
            dataType: "json",
            url: 'queries/delete_certif_template.php?id=' + id_template,
            success: function (result) {
                if (result.state === 'ok')
                    window.location.reload();
            }
        });
    });
    $('#btn-save-divisionnaire-certif').on('click', function (e) {
        e.preventDefault();
        var fname = $('#fname').val();
        var lname = $('#lname').val();
        var fn = $('#function').val();
        $(".msg").slideUp("slow");
        $(".msg").html("");
        $(".msg").removeClass("success");
        $(".msg").removeClass("error");
        if (fname.length == 0)
            $(".msg").append("Veuillez renseigner le prénom.<br>");
        if (lname.length == 0)
            $(".msg").append("Veuillez renseigner le nom.<br>");
        if (fn.length == 0)
            $(".msg").append("Veuillez renseigner la fonction.<br>");
        if ($(".msg").html() == "") {
            var frm = $("#new-divisionnaire").serialize();
            $.ajax({
                url: 'queries/save-divisionnaire.php',
                method: 'POST',
                dataType: 'json',
                data: frm,
                success: function (result) {
                    if (result.state === 'ok') {
                        $(".msg").html('Enregistré avec succés');
                        $(".msg").addClass("success").slideDown("slow");
                        setTimeout(function () {
                            $(".msg").slideUp("slow").removeClass("success").html("");
                        }, 3000);
                    }
                }
            })
        } else {
            $(".msg").addClass("error").slideDown("slow");
            setTimeout(function () {
                $(".msg").slideUp("slow").removeClass("error").html("");
            }, 3000);
        }
    });
});