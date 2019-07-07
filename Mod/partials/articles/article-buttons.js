$(document).ready(function () {

    // Delete article
     $("#datatable-buttons").on("click", ".sa-delete-article", function () {
         var id = $(this).attr("id_ref");
         var img = $(this).attr("img_ref");
         var auth_id = $(this).attr("auth_ref");
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
                     url: '/iHeartCoding/controllers/articleController.php',
                     data: {
                         delete_article: id,
                         a_image_name: img
                     },
                     type: 'POST',
                     success: function (data) {
                         if (!data.error) {
                             Swal.fire("Deleted!", "Your article has been deleted.", "success").then(function (){
                              location.reload();
                             });
                             
                         }
                     }
                 })
             }
         });
     });
    // End delete article
 
    // Draft article
    $("#datatable-buttons").on("click", ".sa-draft-article", function () {
       var id = $(this).attr("id_ref");
       var auth_id = $(this).attr("auth_ref");
         $.ajax({
          url: '/iHeartCoding/controllers/articleController.php',
          data: {
             draft_article: id
          },
          type: 'POST',
          success: function (data) {
             if (!data.error) {
               location.reload();
             }
          }
       })
     });
    // End draft article
 
    // Publish article
    $("#datatable-buttons").on("click", ".sa-publish-article", function () {
       var id = $(this).attr("id_ref");
       var auth_id = $(this).attr("auth_ref");
         $.ajax({
          url: '/iHeartCoding/controllers/articleController.php',
          data: {
             publish_article: id
          },
          type: 'POST',
          success: function (data) {
             if (!data.error) {
               location.reload();
             }
          }
       })
     });
    // End publish article
 
    // Reset article views
    $("#datatable-buttons").on("click", ".sa-reset-article-views", function () {
       var id = $(this).attr("id_ref");
       var auth_id = $(this).attr("auth_ref");
         $.ajax({
          url: '/iHeartCoding/controllers/articleController.php',
          data: {
             reset_view_count: id
          },
          type: 'POST',
          success: function (data) {
             if (!data.error) {
               location.reload();
             }
          }
       })
     });
    // End reset article views

  });
  