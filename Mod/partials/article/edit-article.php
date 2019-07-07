<?php 
$displaySingleArticleToEdit = $article->displaySingleArticleToEdit($eart_id);

mysqli_stmt_bind_result($displaySingleArticleToEdit, $a_id, $a_cat_id, $a_title, $a_author, $author_id, $a_date, $a_image, $a_content, $a_tags, $a_com_count, $a_status, $a_view_count);

while(mysqli_stmt_fetch($displaySingleArticleToEdit)):
?>
<!-- Updating article fields -->
<form action="/iHeartCoding/controllers/articleController.php" method="POST" enctype="multipart/form-data">
<div class="row">

    <!-- Article details -->
    <div class="col-lg-5 pt-3">

        <!-- Author details -->
        <div class="form-group row pb-2 pt-5">
            <label class="col-md-3 col-form-label">Author</label>
            <div class="col-md-9">
                <div class="input-group mr-sm-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <!-- Article author avatar -->
                            <?php
                            $displaySingleUser = $user->displaySingleUser($author_id);
                            
                            while($row = mysqli_fetch_assoc($displaySingleUser)){
                                $user_image = $row['user_image'];
                            ?>
                                <a class="image-popup-no-margins" href="/iHeartCoding/public/upload/users/<?php echo $user_image; ?>">
                                    <img class="img-fluid rounded-circle" alt="<?php echo $user_image; ?>" src="/iHeartCoding/public/upload/users/<?php echo $user_image; ?>" width="20">
                                </a>
                            <?php 
                            }
                            ?>
                            <!-- End article author avatar -->
                        </div>
                    </div>
                    <input type="text" class="form-control" value="<?php echo $a_author ;?>" name="a_author" readonly>
                </div>
            </div>
        </div>
        <!-- End author details -->

        <!-- Article added date -->
        <div class="form-group row py-1">
            <label class="col-md-3 col-form-label">Date</label>
            <div class="col-md-9">
                <p><i class="ti-time pr-1"></i> <?php echo date('l jS F Y | h:i A', strtotime($a_date));?></p>
            </div>
        </div>
        <!-- End article addded date -->

        <!-- Article overview -->
        <div class="form-group row py-1">
            <label class="col-md-3 col-form-label">Overview</label>
            <div class="col-md-9">
                <p><span class="pr-5"><i class="ti-comment-alt pr-1"></i> <?php echo $a_com_count?> Comments </span>|<span class="pl-5"><i class="ti-eye pr-1"></i> <?php echo $a_view_count?> Views</span></p>
            </div>
        </div>
        <!-- End article overview -->

        <!-- Categories -->
        <div class="form-group row pb-1">
            <label class="col-md-3 col-form-label">Description</label>
            <div class="col-md-6">
                <input type="text" class="form-control" placeholder="Basics into Java" name="a_title" value="<?php echo $a_title ;?>">
            </div>
            <div class="col-md-3">
                <select class="form-control" name="a_tags">
                    <?php 
                    
                    // Calling displayAllCategories method of Category class
                    $displayAllCategories = $category->displayAllCategories();

                    // Stating while loop to display specific article
                    while($row = mysqli_fetch_assoc($displayAllCategories)){
                    
                    $c_title = $row['cat_title'];
                    ?>
                        <option><?php echo $c_title; ?></option>
                    <?php 
                    } 
                    ?>
                </select>
            </div>
        </div>
        <!-- End categories -->

        <!-- Article status -->
        <div class="form-group row py-1">
            <label class="col-md-3 col-form-label">Status</label>
            <div class="col-md-9">
                <select class="form-control" name="a_status">
                <?php 
                switch($a_status){

                    case 'Published': echo "<option value='Published' selected>Article published to public</option>
                                            <option value='Drafted'>Save article as a draf</option>";
                                            break; 

                    case 'Drafted'  : echo "<option value='Drafted' selected>Article saved as a draft</option>
                                            <option value='Published'>Publish article to public</option>"; 
                                            break; 
                }
                ?>
                </select>
            </div>
        </div>
        <!-- End article status -->

        <!-- Article thumbnail -->
        <div class="form-group row py-1">
            <label class="col-md-3 col-form-label">Banner</label>
            <div class="col-md-9">
                <input type="file" class="filestyle" data-buttonname="btn-secondary"  name="a_image" id="a_image" accept="image/*">
                <input type="text" name="a_image_name" value="<?php echo $a_image; ?>" hidden>
                <p class="help-block">Banner will be used as the thumbnail (Max 2MB)</p>
            </div>
        </div>
        <!-- End article thumbnail -->

        <!-- Previous article thumbnail -->
        <div class="form-group row py-1">
            <label class="col-md-3 col-form-label"></label>
            <div class="col-md-4">
                <a class="image-popup-no-margins" href="/iHeartCoding/public/upload/articles/<?php echo $a_image; ?>">
                    <img class="img-fluid" alt="" src="/iHeartCoding/public/upload/articles/<?php echo $a_image; ?>" class="img-thumbnail">
                </a>
            </div>
        </div>
        <!-- End previous article thumbnail -->

    </div>  
    <!-- End article details -->

    <!-- Article content -->
    <div class="col-lg-7">

        <!-- Article submit button -->
        <div class="form-group col-12">
            <input type="text" class="form-control" placeholder="1" name="a_cat_id" value="<?php echo $a_cat_id ;?>" hidden>
            <button type="submit" class="btn btn-outline-warning btn-lg col-3 offset-9" name="update_article" value="<?php echo $a_id ;?>"><i class="ti-save pr-2"></i> Update Article</button>
        </div>
        <!-- End article submit button -->

        <!-- Article body -->
        <div class="form-group col-lg-12">
            <textarea class="form-control summernote"  id="summernote"  rows="10" name="a_content" style="height: 1000px !important"><?php echo $a_content ;?></textarea>
        </div>
        <!-- End article body -->

    </div>
    <!-- End article content -->
        
</div>
</form>
<!-- End updating article fields -->
<?php  

endwhile;
// End specific article

?>