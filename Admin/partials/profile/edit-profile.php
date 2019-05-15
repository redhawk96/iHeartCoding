<?php 

    // Getting user_id from the session
    $u_id = $_SESSION['u_id'];

    // Calling displaySingleUser method of User class
    $displaySingleUser = $user->displaySingleUser($u_id);

    // Stating while loop to display logged in user
    while($row = mysqli_fetch_assoc($displaySingleUser)){
        $username = $row['username'];
        $u_first_name = $row['user_firstName'];
        $u_last_name = $row['user_lastName'];
        $u_email = $row['user_email'];
        $u_image = $row['user_image'];
        $u_role = $row['user_role'];
        $u_status = $row['user_status'];
        $u_reg_date = $row['user_reg_date'];
?>

    <!-- Displaying logged in user information [HTML Content] -->
    <form action="../controllers/userController.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label>First Name</label>
            <input type="text" class="form-control" name="u_firstName" value="<?php echo $u_first_name; ?>">
        </div>
        <div class="form-group">
            <label>Last Name</label>
            <input type="text" class="form-control" name="u_lastName" value="<?php echo $u_last_name; ?>">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="u_mail" value="<?php echo $u_email; ?>">
        </div>
        <img src="../public/upload/users/<?php echo $u_image ;?>" style="width:200px">
        <div class="form-group">
            <label>Avatar</label>
            <input type="text" name="u_image_name" value="<?php echo $u_image; ?>" hidden>
            <input type="file" name="u_image" class="form-control">
            <p class="help-block">This will be used as your profile picture </p>
        </div>
        <div class="form-group">
            <label>Type</label>
            <select class="form-control" name="u_type">
                <?php 
                    switch($u_role){

                        case 'Subscriber' : echo "<option selected>Subscriber</option>
                                                  <option>Moderator</option>
                                                  <option>Administrator</option>"; 
                                                  break; 
                        
                        case 'Moderator' : echo "<option selected>Moderator</option>
                                                <option>Subscriber</option>
                                                <option>Administrator</option>"; 
                                                break; 

                        case 'Administrator' : echo "<option selected>Administrator</option>
                                                    <option>Subscriber</option>
                                                    <option>Moderator</option>"; 
                                                    break; 
                    }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label>Username</label>
            <input type="text" class="form-control" name="username" value="<?php echo $username; ?>">
        </div>
        <button type="submit" class="btn btn-primary" name="edit_user" value="<?php echo $u_id; ?>">Submit</button>
    </form>

    <!-- End Displaying logged in user information [HTML Content] -->

<?php  
    }
    // End of while loop to display logged in user
?>