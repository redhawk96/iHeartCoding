<div class="card border border-Muted border-top-0">
    <div class="card-body bg-dark">
    <h4 class="card-title font-16 mt-0 text-center text-white mb-0"><i class="fa fa-tags pr-1"></i> New Tag</h4>
</div>
<div class="card-body">
<form class="pt-3" name="newCategoryForm" action="../controllers/categoryController.php" method="POST" onsubmit="return validateAddCategory()" >
    <div class="form-group row" id="catAddTitleinput">
        <label class="col-lg-2 form-control border border-left-0 border-right-0 border-top-0 border-bottom-0 pl-3">Tag Title</label>
        <div class="col-lg-8">
            <input type="text" class="form-control has-error" placeholder="JavaScript" name="cat_title">
        </div>
        <div class="col px-0">
            <button type="submit" class="btn btn-outline-primary" name="add_category">Add Tag</button>
        </div>
    </div>
</form>
</div>
