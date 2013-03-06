<div class="navbar">
    <div class="navbar-inner">
        <a class="brand" href="http://buet.ac.bd/cse/csefest2013/">BUET CSE FESTIVAL 2013</a>
        <ul class="nav">
            <li id="home_navbar"><a href="<?php echo site_url(); ?>">Hack The Brain</a></li>
            <li id="rules_navbar"><a href="<?php echo site_url('rules'); ?>"> Rules </a></li>
            <li id="solve_navbar"><a href="<?php echo site_url('solve'); ?>"> Solve </a></li>
            <li id="progress_navbar"><a href="<?php echo site_url('progress'); ?>">My Progress </a></li>
            

            <li id="ranklist_navbar"><a href="<?php echo site_url('ranklist'); ?>"> Leaderboards </a></li>
            <?php
            $is_logged_in = $this->session->userdata('is_logged_in');
            if (!isset($is_logged_in) || $is_logged_in != true) {
                //NOT LOGGED  IN
            ?>
                <li  id="login_navbar"><a href="<?php echo site_url('auth'); ?>"> Log In </a></li>
                <li  id="reg_navbar"><a href="<?php echo site_url('registration'); ?>"> Registration </a></li>
            <?php
            } else {
                //LOGGED IN
            ?>

                <li><a href="<?php echo site_url('auth/logout'); ?>"> Log Out!! </a></li>
            <?php
            }
            ?>


        </ul>
    </div>
</div>

