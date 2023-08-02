$(document).ready(function () {
    $("#estab_not_in_list").change(function () {
        if ($(this).is(":checked")) {
            $(this).parent().parent().parent().parent().slideUp("slow");
            $(".hidden").slideDown("slow");
        }
    });
    $("#btn-submit").click(function (e) {
        e.preventDefault();
        var fname = $('#fname').val();
        var lname = $('#lname').val();
        var cin = $('#cin').val();
        var gender = $('.radio:checked').val();
        var email = $('#email').val();
        var tel = $('#tel').val();
        var institute = $('#institute').val();
        var username = $('#username').val();
        var password = $('#password').val();
        var r_password = $('#r_password').val();
        $('.msg').slideUp('slow');
        $('.msg').html('');
        $('.msg').removeClass('success');
        $('.msg').removeClass('error');
        if(fname.length==0)
            $('.msg').append('Veuillez renseigner votre prénom.<br>');
        if(lname.length==0)
            $('.msg').append('Veuillez renseigner votre nom.<br>');
        if(cin.length!=8)
            $('.msg').append('Veuillez renseigner un cin valide.<br>');
        if(typeof(gender)==='undefined')
           $('.msg').append('Veuillez renseigner votre genre.<br>');
        if(email.length==0)
           $('.msg').append('Veuillez renseigner votre email.<br>');
        if(tel.length!=8)
           $('.msg').append('Veuillez renseigner un numero valide.<br>');
        if(institute.length==0)
           $('.msg').append('Veuillez renseigner votre Institut.<br>');
        if(username.length==0)
           $('.msg').append('Veuillez renseigner un nom d\'utilisateur valide.<br>');
        if(password.length==0)
           $('.msg').append('Veuillez renseigner un mot de passe.<br>');
        if(r_password.length==0)
           $('.msg').append('Veuillez retappez votre mot de passe.<br>');
        if((password)!=(r_password))
            $('.msg').append('Les 2  mots de passe sont différents.<br>');
        if(($('.msg').html()=='')){
            var frm = $('#frmsubscribe').serialize();
            $.ajax({
                url:'queries/submit_subscribe.php',
                method:'POST',
                dataType: "json",
                data:frm,
                success(result){
                    if(result.state=='exist'){
                        $('.msg').html(result.msg);
                        $('.msg').addClass('error').slideDown('slow');
                        setTimeout(function(){
                            $('.msg').slideUp('slow').removeClass('error').html('');
                        },3000);
                    }else if(result.state=='ok'){
                        $('.msg').html(result.msg);
                        $('.msg').addClass('success').slideDown('slow');
                        setTimeout(function(){
                            $('.msg').slideUp('slow').removeClass('success').html('');
                            window.location.reload();
                        },3000);
                    }
                }
            })
        }else{
            $('.msg').addClass('error').slideDown('slow');
            setTimeout(function(){
                $('.msg').slideUp('slow').removeClass('error').html('');
            },3000);
        }
    });
    $("#btn-save-new-trainee").on("click", function (e) {
        e.preventDefault();
        var fname = $("#fname").val();
        var lname = $("#lname").val();
        var cin = $("#cin").val();
        var gender = $(".radio:checked").val();
        var email = $("#email").val();
        var tel = $("#tel").val();
        var institut = $("#institut").val();
        var username = $("#username").val();
        var password = $("#password").val();
        var r_password = $("#r_password").val();
        $(".msg").slideUp("slow");
        $(".msg").html("");
        $(".msg").removeClass("success");
        $(".msg").removeClass("error");
    
        if (fname.length == 0)
            $(".msg").append("Veuillez renseigner votre prénom.<br>");
        if (lname.length == 0)
            $(".msg").append("Veuillez renseigner votre nom.<br>");
        if (cin.length != 8)
            $(".msg").append("Veuillez renseigner un cin valide.<br>");
        if (typeof gender === "undefined")
            $(".msg").append("Veuillez renseigner votre genre.<br>");
        if (email.length == 0)
            $(".msg").append("Veuillez renseigner votre email.<br>");
        if (tel.length != 8)
            $(".msg").append("Veuillez renseigner un numero valide.<br>");
        if ($("#estab_not_in_list").is(":checked")) {
            var institute_new = $("#institute").val();
            var type = $("#type").val();
            if (institute_new == "")
                $(".msg").append("Veuillez renseigner le nom de l'institut.<br>");
            if (type == "")
                $(".msg").append("Veuillez renseigner le type de l'institut.<br>");
        } else {
            if (institut == "")
                $(".msg").append("Veuillez renseigner votre Institut.<br>");
        }
        if (username.length == 0)
            $(".msg").append("Veuillez renseigner un nom d'utilisateur valide.<br>");
        if (password.length == 0)
            $(".msg").append("Veuillez renseigner un mot de passe.<br>");
        if (r_password.length == 0)
            $(".msg").append("Veuillez retappez votre mot de passe.<br>");
        if (password != r_password)
            $(".msg").append("Les 2  mots de passe sont différents.<br>");
        if ($(".msg").html() == "") {
            var frm = $("#frmsubscribe").serialize();
            if ($("#estab_not_in_list").is(":checked")) {
                frm = frm+"&in_list=false";
            }else{
                frm = frm+"&in_list=true";
            }
            $.ajax({
                url: "queries/sub_trainee.php",
                method: "POST",
                dataType: "json",
                data: frm,
                success(result) {
                    if (result.state == "exist") {
                        $(".msg").html(result.msg);
                        $(".msg").addClass("error").slideDown("slow");
                        setTimeout(function () {
                            $(".msg").slideUp("slow").removeClass("error").html("");
                        }, 3000);
                    } else if (result.state == "ok") {
                        $(".msg").html(result.msg);
                        $(".msg").addClass("success").slideDown("slow");
                        setTimeout(function () {
                            $(".msg").slideUp("slow").removeClass("success").html("");
                            window.location.href = "gest_trainees.php";
                        }, 3000);
                    }
                },
            });
        } else {
            $(".msg").addClass("error").slideDown("slow");
            setTimeout(function () {
                $('.msg').slideUp('slow').removeClass('error').html('');
            }, 3000);
        }
        
    });
    
});
