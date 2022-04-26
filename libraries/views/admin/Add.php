<?php
/**
 * Author: SIMILLUSTRA  (http://simillustra.com) info@simillustra.com
 * COPYRIGHT 2014 ALL RIGHTS RESERVED
*/

if (!defined('VALID_DIR')) die('You are not allowed to execute this file directly');
?>

<div class="heze-table">
    <div class="col-12">
        <ul class="nav pull-right" style="margin-top:5px;">
            <a href="<?php echo H_ADMIN; ?>&view=hsys_users&do=viewall" class="btn btn-success btn-sm tip"
               title="<?php echo LANG_TIP_VIEWALL; ?>"><i class="fa fa-reply"></i> <?php echo LANG_GO_BACK; ?></a>
        </ul>
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading"><h3 class="panel-title"><i
                            class="fa fa-reorder"></i> <?php echo LANG_CREATE_NEW; ?> System Users</h3></div>
            <div class="panel-body pformmargin">


                <p>
                    <?php if (isset($errors)) form_errors($errors); ?>

                <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" name="hezecomform"
                      id="hezecomform2" enctype="multipart/form-data">
                    <div class="form-group col-xs-6 col-md-6 col-sm-6 col-lg-6">
                        <label class="control-label" for="first_name">Firstname</label>
                        <input id="first_name" name="first_name" type="text" maxlength="50"
                               value="<?php echo post('first_name') ?>"
                               class="form-control styler"/>
                    </div>

                    <div class="form-group col-xs-6 col-md-6 col-sm-6 col-lg-6">
                        <label class="control-label" for="middle_name">Middlename</label>
                        <input id="middle_name" name="middle_name" type="text" maxlength="30"
                               value="<?php echo post('middle_name') ?>" class="form-control styler"/>
                    </div>

                    <div class="form-group col-xs-12 col-md-12 col-sm-12 col-lg-12">
                        <label class="control-label" for="last_name">Lastname</label>
                        <input id="last_name" name="last_name" type="text" maxlength="30"
                               value="<?php echo post('last_name') ?>" class="form-control styler"/>
                    </div>

                    <div class="form-group col-xs-12 col-md-12 col-sm-12 col-lg-12">
                        <label class="control-label" for="email">Email</label>
                        <input id="email" name="email" type="text" maxlength="50" value="<?php echo post('email') ?>"
                               class="form-control styler"/>
                    </div>

                    <div class="form-group col-xs-12 col-md-12 col-sm-12 col-lg-12">
                        <label class="control-label" for="phone">Phone</label>
                        <input id="phone" name="phone" type="text" maxlength="50" value="<?php echo post('phone') ?>"
                               class="form-control styler"/>
                    </div>
                    <div class="form-group col-xs-6 col-md-6 col-sm-6 col-lg-6">
                        <label class="control-label" for="password">Password</label>
                        <input id="password" name="password" type="password" maxlength="50" value=""
                               class="form-control styler"/>
                    </div>

                    <div class="form-group col-xs-6 col-md-6 col-sm-6 col-lg-6">
                        <label class="control-label" for="password2">Confirm Password</label>
                        <input id="password2" name="password2" type="password" maxlength="50" value=""
                               class="form-control styler"/>
                    </div>


                    <div class="form-group col-xs-6 col-md-6 col-sm-6 col-lg-6">
                        <label class="control-label" for="user_status">User Status</label>
                        <select name="user_status" id="user_status" class=" form-control styler choz">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>

                    <div class="form-group col-xs-6 col-md-6 col-sm-6 col-lg-6">
                        <label class="control-label" for="user_position">Role</label>
                        <select name="user_position" id="user_position" class=" form-control choz">
                            <option value="1">SUPER ADMINISTRATOR</option>
                            <option value="2">CREDIT MANAGER</option>
                            <option value="3">KYC OFFICER</option>
                            <option value="4">VERIFICATION OFFICER</option>                           
                            <?php if ($_SESSION['H_USER_SESSION_POSITION'] == 10) { ?>
                                <option value="5">USER</option>
                                <option value="6">AGENTS</option>
                            <?php } ?>
                        </select>
                    </div>
                          <div class="form-group col-xs-6 col-md-6 col-sm-6 col-lg-6">
                    <label class="control-label" for="user_branch">Organisation</label>
                    <select id="user_branch" name="user_branch" class="required form-control styler choz">
                        <option>SELECT ORGANISATION</option>
                        <?php
                        foreach ($organisation_list as $company) {
                            ?>
                            <option value="<?php echo $company->id; ?>">
                                <?php echo $company->branch_name; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group col-xs-6 col-md-6 col-sm-6 col-lg-6">
                    <label class="control-label" for="user_zone">User Work Coverage</label>
                     <select multiple="multiple" id="user_zone" name="user_zone[]"
                            class="required form-control styler choz">                      
                       <?php
                        foreach ($zone_list as $zone) {
                            ?>
                            <option value="<?php echo $zone->id; ?>">
                                <?php echo $zone->zone_name; ?>
                            </option>
                        <?php } ?>

                    </select>
                </div>
                    <div class="form-group col-xs-12 col-md-12 col-sm-12 col-lg-12">
                        <label class="control-label" for="user_avarta">User Image</label>
                        <input id="user_avarta" name="user_avarta" type="file" class="form-control styler"/>
                    </div>
      

                    <div class="controls">
                        <div class="col-md-2" style="padding:0;">
                            <input type="submit" name="button" id="hButton" class="btn btn-success btn-lg"
                                   value="<?php echo LANG_CREATE_RECORD; ?>"/>
                        </div>
                        <div class="col-md-3" style="padding:0;">
                            <div id="output"></div>
                        </div>
                    </div>

                </form>
                </p>


            </div>
        </div><!--/col-12-->
    </div><!--/heze-table-->
	