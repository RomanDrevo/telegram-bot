<h1>Received Messages from Telegram Bot</h1>

<div class="wy-table-responsive">
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Message</th>
            <th>User ID</th>
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
