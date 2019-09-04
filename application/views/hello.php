<h1>This is user list</h1>

<table border=1 width="100%">
    <tr>
        <th>Name</th>
        <th>Email</th>
    </tr>
    <?php foreach ($data as $key => $value) { ?>
        
        <tr>
            <td><?php echo $value['name'] ?></td>
            <td><?php echo $value['email'] ?></td>
        </tr>

    <?php } ?>
</table>