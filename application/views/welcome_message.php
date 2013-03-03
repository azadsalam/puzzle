<?php $this-> load->view('template/header')?>

<script>
$(document).ready(

function()
{

<?php $data['selected_nav'] = "home_navbar";
$this-> load->view('template/nav_helper',$data)?>

});
    </script>
</head>
  <body>

<?php $this-> load->view('template/navigation')?>

 
<?php $this-> load->view('dashboard'); ?>

<?php $this-> load->view('template/footer')?>
