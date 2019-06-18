<?php 
   include 'includes/header.php';
   include 'includes/top-nav.php'; 
   include 'includes/left-nav.php';
?>


<!-- Start right Content here -->
<div class="content-page">
   <!-- Start content -->
   <div class="content">
      <div class="container-fluid">
         <div class="page-title-box">
            <div class="row align-items-center">
               <div class="col-sm-6">
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="javascript:void(0);">Atricles</a></li>
                     <li class="breadcrumb-item active">Manage All Articles</li>
                  </ol>
               </div>
            </div>
         </div>
         <!-- end row -->

         <div class="row">
            <div class="col-12">
               <div class="card">
                  <div class="card-body">
                  
                        <?php
                            if (isset($_GET['Author'])) {

                                $author_id = $_GET['Author'];

                                if ($author_id == '' || empty($author_id)) {

                                    // View All Articles By a Specific Author
                                    include "partials/articles/view-articles.php";
                                    // End View All Articles By a Specific Author
                                    
                                }else{

                                    // View All Articles By a Specific Author
                                    include "partials/articles/view-author-articles.php";
                                    // End View All Articles By a Specific Author
                                }

                            }else{
                                
                                // View All Articles By a Specific Author
                                include "partials/articles/view-articles.php";
                                // End View All Articles By a Specific Author

                            }
                        ?>

                  </div>
               </div>
            </div>
            <!-- end col -->
         </div>
         <!-- end row -->

      </div>
      <!-- container-fluid -->
   </div>
   <!-- content -->
</div>
<!-- End Right content here -->


<?php
   include 'includes/footer.php';
?>


<script>
$(document).ready(function () {

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
					url: '../controllers/articleController.php',
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
});



function refreshArticleTable() {


	var table = $('#datatable-buttons').DataTable({
         destroy: true,
			ajax: "../asynchronous_scripts/articles-table",
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
</script>