
<?php echo validation_errors(); ?>
<div id="form">

    <p><?php if (isset($msg))
    echo $msg; ?></p>
    </br>
    <?php echo form_open_multipart('admin_panel/form/input'); ?>




    <p> Serial : <input type="text" size="30" name="serial"/></p>
    <p> Hint : <input type="text" size="30" name="hint"/></p>
    <p> Ans : <input type="text" size="30" name="ans"/></p>
    <p> Logic : <input type="text" size="30" name="logic"/></p>
    </br></br>

    <p>
        <?php echo form_label('Photo', 'photo') ?>
        <?php echo form_upload('photo') ?>
    </p>

    </br>
    <p><?php echo form_submit('submit', 'Upload') ?></p>
    <?php form_close() ?>

</div>
