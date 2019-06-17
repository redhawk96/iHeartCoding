<form action="../controllers/userController.php" method="POST">

<div class="offset-10 col pr-0 pb-5">
    <div class="input-group col-2">
    <select class="custom-select form-control" name="bulk_option">
        <option selected>Select</option>
        <option value="Activate">Activate</option>
        <option value="Disable">Disable</option>
        <option value="Delete">Delete</option>
    </select>
    <div class="input-group-append">
        <button type="submit" onclick="javascript: return confirm('Are you sure you want to apply changes?');" class="btn btn-outline-success float-right" name="bulk_apply"><i class="ti-save"></i></button>
    </div>
    </div>
</div>

<table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
        <tr>
            <th><input id="selectAllBoxes" type="checkbox"></th>
            <th class="text-center">Avatar</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Username</th>
            <th>Role</th>
            <th class="text-center">Status</th> 
            <th class="text-center">Account</th> 
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
    ?>

    <!-- Starting display of articles [HTML Content] -->

        <tr>
            <td class="text-center"><input class="checkBoxes" type="checkbox" name="userIdCheckBoxArray[]" value="<?php echo $u_id; ?>"></td>
            <td class="text-center">
                <a class="image-popup-no-margins" href="../public/upload/users/<?php echo $u_image; ?>">
                    <img class="img-fluid" alt="" src="../public/upload/users/<?php echo $u_image; ?>" width="28">
                </a>
                <input class="checkBoxes" type="checkbox" name="userImagCheckBoxArray[]" value="<?php echo $u_image; ?>" checked hidden>
            </td>
            <td><?php echo $u_first_name; ?></td>
            <td><?php echo $u_last_name; ?></td>
            <td><?php echo $u_email; ?></td>
            <td><?php echo $username; ?></td>  
            <td><?php echo $u_role; ?></td>
            <td class="text-center"><?php echo $u_status; ?></td>
            <td class="text-center">
                <form action="../controllers/userController.php" method="POST">

                    <?php 
                    $action = "activate_user";
                    $icon = "unlock";
                    $btn_name = "Activate";
                    $btn_color = "success";

                    if($u_status == 'Active') {
                        $action = "disable_user";
                        $icon = "lock";
                        $btn_name = "Disable";
                        $btn_color = "secondary";
                    }

                    echo "<button type='submit' class='btn btn-outline-$btn_color btn-sm' name='$action' value='$u_id'><i class='ti-$icon'></i> $btn_name</button>";
                    ?>
                </form>
            </td>
            <td class="text-center">
                <a href="./users?user=<?php echo $u_id; ?>" class="btn btn-outline-info btn-sm"><i class="ti-view-list-alt pr-1"></i> View</a>
            </td>
            <td class="text-center">
                <a href="./users?edit_user=<?php echo $u_id; ?>" class="btn btn-outline-warning btn-sm"><i class="ti-pencil-alt pr-1"></i> Edit</a>
            </td>
            <td class="text-center">
                <form action="../controllers/userController.php" method="POST">
                    <input type="text" name="u_image_name" value="<?php echo $u_image; ?>" hidden>
                    <button type="submit" onclick="javascript: return confirm('Are you sure you want to delete?');" class="btn btn-outline-danger btn-sm" name="delete_user" value="<?php echo $u_id; ?>"><i class="ti-trash pr-1"></i> Delete</button>
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