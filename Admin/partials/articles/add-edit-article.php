<?php 

// If ecat valiable is shown then content will be show to update existing category
// eg: article.php?eart=1

if(isset($_GET['eart'])){

    // Getting the value of eart variable. ecat variable hold the values of the id of a specific article
    $eart_id = $_GET['eart'];

    // Calling displaySingleArticleToEdit method of Article class
    $displaySingleArticleToEdit = $article->displaySingleArticleToEdit($eart_id);

    // Stating while loop to display specific article
    while($row = mysqli_fetch_assoc($displaySingleArticleToEdit)){
    
    $a_id = $row['article_id'];
    $a_cat_id = $row['article_category_id'];
    $a_title = $row['article_title'];
    $a_author = $row['article_author'];
    $a_date = $row['article_date'];
    $a_image = $row['article_image'];
    $a_content = $row['article_content'];
    $a_tags = $row['article_tags'];
    $a_status = $row['article_status'];

?>

    <form action="/iHeartCoding/controllers/articleController.php" method="POST" enctype="multipart/form-data">

    <div class="row">

        <div class="col-lg-5 pt-3">
            <div class="form-group row pb-2 pt-5">
                <label class="col-md-3 col-form-label">Author</label>
                <div class="col-md-9">
                    <div class="input-group mr-sm-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <img src="/iHeartCoding/public/upload/users/<?php echo $_SESSION["u_avatar"] ?>" class="rounded-circle" style="width:20px">
                            </div>
                        </div>
                        <input type="text" class="form-control" value="<?php echo $a_author ;?>" name="a_author" readonly>
                    </div>
                </div>
            </div>

            <div class="form-group row py-1">
                <label class="col-md-3 col-form-label">Date</label>
                <div class="col-md-9">
                    <p><?php echo date('l jS F Y | h:i A', strtotime($a_date));?></p>
                </div>
            </div>

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

            <div class="form-group row py-1">
                <label class="col-md-3 col-form-label">Banner</label>
                <div class="col-md-9">
                    <input type="file" class="filestyle" data-buttonname="btn-secondary"  name="a_image" id="a_image" accept="image/*">
                    <input type="text" name="a_image_name" value="<?php echo $a_image; ?>" hidden>
                    <p class="help-block">Banner will be used as the thumbnail (Max 2MB)</p>
                </div>
            </div>

            <div class="form-group row py-1">
                <label class="col-md-3 col-form-label"></label>
                <div class="col-md-4">
                    <a class="image-popup-no-margins" href="/iHeartCoding/public/upload/articles/<?php echo $a_image; ?>">
                        <img class="img-fluid" alt="" src="/iHeartCoding/public/upload/articles/<?php echo $a_image; ?>" class="img-thumbnail">
                    </a>
                </div>
            </div>
            
        </div>  
        
        <div class="col-lg-7">
            <div class="form-group col-12">
                <input type="text" class="form-control" placeholder="1" name="a_cat_id" value="<?php echo $a_cat_id ;?>" hidden>
                <button type="submit" class="btn btn-outline-warning btn-lg col-3 offset-9" name="update_article" value="<?php echo $a_id ;?>"><i class="ti-save pr-2"></i> Update Article</button>
            </div>

            <div class="form-group col-lg-12">
                <textarea class="form-control summernote"  id="summernote"  rows="10" name="a_content" style="height: 1000px !important"><?php echo $a_content ;?></textarea>
            </div>
        </div>
            
    </div>
    </form>

<?php  

    }

}else{

?>

    <form action="/iHeartCoding/controllers/articleController.php" method="POST" enctype="multipart/form-data">

    <div class="row">

        <div class="col-lg-5 col-md-12 pt-3">
            <div class="form-group row pb-2 pt-5">
                <label class="col-md-3 col-form-label">Author</label>
                <div class="col-md-9">
                    <div class="input-group mr-sm-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <img src="/iHeartCoding/public/upload/users/<?php echo $_SESSION["u_avatar"] ?>" class="rounded-circle" style="width:20px">
                            </div>
                        </div>
                        <input type="text" class="form-control" value="<?php echo $_SESSION["username"] ?>" name="a_author" readonly>
                    </div>
                </div>
            </div>

            <div class="form-group row py-1">
                <label class="col-md-3 col-form-label">Date</label>
                <div class="col-md-9">
                    <p><?php date_default_timezone_set('Asia/Colombo'); echo date('l jS F Y | h:i A', time()); ?></p>
                </div>
            </div>

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

            <div class="form-group row py-1">
                <label class="col-md-3 col-form-label">Status</label>
                <div class="col-md-9">
                    <select class="form-control" name="a_status">
                        <option value="Drafted" selected>Save article as a draft</option>
                        <option value="Published">Publish article to public</option>
                    </select>
                </div>
            </div>

            <div class="form-group row py-1">
                <label class="col-md-3 col-form-label">Banner</label>
                <div class="col-md-9">
                    <input type="file" class="filestyle" data-buttonname="btn-secondary"  name="a_image" id="a_image" accept="image/*">
                    <p class="help-block">Banner will be used as the thumbnail (Max 4MB)</p>
                </div>
            </div>
            
        </div>  
        
        <div class="col-lg-7">
            <div class="form-group col-12">
                <input type="text" class="form-control" placeholder="1" name="a_cat_id" value="1" hidden>
                <button type="submit" class="btn btn-outline-primary btn-lg col-lg-3 offset-9" name="add_new_article"><i class="ti-bookmark-alt pr-2"></i> Publish Article</button>
            </div>

            <div class="form-group col-lg-12">
                <textarea class="form-control summernote"  id="summernote"  rows="10" name="a_content" style="height: 1000px !important"></textarea>
            </div>
        </div>
            
    </div>
    </form>

<?php
}
// End of displaying add new article content
?>

<script>
var uploadField = document.getElementById("a_image");
var maxSize = 4 * 1000 * 1000 ; // 4MB
uploadField.onchange = function() {
    if(this.files[0].size > maxSize){
    alert("File is too big!");
    this.value = "";
    };
};
</script>