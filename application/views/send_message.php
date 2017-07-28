<form method="post" action="<?php echo base_url();?>message/form_validation">
    <div class="form-group">
        <label for="user_id">User ID</label>
        <input type="text" class="form-controller" name="user_id" id="user_id">
        <span class="text-danger"><?php echo form_error("user_id")?></span>
    </div>

    <div class="form-group">
        <label for="message">Message</label>
        <input type="text" class="form-controller" name="message" id="message">
        <span class="wy-text-danger"><?php echo form_error("message")?></span>
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-info" name="submit" id="submit" value="Send">
    </div>
</form>