$(document).ready(function () {

    // Delete article
     $("#datatable-buttons").on("click", ".sa-delete-article", function () {
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
                     url: '/iHeartCoding/controllers/articleController.php',
                     data: {
                         delete_article: id,
                         a_image_name: img
                     },
                     type: 'POST',
                     success: function (data) {
                         if (!data.error) {
                             Swal.fire("Deleted!", "Your article has been deleted.", "success");
                      refreshArticleTable();
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
         $.ajax({
          url: '/iHeartCoding/controllers/articleController.php',
          data: {
             draft_article: id
          },
          type: 'POST',
          success: function (data) {
             if (!data.error) {
                refreshArticleTable();
             }
          }
       })
     });
    // End draft article
 
    // Publish article
    $("#datatable-buttons").on("click", ".sa-publish-article", function () {
       var id = $(this).attr("id_ref");
         $.ajax({
          url: '/iHeartCoding/controllers/articleController.php',
          data: {
             publish_article: id
          },
          type: 'POST',
          success: function (data) {
             if (!data.error) {
                refreshArticleTable();
             }
          }
       })
     });
    // End publish article
 
    // Reset article views
    $("#datatable-buttons").on("click", ".sa-reset-article-views", function () {
       var id = $(this).attr("id_ref");
         $.ajax({
          url: '/iHeartCoding/controllers/articleController.php',
          data: {
             reset_view_count: id
          },
          type: 'POST',
          success: function (data) {
             if (!data.error) {
                refreshArticleTable();
             }
          }
       })
     });
    // End reset article views
 });
 
 
 
 function refreshArticleTable() {
 
     var table = $('#datatable-buttons').DataTable({
          destroy: true,
             ajax: "/iHeartCoding/asynchronous_scripts/articles-table.php",
             columns : [
                 {"data" : "Id"},
                 {"data" : "Author"},
                 {"data" : "Title"},
                 {"data" : "Status"},
                 {"data" : "Image"},
                 {"data" : "Tags"},
                 {"data" : "Comments"},
                 {"data" : "Views"},
                 {"data" : "Date"},
                 {"data" : "Action"},
                 {"data" : "edit"},
                 {"data" : "delete"},
                 {"data" : "reset"}
             ]
         });
 
         
     table.clear().draw();
  }