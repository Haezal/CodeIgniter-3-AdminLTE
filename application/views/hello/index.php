<div class="box">

    <div class="box-header">
        <h3 class="box-title">User List</h3>

        <div class="box-tools">
            <a href="<?php echo site_url('hello/create') ?>">Create user</a>
        </div>

    </div>
    <!-- end header -->
    <div class="box-body">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $key => $value) { ?>
                    
                    <tr>
                        <td><?php echo $value['name'] ?></td>
                        <td><?php echo $value['email'] ?></td>
                        <td>
                            <a href="<?php echo site_url('hello/view/' . $value['id']) ?>" class="btn btn-info btn-xs">Lihat</a>
                            <a href="<?php echo site_url('hello/update/' . $value['id']) ?>" class="btn btn-warning btn-xs">Update</a>
                            <a href="<?php echo site_url('hello/delete/' . $value['id']) ?>" class="btn btn-danger btn-xs" onClick="return confirm('Adakah anda pasti?')">Hapus</a>
                        </td>
                    </tr>

                <?php } ?>
            </tbody>
            
        </table>
        <p><?php echo $links; ?></p>
    </div>
    <!-- end body -->
</div>
<!-- end box -->