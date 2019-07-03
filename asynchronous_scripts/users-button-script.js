$(document).ready(function () {

    // Delete article
     $("#datatable-buttons").on("click", ".sa-delete-user", function () {
         var id = $(this).attr("id_ref");
         var img = $(this).attr("img_ref");
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
                             Swal.fire("Deleted!", "User has been deleted.", "success");
                             refreshUserTable();
                         }
                     }
                 })
             }
         });
     });
    // End delete article
 
    // Draft article
    $("#datatable-buttons").on("click", ".sa-disable-user", function () {
       var id = $(this).attr("id_ref");
         $.ajax({
          url: '/iHeartCoding/controllers/userController.php',
          data: {
            disable_user: id
          },
          type: 'POST',
          success: function (data) {
             if (!data.error) {
                refreshUserTable();
             }
          }
       })
     });
    // End draft article
 
    // Activate user
    $("#datatable-buttons").on("click", ".sa-activate-user", function () {
       var id = $(this).attr("id_ref");
         $.ajax({
          url: '/iHeartCoding/controllers/userController.php',
          data: {
            activate_user: id
          },
          type: 'POST',
          success: function (data) {
             if (!data.error) {
                refreshUserTable();
             }
          }
       })
     });
    // End activate user
  });
  


 function refreshUserTable() {
 
     var table = $('#datatable-buttons').DataTable({
          destroy: true,
             ajax: "/iHeartCoding/asynchronous_scripts/users-table.php",
             columns : [
                 {"data" : "Id"},
                 {"data" : "Avatar"},
                 {"data" : "First_Name"},
                 {"data" : "Last_Name"},
                 {"data" : "Email"},
                 {"data" : "Username"},
                 {"data" : "Role"},
                 {"data" : "Status"},
                 {"data" : "Account"},
                 {"data" : "View"},
                 {"data" : "Delete"}
             ]
         });
 
         
     table.clear().draw();
  }