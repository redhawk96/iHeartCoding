<!-- Header -->
<?php include 'includes/header.php'; ?>

<!-- Navigation -->
<?php include 'includes/navigation.php'; ?>

<div id="page-wrapper">

    <div class="container-fluid">

        <div class="row" style="padding-top:40px">

            <div class="col-lg-4">

            <?php 

            // If ec valiable is shown then content will be show to update existing category
            // eg: edit-comment?ec=1

            if(isset($_GET['ec'])){

                echo "<script src='https://cdn.ckeditor.com/ckeditor5/12.1.0/classic/ckeditor.js'></script>";

                // Getting the value of eart variable. ecat variable hold the values of the id of a specific article
                $c_id = $_GET['ec'];

                // Calling displaySingleComment method of Article class
                $displaySingleComment = $comment->displaySingleComment($c_id);

                // Stating while loop to display specific article
                while($row = mysqli_fetch_assoc($displaySingleComment)){
                
                    $c_id = $row['comment_id'];
                    $c_avatar = $row['comment_avatar'];
                    $p_com_id = $row['parent_comment_id'];
                    $c_author = $row['comment_author'];
                    $c_email = $row['comment_email'];
                    $a_id = $row['article_id'];
                    $c_content = $row['comment_content'];

            ?>

                <!-- Displaying specific article [HTML Content] -->

                <img src="../public/upload/users/<?php echo $c_avatar; ?>">

                <form action="../controllers/commentController.php" method="POST">
                    <div class="form-group">
                        <label>ID</label>
                        <input type="text" class="form-control" name="c_id" value="<?php echo $c_id ;?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>Parent</label>
                        <input type="text" class="form-control" name="p_com_id" value="<?php echo $p_com_id ;?>">
                    </div>
                    <div class="form-group">
                        <label>Article</label>
                        <input type="text" class="form-control" name="a_id" value="<?php echo $a_id ;?>">
                    </div>
                    <div class="form-group">
                        <label>Author</label>
                        <input type="text" class="form-control" name="c_author" value="<?php echo $c_author ;?>">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="c_mail" value="<?php echo $c_email ;?>">
                    </div>
                    <div class="form-group">
                        <label>Comment</label>
                        <textarea id="editor" class="form-control" rows="10" name="c_content"><?php echo $c_content ;?></textarea>
                    </div>
                    <button type="submit" class="btn btn-success" name="update_comment" value="<?php echo $c_id ;?>">Update</button>
                </form>
                <!-- End Displaying specific article [HTML Content] -->

            <?php  

                }
                // End of while loop to display specific article

            // Else if the ec is not shown and the url is as below, then content will be show to add new category
            // eg: edit-comment.php

            }else{
                header('Location : comments');
            }
            ?>

            </div>
            
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<script>
ClassicEditor
    .create( document.querySelector( '#editor' ) )
    .catch( error => {
        console.error( error );
    } );
</script>

<!-- Footer -->
<?php include 'includes/footer.php'; ?>





