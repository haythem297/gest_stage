$(document).ready(function () {
    tinymce.init({
        selector: "#content",
        directionality: "fr_FR",
        theme: "modern",
        height: 300,
        plugins: ["advlist lists  hr code textcolor customFields stylebuttons"],
        menubar: false,
        toolbar: "undo redo | bold underline italic | alignleft aligncenter alignright alignjustify | fontsizeselect | bullist numlist | outdent indent | forecolor backcolor | hr  | style-p style-h1 style-h2 style-h3 | customFields | code",
    });
    $('#btn-save-new-certif').on('click', function (e) {
        e.preventDefault();
        var title = $('#title').val();
        var template_content = tinymce.get("content").getContent();
        $(".msg").slideUp("slow");
        $(".msg").html("");
        $(".msg").removeClass("success");
        $(".msg").removeClass("error");
        if (title.length == 0)
            $(".msg").append("Veuillez renseigner le titre.<br>");
        if (template_content.length == 0)
            $(".msg").append("Veuillez renseigner le contenue.<br>");
        if ($(".msg").html() == "") {
            var frm = {title: title, content: template_content}
            $.ajax({
                url: "queries/save_new_certif.php",
                method: "POST",
                dataType: "json",
                data: frm,
                success(result) {
                    if (result.state == "ok") {
                        $(".msg").html(result.msg);
                        $(".msg").addClass("success").slideDown("slow");
                        setTimeout(function () {
                            $(".msg").slideUp("slow").removeClass("success").html("");
                            window.location.href = "configurations.php";
                        }, 3000);
                    } else if (result.state == "exist") {
                        $(".msg").html(result.msg);
                        $(".msg").addClass("error").slideDown("slow");
                        setTimeout(function () {
                            $(".msg").slideUp("slow").removeClass("error").html("");
                        }, 3000);
                    }
                },
            });
        } else {
            $(".msg").addClass("error").slideDown("slow");
            setTimeout(function () {
                $(".msg").slideUp("slow").removeClass("error").html("");
            }, 3000);
        }
    });
    $('#btn-save-edit-certif').on('click', function (e) {
        e.preventDefault();
        var title = $('#title').val();
        var id = $('#id_template').val();
        var template_content = tinymce.get("content").getContent();
        $(".msg").slideUp("slow");
        $(".msg").html("");
        $(".msg").removeClass("success");
        $(".msg").removeClass("error");
        if (title.length == 0)
            $(".msg").append("Veuillez renseigner le titre.<br>");
        if (template_content.length == 0)
            $(".msg").append("Veuillez renseigner le contenue.<br>");
        if ($(".msg").html() == "") {
            var frm = {id:id,title: title, content: template_content}
            $.ajax({
                url: "queries/save_edit_certif.php",
                method: "POST",
                dataType: "json",
                data: frm,
                success(result) {
                    if (result.state == "ok") {
                        $(".msg").html(result.msg);
                        $(".msg").addClass("success").slideDown("slow");
                        setTimeout(function () {
                            $(".msg").slideUp("slow").removeClass("success").html("");
                            window.location.href = "configurations.php";
                        }, 3000);
                    } else if (result.state == "exist") {
                        $(".msg").html(result.msg);
                        $(".msg").addClass("error").slideDown("slow");
                        setTimeout(function () {
                            $(".msg").slideUp("slow").removeClass("error").html("");
                        }, 3000);
                    }
                },
            });
        } else {
            $(".msg").addClass("error").slideDown("slow");
            setTimeout(function () {
                $(".msg").slideUp("slow").removeClass("error").html("");
            }, 3000);
        }
    });
    $('#btn-preview-certif').on('click',function(){
       $.ajax({
           url: "queries/preview_certif.php",
           method: "POST",
           dataType: "json",
           data: {content:tinymce.get("content").getContent()},
           success(result) {
               if (result.state == "ok") {
                   printJS({
                       printable: result.file,
                       type: 'pdf',
                       base64: true
                   });
               }
           }
       })
    });
});