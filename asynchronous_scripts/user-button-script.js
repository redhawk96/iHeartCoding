$(document).ready(function () {

    // Update user status
    $('.update-user-status').click(function(){  
      var id = $('.update-user-status').attr('id_ref');
      var u_action = $('.update-user-status').attr('u_action');
      
      if(u_action == "activate-user"){

        $.ajax({  
          url:'/iHeartCoding/controllers/userController.php',
          data: {
            activate_single_user: id
          },
          type: 'POST',
          success:function(data){
              if(!data.error){
                location.reload();
              }
          }
        });

      }else if(u_action == "disable-user"){

        $.ajax({  
          url:'/iHeartCoding/controllers/userController.php',
          data: {
            disable_single_user: id
          },
          type: 'POST',
          success:function(data){
              if(!data.error){
                location.reload();
              }
          }
        });
      }
      
    });
    // Update user status


    // Delete user
    $('.delete-user').click(function() {
        var id = $('.delete-user').attr("id_ref");
        var img = $('.delete-user').attr("img_ref");
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#02a499",
            cancelButtonColor: "#ec4561",
            confirmButtonText: "Yes, delete it!"

        }).then(function (result) {
            if (result.value) {
                $.ajax({
                    url: '/iHeartCoding/controllers/userController.php',
                    data: {
                        delete_user: id,
                        u_image_name: img
                    },
                    type: 'POST',
                    success: function (data) {
                        if (!data.error) {
                            window.location.href = "/iHeartCoding/Admin/Users/View-All";
                        }
                    }
                })
            }
        });
    });
    // End delete user

    
    // Delete user
    $('.reset-user-password').click(function() {
        var u_id = $('.reset-user-password').attr("id_ref");
        var u_pass = $('.reset-user-password').attr("u_ref");

        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#02a499",
            cancelButtonColor: "#ec4561",
            confirmButtonText: "Yes, reset it!"

        }).then(function (result) {
            if (result.value) {
                $.ajax({
                    url: '/iHeartCoding/controllers/userController.php',
                    data: {
                        resetPassword: 'true',
                        u_id: u_id,
                        u_pass: u_pass
                    },
                    type: 'POST',
                    success: function (data) {
                        if (!data.error) {
                            // Swal.fire("Reset Successful!", "Password has been set to default!.", "success");
                        }
                    }
                })
            }
        });
    });
    // End delete user

  });
  