$(document).ready(function () {

    // Delete article
     $("#datatable-buttons").on("click", ".sa-delete-single-user-article", function () {
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
                             Swal.fire("Deleted!", "Your article has been deleted.", "success");
                      refreshArticleTable(auth_id);
                         }
                     }
                 })
             }
         });
     });
    // End delete article
 
    // Draft article
    $("#datatable-buttons").on("click", ".sa-draft-single-user-article", function () {
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
                refreshArticleTable(auth_id);
             }
          }
       })
     });
    // End draft article
 
    // Publish article
    $("#datatable-buttons").on("click", ".sa-publish-single-user-article", function () {
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
                refreshArticleTable(auth_id);
             }
          }
       })
     });
    // End publish article
 
    // Reset article views
    $("#datatable-buttons").on("click", ".sa-reset-single-user-article-views", function () {
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
                refreshArticleTable(auth_id);
             }
          }
       })
     });
    // End reset article views

  });
  


 function refreshArticleTable(user_id) {
 
     var table = $('#datatable-buttons').DataTable({
          destroy: true,
             ajax: "/iHeartCoding/asynchronous_scripts/single-user-articles-table.php?user_id="+user_id,
             columns : [
                 {"data" : "Title"},
                 {"data" : "Image"},
                 {"data" : "Tags"},
                 {"data" : "Status"},
                 {"data" : "Views"},
                 {"data" : "Comments"},
                 {"data" : "Date"},
                 {"data" : "Action"},
                 {"data" : "edit"},
                 {"data" : "delete"},
                 {"data" : "reset"}
             ]
         });
 
         
     table.clear().draw();
  }