

<div class="box">
    <div class="box-header">
        <h3 class="box-title">User Details</h3>
    </div>
    <div class="box-body">
        <table class="table">
            <tr>
                <th>Name</th>
                <td><?php echo $user['name'] ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?php echo $user['email'] ?></td>
            </tr>
        </table>
    </div>
</div>

<a href="<?php echo site_url('/user') ?>" class="btn btn-primary">Back</a>