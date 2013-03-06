<?php $this->load->view('template/header') ?>
<script>
    $(document).ready(

    function()
    {

<?php $data['selected_nav'] = "reg_navbar";
$this->load->view('template/nav_helper', $data) ?>

    }




);


    /* POST  ENDS*/


</script>
</head>
<body>

    <?php $this->load->view('template/navigation') ?>

    <?php
    echo validation_errors();
    if (isset($error) && $error != NULL) {
        echo $error;
    }
    ?>

    <div id="reg">
        <?php echo form_open('registration/submit'); ?>
        <fieldset>
            <legend>Register yourself for the fun! </legend>

            <label>Name</label>
            <input type="text" placeholder="Your Name!!" name="uname" value="<?php echo set_value('uname'); ?>" >
            <label>Student ID</label>
            <input type="text" placeholder="Your Student ID!!" name="student_id" value="<?php echo set_value('student_id'); ?>" >
            <label>Institution</label>
            <input type="text" placeholder="Your Institution!!" name="institution" value="<?php echo set_value('institution'); ?>" >

            <!--
            <label>Level</label>
            <input type="text" placeholder="Your Level!!" name="ulevel" value="<?php echo set_value('ulevel'); ?>" >
            <label>Term</label>
            <input type="text" placeholder="Your Term!!" name="uterm" value="<?php echo set_value('uterm'); ?>" >
            -->
            <label>Mail Id</label>
            <input type="text" placeholder="Your mail address" name="mail" value="<?php echo set_value('mail'); ?>" >
            <label>Password</label>
            <input type="password" placeholder="At least 6 character long!!" name="pass">
            <label>Confirm Password</label>
            <input type="password" placeholder="The same password!!" name="confirm_pass">
            <br/>

            <button type="submit" class="btn btn-success" >Submit</button>
        </fieldset>
    </form>
</div>
<!--MAIN CONTENT -->
<?php $this->load->view('template/footer') ?>
