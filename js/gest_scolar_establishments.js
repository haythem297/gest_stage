$(document).ready(function(){
    $('#btn-new-scolar-establishment').on('click',function(){
        window.location.href = 'gest_new_scolar_establishment.php';
    });
    $('#btn-save-new-scolar-establishment').on('click',function(e){
        e.preventDefault();
        var name = $('#name').val();
        var type = $('#type').val();
        $('.msg').slideUp('slow');
        $('.msg').html('');
        $('.msg').removeClass('success');
        $('.msg').removeClass('error');
        if(name.length==0)
            $('.msg').append('Veuillez renseigner le nom.<br>');
        if(type.length==0)
            $('.msg').append('Veuillez renseigner le type.<br>');
        if(($('.msg').html()=='')){
            var frm = $('#new-scolar-establishment').serialize();
            $.ajax({
                url:'queries/save_new_scolar_establishment.php',
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
                            window.location.href = 'gest_scolar_establishments.php';
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
        window.location.href = 'edit_scolar_establishment.php?id='+id;

    });
    $('#btn-save-update-scolar-establishment').on('click',function(e){
        e.preventDefault();
        var name = $('#name').val();
        var type = $('#type').val();
        $('.msg').slideUp('slow');
        $('.msg').html('');
        $('.msg').removeClass('success');
        $('.msg').removeClass('error');
        if(name.length==0)
            $('.msg').append('Veuillez renseigner le nom.<br>');
        if(type.length==0)
            $('.msg').append('Veuillez renseigner le type.<br>');
        if(($('.msg').html()=='')){
            var frm = $('#update-scolar-establishment').serialize();
            $.ajax({
                url:'queries/save_update_scolar_establishment.php',
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
                            window.location.href = 'gest_scolar_establishments.php';
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
    $('.delete-establishment').on('click',function(){
        var parent = $(this).parent().parent();
        var msg = confirm('Voulez vous vraiment le Supprimer?');
        if(msg){
            var id = $(this).data('id');
            $.ajax({
                url:'queries/delete_establishment.php?id='+id,
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
});