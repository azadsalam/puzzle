<!DOCTYPE html>
<html>
    <head>
        <title>BUET CSE FESTIVAL 2013 - Hack The Brain - Admin Panel</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="<?php echo base_url() . 'jquery' ?>/jquery.js"></script>
        <!-- Bootstrap -->
        <link href="<?php echo base_url() . 'bootstrap' ?>/css/bootstrap.min.css" rel="stylesheet" media="screen">

        <script src="<?php echo base_url() . 'bootstrap' ?>/js/bootstrap.min.js"></script>

        <link href="<?php echo base_url() . 'resources' ?>/style.css" rel="stylesheet" media="screen">

    <div class="navbar">
        <div class="navbar-inner">
            <a class="brand" href="http://buet.ac.bd/cse/csefest2013/">BUET CSE FESTIVAL 2013</a>
            <ul class="nav">
                <li id="home_navbar"><a href="<?php echo site_url(); ?>">Main Picture Puzzle Website</a></li>
                <li id="rules_navbar"><a href="<?php echo site_url('admin_panel/manage_puzzle'); ?>">Manage Puzzles</a></li>
                                <li id=""><a href="<?php echo site_url('admin_panel/manage_user'); ?>">Manage User</a></li>
                <li id=""><a href="<?php echo site_url('admin_panel/manage_progress'); ?>">Manage Progress</a></li>
                <li id="rules_navbar"><a href="<?php echo site_url('admin_panel/manage_progress2'); ?>">Manage Progress with Name</a></li>

                <li id="solve_navbar"><a href="<?php echo site_url('admin_panel/log'); ?>">View Log </a></li>
                <li><a href="<?php  echo site_url('admin_panel/authentication/logout') ?>">Logout</a></li>

            </ul>
        </div>


