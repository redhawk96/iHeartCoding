<form action="../controllers/userController.php" method="POST">
<div class="row" style="padding-bottom:35px">
    <div id="bulkOptionsContainer">
        <div class="col-xs-2" style="padding-right:0">
            <select class="form-control" name="bulk_option">
                <option selected>Select Option</option>
                <option>Activate</option>
                <option>Disable</option>
                <option>Delete</option>
            </select>
        </div>

        <div class="col-xs-3">
            <button type="submit" onclick="javascript: return confirm('Are you sure you want to apply changes?');" class="btn btn-success" name="bulk_apply"><i class="fa fa-check" style="margin-right:5px"></i> Apply</button>
            <a href="./users?add_user" class="btn btn-primary"><i class="fa fa-user" style="margin-right:5px"></i>New Member</a>
        </div>
    </div>
</div>
<table class="table table-striped table-bordered" id="datatable">
    <thead>
        <tr>
            <th><input id="selectAllBoxes" type="checkbox"></th>
            <th>ID</th>
            <th>Avatar</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Username</th>
            <th>Role</th>
            <th>Status</th> 
            <th>Registerd on</th> 
            <th>Account</th> 
            <th></th> 
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>

    <?php

    // Calling displayAllUsers method of User class
    $displayAllUsers = $user->displayAllUsers();

    // Stating while loop to display all users
    while($row = mysqli_fetch_assoc($displayAllUsers)){
        $u_id = $row['user_id'];
        $username = $row['username'];
        $u_first_name = $row['user_firstName'];
        $u_last_name = $row['user_lastName'];
        $u_email = $row['user_email'];
        $u_image = $row['user_image'];
        $u_role = $row['user_role'];
        $u_status = $row['user_status'];
        $u_reg_date = $row['user_reg_date'];
    ?>

    <!-- Starting display of articles [HTML Content] -->

        <tr>
            <td><input class="checkBoxes" type="checkbox" name="userIdCheckBoxArray[]" value="<?php echo $u_id; ?>"></td>
            <td><?php echo $u_id; ?></td>
            <td>
                <img src="../public/upload/users/<?php echo $u_image; ?>" style="width:50px">
                <input class="checkBoxes" type="checkbox" name="userImagCheckBoxArray[]" value="<?php echo $u_image; ?>" checked hidden>
            </td>
            <td><?php echo $u_first_name; ?></td>
            <td><?php echo $u_last_name; ?></td>
            <td><?php echo $u_email; ?></td>
            <td><?php echo $username; ?></td>  
            <td><?php echo $u_role; ?></td>
            <td><?php echo $u_status; ?></td>
            <td><?php echo date('M j Y | h:i A', strtotime($u_reg_date)); ?></td>
            <td>
                <form action="../controllers/userController.php" method="POST">

                    <?php 
                    $action = "activate_user";
                    $icon = "thumbs-up";
                    $btn_name = "Activate";

                    if($u_status == 'Active') {
                        $action = "disable_user";
                        $icon = "thumbs-down";
                        $btn_name = "Disable";
                    }

                    echo "<button type='submit' class='btn btn-primary btn-sm' name='$action' value='$u_id'><i class='fa fa-$icon'></i> $btn_name</button>";
                    ?>
                </form>
            </td>
            <td>
                <a href="./users?user=<?php echo $u_id; ?>" class="btn btn-default btn-sm"><i class="fa fa-edit"></i> View</a>
            </td>
            <td>
                <a href="./users?edit_user=<?php echo $u_id; ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>
            </td>
            <td>
                <form action="../controllers/userController.php" method="POST">
                    <input type="text" name="u_image_name" value="<?php echo $u_image; ?>" hidden>
                    <button type="submit" onclick="javascript: return confirm('Are you sure you want to delete?');" class="btn btn-danger btn-sm" name="delete_user" value="<?php echo $u_id; ?>"><i class="fa fa-trash"></i> Delete</button>
                </form>
            </td>
        </tr>

    <!-- End of displaying articles [HTML Content] -->
    <?php
    }
    // End of while loop to display all articles
    ?>

    </tbody>
</table>