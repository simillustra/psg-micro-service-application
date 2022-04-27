<body class="login-page">
   <div id="signup-space" class="col-xs-12 col-sm-6 col-md-6 col-lg-6 navbar-left navbar-right" style="margin-top: 2%; margin-right: 2%;">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs nav-justified nav-pills" role="tablist">
            <li class="active">
                <a href="#home" role="tab" data-toggle="tab" class="btn btn-success">
                    <i class="fas fa-unlock"></i>
                    <span>SIGNIN</span>
                </a>
            </li>
            <li>
                <a href="#profile" role="tab" data-toggle="tab" class="btn btn-danger">
                    <i class="fas fa-user-plus"></i> <span>SIGNUP</span>
                </a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content" style="background-color: #fff;">
            <div class="tab-pane fade active in" id="home">
                <form action="<?php echo H_ADMIN_MAIN . '&view=hsys_users&do=loginpro'; ?>" method="post"
                      name="hezecomform"
                      id="hezecomform" enctype="multipart/form-data">
                    <div class="login-box">
                        <div class="text-center">
                            <img src="<?php echo H_THEME; ?>/images/logo.jpg" width="100"  height="100" class="img-circle border p-1" />
                        </div>
                        <div class="login-logo">
                            <a href="<?php echo H_CLIENT; ?>"><b>PSG-</b>LIMITED</a>
                            <h3>POULTRY SERVICES  <strong> PLATFORM</strong></h3>
                        </div><!-- /.login-logo -->
                        <div class="login-box-body">
                            <p class="login-box-msg"><?php echo LANG_ADMIN_LOGIN; ?></p>

                            <div class="output"></div>

                            <div class="form-group has-feedback">
                                <input type="text" name="username" class="form-control"
                                       placeholder="<?php echo LANG_ADMIN_USERNAME; ?>"/>
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="password" name="password" class="form-control"
                                       placeholder="<?php echo LANG_ADMIN_PASSWORD; ?>"/>
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            </div>
                            <div class="row">
                                <div class="col-xs-4">
                                    <button type="button" class="btn btn-warning btn-block" data-toggle="modal"
                                            data-target="#forgotPass">
                                        <i class="fa fa-fw fa-key"></i>
                                    </button>
                                </div><!-- /.col -->
                                <div class="col-xs-8">
                                    <input name="Logme" class="btn btn-primary btn-block btn-flat " type="submit"
                                           value="<?php echo LANG_ADMIN_BUTTON; ?>"/>
                                </div><!-- /.col -->
                                <div class="col-xs-12" style="padding-top: 20px;">
                                    <a href="#profile" role="tab" data-toggle="tab" class="btn btn-danger btn-block">
                                        <i class="fas fa-user-plus"></i> <span>SIGNUP</span>
                                    </a>
                                </div>
                            </div>

                        </div><!-- /.login-box-body -->
                    </div><!-- /.login-box -->
                </form>
            </div>
            <div class="tab-pane fade" id="profile">

                <em id="signUpMsg"></em>
                <form action="<?php echo H_ADMIN_MAIN . '&view=hsys_users&do=signuppro'; ?>" method="post"
                      name="singnupFrom" id="singnupFrom" enctype="multipart/form-data">
                    <div class="contianer-fluid">
                        <div class="text-center"><img src="<?php echo H_THEME; ?>/images/logo.jpg" width="100"
                                                      height="100" class="img-circle border p-1" /></div>
                        <div class="login-logo">
                            <a href="<?php echo H_CLIENT; ?>"><b>Orange</b>Credit</a>
                            <h3>Micro-lending <strong>Platform</strong></h3>
                        </div><!-- /.login-logo -->
                        <div class="login-box-body">
                            <div class="output-error"></div>
                            <div class="form-group col-xs-6 col-md-6 col-sm-6 col-lg-6">
                                <label class="font-weight-bold">SURNAME <span class="text-danger">*</span></label>
                                <input type="text" name="last_name" id="last_name"
                                       value="<?php echo post('last_name') ?>" class="form-control form-control-lg styler"
                                       placeholder="Your Surname"
                                       data-required>
                            </div>
                            <div class="form-group col-xs-6 col-md-6 col-sm-6 col-lg-6">
                                <label class="font-weight-bold">MIDDLE NAME <span class="text-danger">*</span></label>
                                <input type="text" name="middle_name" id="middle_name"
                                       value="<?php echo post('middle_name') ?>"
                                       class="form-control form-control-lg styler"
                                       placeholder="your middle name"
                                       data-required>
                            </div>
                            <span id="helpBlock" class="help-block has-success col-xs-12 col-md-12 col-sm-12 col-lg-12">
                              We advice you to use your name as seen on your national ID, Voters Card Internanational passport or bank account details
                            </span>
                            <div class="form-group col-xs-12 col-md-12 col-sm-12 col-lg-12">
                                <label class="font-weight-bold">FIRSTNAME <span class="text-danger">*</span></label>
                                <input type="text" name="first_name" id="first_name"
                                       value="<?php echo post('first_name') ?>"
                                       class="form-control form-control-lg styler"
                                       placeholder="Your First name"
                                       data-required>
                            </div>
                         
                            <div class="form-group col-xs-12 col-md-12 col-sm-12 col-lg-12">
                                <label class="font-weight-bold">Email <span class="text-danger">*</span></label>
                                <input type="email" name="email" id="email" value="<?php echo post('email') ?>"
                                       class="form-control form-control-lg styler"
                                       placeholder="Enter valid email" data-required>
                                <span id="helpBlock" class="help-block">
                                We sometimes share updates on your account, our new features, announcements or customer reward
                                </span>
                            </div>
                            <div class="form-group col-xs-12 col-md-12 col-sm-12 col-lg-12">
                                <label class="font-weight-bold">Mobile or Phone Number<span class="text-danger">*</span></label>
                                <input type="tel" name="phone" id="phone"
                                       value="<?php echo post('phone') ?>" class="form-control form-control-lg styler"
                                       placeholder="e.g +234 803 123 4567"
                                       maxlength="13"
                                       data-required>
                                <span id="helpBlock" class="help-block">
                                This is used to further secure your account and give you access to our offline access to our product and services via USSD.
                                </span>
                            </div>
                            <div class="form-group col-xs-12 col-md-6 col-sm-6 col-lg-6">
                                <label class="font-weight-bold">Password <span class="text-danger">*</span></label>
                                <input type="password" name="password" id="password"
                                       class="form-control form-control-lg" placeholder=" Avoid using numbers only"
                                       data-required>
                            </div>
                            <div class="form-group col-xs-12 col-md-6 col-sm-6 col-lg-6">
                                <label class="font-weight-bold">Confirm Password <span
                                            class="text-danger">*</span></label>
                                <input type="password" name="password2" id="password2"
                                       class="form-control form-control-lg" placeholder="Avoid using numbers only"
                                       data-required>
                            </div>
                            <div class="form-group col-xs-12 col-md-12 col-sm-12 col-lg-12">
                            <label class="radio-inline">
                              <input type="radio" name="role" id="inlineRadio1" value="5" checked="checked" />User
                            </label>                            
                            </div>
                            <div class="form-group col-xs-12 col-md-12 col-sm-12 col-lg-12">
                                <label class="font-weight-bold">REFFERAL ID</label>
                                <input type="text" name="referral" id="referral" value="<?php if (isset($_GET['ref'])) {
                                    echo $_GET['ref'];
                                } ?>"
                                       class="form-control form-control-lg" placeholder="OCR11111111" data-required>
                            </div>
                            <div class="form-group col-xs-12 col-md-12 col-sm-12 col-lg-12">
                                <label><span class="text-danger">*</span>
                                    <input type="checkbox" name="signupcondition" id="signupcondition" value="1"
                                           data-required> I agree with the <a href="javascript:;">Terms &amp;
                                        Conditions.</a></label>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="signupSubmit" id="signupSubmit" value="Sign Up"
                                        class="btn btn-block btn-primary"
                                >
                                    <i class="fa fa-fw fa-sign-out-alt"></i> Sign Up
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
            <!-- Modal -->
    <div class="modal fade" id="forgotPass" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="post" id="forgotpassForm" onSubmit="return false;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><i class="fa fa-fw fa-lock-open"></i> Forgot Password</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body"><em id="forgotPassMsg"></em>
                        <div class="login-box">
                            <div class="text-center"><img src="<?php echo H_THEME; ?>/images/logo.jpg" width="200"
                                                      height="200"
                                                          class="img-circle border p-1" /></div>
                            <div class="login-logo">
                                <a href="<?php echo H_CLIENT; ?>"><b>Orange</b>Credit</a>
                            </div><!-- /.login-logo -->
                            <div class="form-group">
                                <label class="font-weight-bold">Email <span class="badge badge-secondary">OR</span>
                                    Login Name <span class="text-danger">*</span></label>
                                <input type="text" name="forgotemail" id="forgotemail"
                                       class="form-control form-control-lg" placeholder="your email address or phone number"
                                       data-required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                                    class="fa fa-fw fa-long-arrow-alt-left"></i> Sign In
                        </button>
                        <button type="submit" name="forgotPassSubmit" id="forgotPassSubmit" class="btn btn-primary"
                                onClick="return formValidate('#forgotpassForm','#forgotPassMsg');"><i
                                    class="fa fa-envelope"></i> RESET PASSWORD
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>