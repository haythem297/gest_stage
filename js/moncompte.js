$(document).ready(function(){


            $("#btn-save-update").on('click',function(e){
             e.preventDefault();
                var email = $('#email').val();
                var password = $('#password').val();
                var r_password = $('#r_password').val();
                $('.msg').slideUp('slow');
                $('.msg').html('');
                $('.msg').removeClass('success');
                $('.msg').removeClass('error');
                if(email.length==0)
                    $('.msg').append('Veuillez verifier votre email.<br>');
                if(password!=''){
                    if(password<5) {
                        $('.msg').append('Mot de passe trop court');
                    }
                    if((r_password =='')||(r_password != password)) {
                        $('.msg').append('Mots de passe sont différent');
                    }

                }
                if(($('.msg').html()=='')){
                    var frm = $('#frmmoncompte').serialize();
                    $.ajax({
                        url:'queries/moncompte_sql.php',
                        method:'POST',
                        dataType: "json",
                        data:frm,
                        success(result){
                           if(result.msg=='ok'){
                                $('.msg').html('Compte modifié avec succés, redirection...');
                                $('.msg').addClass('success').slideDown('slow');
                                setTimeout(function(){
                                    $('.msg').slideUp('slow').removeClass('success').html('');
                                    window.location.href = 'index.php';
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
});
