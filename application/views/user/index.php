<div class="box">
    <div class="box-header">
        <h3 class="box-title">User List</h3>
        <div class="box-tools pull-right">
            <a href="<?php echo site_url('/user/create') ?>" class="btn btn-success btn-sm">Create new user</a>
        </div>
    </div>
    <div class="box-body">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php $bil = 1;foreach ($users as $user) { ?>
                <tr>
                    <td><?php echo $bil++ ?></td>
                    <td><?php echo $user['name'] ?></td>
                    <td><?php echo $user['email'] ?></td>
                    <td>
                        <a href="<?php echo site_url('/user/view/' . $user['id']) ?>" class="btn btn-primary btn-sm">View</a>
                        <a href="<?php echo site_url('/user/update/' . $user['id']) ?>" class="btn btn-warning btn-sm">Update</a>
                        <a href="<?php echo site_url('/user/delete/' . $user['id']) ?>" class="btn btn-danger btn-sm" onClick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>