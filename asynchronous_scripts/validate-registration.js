$(document).ready(function(){
    $('#username').keyup(function(){
        var username = $('#username').val();

        $.ajax({
            url:'controllers/loginController.php',
            data:{search_username:username},
            type: 'POST',
            success:function(data){
                if(!data.error){
                    $('#username-availability').html(data);
                }
            }
        })
    })

    $('#email').keyup(function(){
        var email = $('#email').val();

        $.ajax({
            url:'controllers/loginController.php',
            data:{search_email:email},
            type: 'POST',
            success:function(data){
                if(!data.error){
                    $('#email-availability').html(data);
                }
            }
        })
    })
    
})