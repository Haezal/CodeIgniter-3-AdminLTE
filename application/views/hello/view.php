<div class="box">

    <div class="box-header">
        <h3 class="box-title">User List</h3>

        <div class="box-tools">
            <a href="<?php echo site_url('hello/update/'.$id) ?>">Update</a>
        </div>

    </div>
    <!-- end header -->
    <div class="box-body">
        
        Name : <?php echo $name ?> <br>
        Email : <?php echo $email ?> 

    </div>
    <!-- end body -->
    <a href="<?php echo $this->session->userdata('previous_url') ?>">Back</a>
</div>
<!-- end box -->