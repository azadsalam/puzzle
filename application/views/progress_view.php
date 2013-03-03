<?php $this->load->view('template/header') ?>

<style type="text/css">
    .locked
    {
        background-image: url("<?php echo base_url() . "/resources/others/lock.jpg" ?>" );
        background-size: 100%;
    }
    .locked .inner_text
    {
        margin-top: 40px;
        margin-left: 86px;

    }

    .passed
    {
        background-size: 100%;
        background-repeat: no-repeat;
        background-position:center;
    }
    .passed img
    {
        width: 100%;
        height: 100%;
    }

    #progress_body
    {
        width: 900px;
        margin-left: auto;
        margin-right: auto;
}

    #grid
    {

    }
</style>

<script>
    $(document).ready(

    function()
    {

<?php $data['selected_nav'] = "progress_navbar";
$this->load->view('template/nav_helper', $data) ?>

    });
</script>
</head>
<body>

        <?php $this->load->view('template/navigation') ?>
        <?php
        $data['suc'] = ($current - 1) * 100 / $total;
        $this->load->view('template/progress_bar', $data)
        ?>


    <div id="progress_body">
        <h1 class="alert alert-info" style="text-align: center;">LEVELS</h1>
        <div id="grid" >

            <?php
            for ($count = 1; $count <= $total; $count++) {
                unset($new);

                if ($count <= $current) {
            ?>



            <?php
                    if ($count != $current) {
            ?>
                        <div class="cell passed" style ="background-image: url(<?php echo base_url() . "/" . $urls[$count] ?>) ">
                            <img  src="<?php echo base_url() ?>/resources/others/tick.png" >                </div>
            <?php
                    } else {
            ?>
                        <div class="cell passed" >
                            <a href="<?php echo site_url("solve") ?>"><img class="img-polaroid" src="<?php echo base_url() . "/" . $urls[$count] ?>"></a>
                        </div>
            <?php
                    }
            ?>




            <?php
                } else if ($count <= $total) {
            ?>

                    <div class="cell locked"><div class="inner_text"><h1><?php echo $count; ?></h1></div></div>

            <?php
                }
            }
            ?>


        </div>
    </div>
    <script>
        jQuery(document).ready(function() {
            //alignGrid(/*string*/ id, /*int*/ cols, /*int*/ cellWidth,
            //*int*/ cellHeight, /*int*/ padding)
            alignGrid("grid", 3, 15, 15, 3);
        });


    </script>


    <?php $this->load->view('template/footer') ?>
