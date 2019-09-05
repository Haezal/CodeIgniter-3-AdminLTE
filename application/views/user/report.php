<div class="box">
    <div class="box-header">
        <h3 class="box-title">Report</h3>
    </div>
    <div class="box-body">


        <?php foreach ($arr as $key => $value) { ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th><?php echo $value['name'] ?></th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($value['staffs'] as $staff) { ?>
                    <tr>
                        <td><?php echo $staff['staff_name'] ?> (<?php echo $staff['staff_position'] ?>)</td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
            <hr>
        <?php } ?>

    </div>
</div>