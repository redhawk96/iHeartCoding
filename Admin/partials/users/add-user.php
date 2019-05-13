<form action="../controllers/userController.php" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label>First Name</label>
        <input type="text" class="form-control" placeholder="John" name="u_firstName">
    </div>
    <div class="form-group">
        <label>Last Name</label>
        <input type="text" class="form-control" placeholder="Doe" name="u_lastName">
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="email" class="form-control" placeholder="JohnDoe@gmail.com" name="u_mail">
    </div>
    <div class="form-group">
        <label>Avatar</label>
        <input type="file" name="u_image" class="form-control">
        <p class="help-block">This will be used as your profile picture </p>
    </div>
    <div class="form-group">
        <label>Type</label>
        <select class="form-control" name="u_type">
            <option selected>Member</option>
            <option>Admin</option>
        </select>
    </div>
    <div class="form-group">
        <label>Username</label>
        <input type="text" class="form-control" placeholder="JohnDoe93" name="username">
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" name="password">
    </div>
    <button type="submit" class="btn btn-primary" name="add_user">Submit</button>
</form>
