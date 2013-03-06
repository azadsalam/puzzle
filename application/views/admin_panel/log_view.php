<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <?php foreach ($css_files as $file): ?>
            <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
        <?php foreach ($js_files as $file): ?>
                <script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
                <style type='text/css'>
                    body
                    {
                        font-family: Arial;
                        font-size: 14px;
                    }
                    a {
                        color: blue;
                        text-decoration: none;
                        font-size: 14px;
                    }
                    a:hover
                    {
                        text-decoration: underline;
                    }
                </style>
            </head>
            <body>
<ul class="nav">
                <li id="home_navbar"><a href="<?php echo site_url(); ?>">Main Picture Puzzle Website</a></li>
                <li ><a href="<?php echo site_url('admin_panel/welcome'); ?>">Admin Panel Home </a></li>
                <li id="rules_navbar"><a href="<?php echo site_url('admin_panel/manage_puzzle'); ?>">Manage Puzzles</a></li>
                <li id="solve_navbar"><a href="<?php echo site_url('admin_panel/log'); ?>">View Log </a></li>
                
                <li><a href="<?php  echo site_url('admin_panel/authentication/logout') ?>">Logout</a></li>

            </ul>
                <div style='height:20px;'></div>
                <div>
<?php echo $output; ?>
        </div>
    </body>
</html>
