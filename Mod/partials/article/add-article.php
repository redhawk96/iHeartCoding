<!-- New article fields -->
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
                            <!-- Article author avatar -->
                        <div class="input-group-text">
                            <img src="/iHeartCoding/public/upload/users/<?php echo $_SESSION["u_avatar"] ?>" class="rounded-circle" style="width:20px">
                        </div>
                            <!-- End article author avatar -->
                    </div>
                    <input type="text" class="form-control" value="<?php echo $_SESSION["username"] ?>" name="a_author" readonly>
                </div>
            </div>
        </div>
        <!-- End author details -->

        <!-- Article added date -->
        <div class="form-group row py-1">
            <label class="col-md-3 col-form-label">Date</label>
            <div class="col-md-9">
                <p><i class="ti-time pr-1"></i> <?php date_default_timezone_set('Asia/Colombo'); echo date('l jS F Y | h:i A', time()); ?></p>
            </div>
        </div>
        <!-- End article addded date -->

        <!-- Categories -->
        <div class="form-group row pb-1">
            <label class="col-md-3 col-form-label">Description</label>
            <div class="col-md-6">
                <input type="text" class="form-control" placeholder="Basics into Java" name="a_title">
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
                    <option value="Drafted" selected>Save article as a draft</option>
                    <option value="Published">Publish article to public</option>
                </select>
            </div>
        </div>
        <!-- End article status -->
        
        <!-- Article thumbnail -->
        <div class="form-group row py-1">
            <label class="col-md-3 col-form-label">Banner</label>
            <div class="col-md-9">
                <input type="file" class="filestyle" data-buttonname="btn-secondary"  name="a_image" id="a_image" accept="image/*">
                <p class="help-block">Banner will be used as the thumbnail (Max 4MB)</p>
            </div>
        </div>
            <!-- End article thumbnail -->

    </div>  
    <!-- End article details -->

    <!-- Article content -->
    <div class="col-lg-7">

        <!-- Article submit button -->
        <div class="form-group col-12">
            <input type="text" class="form-control" placeholder="1" name="a_cat_id" value="1" hidden>
            <button type="submit" class="btn btn-outline-primary btn-lg col-lg-3 offset-9" name="add_new_article"><i class="ti-bookmark-alt pr-2"></i> Publish Article</button>
        </div>
            <!-- End article submit button -->


        <!-- Article body -->
        <div class="form-group col-lg-12">
            <textarea class="form-control summernote"  id="summernote"  rows="10" name="a_content" style="height: 1000px !important"></textarea>
        </div>
        <!-- End article body -->

    </div>
    <!-- End article content -->

</div>
</form>
<!-- End new article fields -->