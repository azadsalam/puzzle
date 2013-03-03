<style type="text/css">
    #dashboard{
        background-color: #ded9e3;
        width: 800px;
        margin-left: auto;
        margin-right: auto;
        position: relative;
    }
    #outer_main
    {
        width: 400px;
        position: absolute;
        top: 50px;
        left: 200px;
    }
    #inner_main
    {
        padding-left: 130px;
    }
    #upper_left
    {
        position: absolute;
        top: 100px;
        left: 700px;
    }
    #upper_right
    {
        position: absolute;
        top: 0px;
        left: 700px;
    }
    #lower_left
    {
        position: absolute;
        top: 310px;
        left: 25px;
    }
    #lower_middle
    {
        position: absolute;
        top: 360px;
        left: 310px;
    }
    #lower_right
    {
        position: absolute;
        top: 310px;
        left: 570px;
    }
    .left
    {
        position: absolute;
        right: 20px;

    }
    .right
    {
        position: absolute;
        left: 80px;

    }
</style>

<div id="dashboard">
    <!--
            <div id="upper_left">
            <a href="http://buet.ac.bd/cse/csefest2013/index.php"><img width="150px" src="<?php echo base_url() ?>/resources/others/logo.jpg" /> </a>
            </div>
    -->

    <div id="outer_main">
        <div id="inner_main"><img src="<?php echo base_url() ?>/resources/others/welldone2.gif" /></div>
        <a href="<?php echo site_url('solve'); ?>"><img width="450px" src="<?php echo base_url() ?>/resources/others/solve.png" /> </a>
    </div>

    <div id="lower_right">
        <a href="<?php echo site_url('ranklist'); ?>"><img width="200px" src="<?php echo base_url() ?>/resources/others/leaderboard.png" /> </a>
    </div>

    <div id="lower_left">
        <a href="<?php echo site_url('progress'); ?>"><img width="200px" src="<?php echo base_url() ?>/resources/others/my_progress.png" /> </a>
    </div>

    <div id="lower_middle">
        <a href="<?php echo site_url('rules'); ?>"><img width="150px" src="<?php echo base_url() ?>/resources/others/rules.jpg" /> </a>
    </div>

    <!--
    <?php
    /**
      $is_logged_in = $this->session->userdata('is_logged_in');
      if (!isset($is_logged_in) || $is_logged_in != true) {
      //NOT LOGGED  IN
      ?>
      <div id="upper_right">
      <a class="left" href="<?php echo site_url('auth'); ?>"><img width="100px" src="<?php echo base_url() ?>/resources/others/login.png" /> </a>
      <a class="right" href="<?php echo site_url('registration'); ?>"><img width="100px" src="<?php echo base_url() ?>/resources/others/register.gif" /> </a>
      </div>
      <?php
      } else {
      //LOGGED IN
      ?>
      <div id="upper_right">
      <a href="<?php echo site_url('auth/logout'); ?>"><img width="100px" src="<?php echo base_url() ?>/resources/others/log_off.png" /> </a>
      </div>
      <?php
      }

     */
    ?>
    -->



</div>