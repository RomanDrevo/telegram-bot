

<div class="wy-table-responsive">
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Message</th>
            <th>Address</th>
            <th>Sent</th>
        </tr>

        <?php foreach ($messages as $message) :  ?>

        <tr>
            <td> <?php echo $message->id; ?>  </td>
            <td> <?php echo $message->text; ?> </td>
            <td> <?php echo $message->adress; ?> </td>
            <td> <?php echo $message->updatedAt; ?> </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
<?php //foreach ($messages as $message) :  ?>
<!---->
<!--<h1> --><?php //echo $message->id; ?><!-- </h1>-->
<!--<h1> --><?php //echo $message->text; ?><!-- </h1>-->
<!--<h1> --><?php //echo $message->adress; ?><!-- </h1>-->
<!--<h1> --><?php //echo $message->updatedAt; ?><!-- </h1>-->
<!---->
<?php //endforeach; ?>