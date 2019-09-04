<!-- general form elements -->
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Form</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form role="form" method="post">
        <div class="box-body">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="test" class="form-control" id="name" name="name" value="<?php echo $name ?>" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $email ?>" placeholder="Enter email">
            </div>
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
<!-- /.box -->