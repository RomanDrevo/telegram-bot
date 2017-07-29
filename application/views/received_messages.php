<h1>Sent Messages to Telegram Bot</h1>

<div class="wy-table-responsive">
    <table class="table table-bordered">
        <tr>
            <th>Message ID</th>
            <th>Text</th>
            <th>From</th>
        </tr>

        <?php foreach ($received_messages as $message) :  ?>

            <tr>
                <td> <?php echo $message['message']['message_id']; ?>  </td>
                <td> <?php echo $message['message']['text']; ?> </td>
                <td> <?php echo $message['message']['from']['id']; ?> (<?php echo $message['message']['from']['first_name']; ?>) </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

