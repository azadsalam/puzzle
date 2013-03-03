<?php $this->load->view('template/header') ?>

<script>
    $(document).ready(

    function()
    {

<?php $data['selected_nav'] = "rules_navbar";
$this->load->view('template/nav_helper', $data) ?>

    });
</script>
</head>
<body>

    <?php $this->load->view('template/navigation') ?>
    <h1 class="alert alert-info myheader">Rules</h1>

    <div class="hero-unit">
        Welcome to Brain Hacker, one of our very interesting event of CSE Festival, 2013
        BUET. There is no restriction of participation. But we request to use proper
        name while registering. The rules are very simple:

        1. See the picture, read the title and give the answer. Thats all. Simple and Stupid.
        2. All the answers are one word(lower case alphabet).
        3. Please do not give answer to your friend. You may discuss through  <a href="https://www.facebook.com/groups/csefest2013/">Festival Facebook Group</a>. You may give hint, but not answer.
    </div>
    <?php $this->load->view('template/footer') ?>
