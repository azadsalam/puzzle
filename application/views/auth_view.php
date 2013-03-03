<?php $this->load->view('template/header') ?>
<script>
    $(document).ready(

    function()
    {

<?php $data['selected_nav'] = "login_navbar";
$this->load->view('template/nav_helper', $data) ?>

    });
</script>
</head>
<body>

    <?php $this->load->view('template/navigation') ?>


    <?php echo validation_errors(); ?>
    <div id="login">


        <?php
        echo form_open('auth/validate_credentials');
        ?>
        <fieldset>
            <legend>Log In</legend>
            <label>Mail Id</label>
            <input type="text" placeholder="Write your mail here!!" name="mail">
            <label>Password</label>
            <input type="password" placeholder="Write you password here!!" name="pass">
            <br/>
<?php
        $attributes2 = array('name' => 'submit', 'value' => 'Log In !!', 'id' => 'login_go', 'class' => 'btn btn-info');
        echo form_submit($attributes2);
?>
            <a href="<?php echo site_url('registration'); ?>" class="btn btn-success" style="margin-left: 10px">Get Registered !!</a>
        </fieldset>
    </form>
</div>

<?php $this->load->view('template/footer') ?>
