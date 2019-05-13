<?php 

    $u_id = $_GET['user'];

    // Calling displaySingleUser method of User class
    $displaySingleUser = $user->displaySingleUser($u_id);

    // Stating while loop to display all users
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

    <!-- Displaying specific category [HTML Content] -->
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
            <label>Type</label>
            <select class="form-control" name="u_type">
                <option selected>Member</option>
                <option>Admin</option>
            </select>
        </div>
        <div class="form-group">
            <label>Username</label>
            <input type="text" class="form-control" name="username" value="<?php echo $username; ?>">
        </div>

    <!-- End Displaying specific category [HTML Content] -->

<?php  

    }
    // End of while loop to display specific category

// Else if the ecat is not shown and the url is as below, then content will be show to add new category
// eg: categories.php
?>