$(document).ready(function () {
	$('.sa-delete-article').on('click', function () {
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

							$('.swal2-confirm').on('click', function () {
								location.reload();
							})
						}
					}
				})

			}
		});
	});
});