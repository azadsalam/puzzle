<?php $this->load->view('template/header') ?>

<script>
    $(document).ready(

    function()
    {

<?php $data['selected_nav'] = "ranklist_navbar";
$this->load->view('template/nav_helper', $data) ?>

        $('table').addClass('table table-striped');

	$('table').dataTable();
    });
</script>
</head>
<body>

    <?php $this->load->view('template/navigation') ?>


    <?php
    // print_r($ranklist);


    $this->table->set_heading(array('Rank', 'Student Id', 'Name', 'Current Level'));
    echo $this->table->generate($ranklist);
    ?>

<?php $this->load->view('template/footer') ?>
