<div class="box">
    <div class="box-header">
    </div>
    <div class="box-body">
        <form action="" method="post">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" 
            placeholder="Name" value="<?php echo $name ?>">
            <?php echo form_error('name'); ?>
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email" 
            placeholder="Email" value="<?php echo $email ?>">
            <?php echo form_error('email'); ?>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            <?php echo form_error('password'); ?>
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
            <a href="<?php echo $this->session->userdata('previous_url') ?>" class="btn btn-default">Cancel</a>
        </form>
    </div>
</div>