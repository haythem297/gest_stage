$(document).ready(function(){
    $('.delete-type-stage').on('click',function(){
        var parent = $(this).parent().parent();
        var msg = confirm('Voulez vous vraiment le Supprimer?');
        if(msg){
            var id = $(this).data('id');
            $.ajax({
                url:'queries/delete_type_stage.php?id='+id,
                method:'GET',
                dataType:'json',
                success:function(result){
                    if(result.msg=='ok'){
                        setTimeout(function(){
                            parent.slideUp('slow');
                            parent.remove();
                        },1000);
                    }
                }
            });
        }
    });
    $('#btn-ajout-type-stage').on('click',function(){
        window.location.href = 'gest_ajout_type_stage.php';
    });
    $('#btn-save-new-type-stage').on('click',function(e){
        e.preventDefault();
        var type_de_stage = $('#type_de_stage').val();
        $('.msg').slideUp('slow');
        $('.msg').html('');
        $('.msg').removeClass('success');
        $('.msg').removeClass('error');
        if(type_de_stage.length==0)
            $('.msg').append('Veuillez renseigner le type de stage.<br>');
        if(($('.msg').html()=='')){
            var frm = $('#frmtypestage').serialize();
            $.ajax({
                url:'queries/ajout_type_stage.php',
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
                            window.location.href = 'gest_type_stage.php';
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
    $('.edit').on('click',function(){
        var id = $(this).data('id');
        window.location.href = 'gest_update_type_stage.php?id='+id;
    });
    $('#btn-save-update-type-stage').on('click',function(e){
        e.preventDefault();
        var id = $('#id').val();
        var type_de_stage = $('#type_de_stage').val();
        $('.msg').slideUp('slow');
        $('.msg').html('');
        $('.msg').removeClass('success');
        $('.msg').removeClass('error');
        if(type_de_stage.length==0)
            $('.msg').append('Veuillez renseigner le type de stage.<br>');
        if(($('.msg').html()=='')){
            var frm = $('#frmtypestage').serialize();
            $.ajax({
                url:'queries/save_update_type_stage.php',
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
                            window.location.href = 'gest_type_stage.php';
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