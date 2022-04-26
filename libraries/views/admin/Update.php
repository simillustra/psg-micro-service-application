<?php
/**
 * Author: SIMILLUSTRA (http://simillustra.com) info@simillustra.com
 * COPYRIGHT 2015 ALL RIGHTS RESERVED
 */
if (!defined('VALID_DIR')) die(
'You are not allowed to execute this file directly'); ?>
<div class="col-12">
    <ul class="nav pull-right" style="margin-top:5px;">
        <a href="<?php echo H_ADMIN; ?>&view=hsys_users&userid=<?php echo $rows->userid; ?>&do=details"
           title="View Details" class="btn btn-default btn-sm tip"><i
                    class="fa fa-th-list"></i> <?php echo LANG_DETAILS; ?></a>
        <a href="<?php echo H_ADMIN; ?>&view=hsys_users&userid=<?php echo $rows->userid; ?>&do=delete&dfile=<?php echo $rows->user_avarta; ?>"
           title="<?php echo LANG_TIP_DELETE; ?>" class="btn btn-default btn-sm tip"
           data-confirm="<?php echo LANG_DELETE_AUTH; ?>"><i class="fa fa-trash-o"></i> <?php echo LANG_DELETE; ?></a>
        <a href="<?php echo H_ADMIN; ?>&view=hsys_users&do=viewall" class="btn btn-default btn-sm tip"
           title="<?php echo LANG_TIP_VIEWALL; ?>"><i class="fa fa-reply"></i> <?php echo LANG_GO_BACK; ?></a>
    </ul>
    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">
            <h3 class="panel-title">
                <i class="fa fa-reorder">
                </i>
                Update Profile
            </h3>
        </div>
        <div class="panel-body pformmargin">
            <p>
                <?php if (isset($errors)) form_errors($errors); ?>
            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" name="hezecomform" id=""
                  enctype="multipart/form-data">
                <input type="hidden" name="userid" value="<?php echo $rows->userid; ?>">
                <div class="form-group col-xs-6 col-md-6 col-sm-6 col-lg-6">
                    <label class="control-label" for="first_name">
                        Name
                    </label>
                    <input id="first_name" name="first_name" type="text" maxlength="50"
                           value="<?php echo $rows->first_name; ?>" class="form-control styler"/>
                </div>
                <div class="form-group col-xs-6 col-md-6 col-sm-6 col-lg-6">
                    <label class="control-label" for="middle_name">
                        Middlename
                    </label>
                    <input id="middle_name" name="middle_name" type="text" maxlength="50"
                           value="<?php echo $rows->middle_name; ?>" class="form-control styler"/>
                </div>
                <div class="form-group col-xs-12 col-md-12 col-sm-12 col-lg-12">
                    <label class="control-label" for="last_name">
                        Lastname
                    </label>
                    <input id="last_name" name="last_name" type="text" maxlength="50"
                           value="<?php echo $rows->last_name; ?>" class="form-control styler"/>
                </div>
                <div class="form-group col-xs-12 col-md-12 col-sm-12 col-lg-12">
                    <label class="control-label" for="email">
                        Email
                    </label>
                    <input id="email" name="email" type="text" maxlength="50" value="<?php echo $rows->email; ?>"
                           readonly="readonly" class="form-control styler"/>
                </div>
                <div class="form-group col-xs-12 col-md-12 col-sm-12 col-lg-12">
                    <label class="control-label" for="phone">
                        Phone
                    </label>
                    <input id="phone" name="phone" type="text" maxlength="50" value="<?php echo $rows->phone; ?>"
                           readonly="readonly" class="form-control styler"/>
                </div>
                <?php if ($_SESSION['H_USER_SESSION_POSITION'] != 1) { ?>
                    <div class="form-group col-xs-12 col-md-12 col-sm-12 col-lg-12">
                        <label class="control-label" for="user_status">
                            User Status
                        </label>
                        <input id="user_status" name="user_status" type="text" maxlength="50"
                               value="<?php echo $rows->user_status; ?>"
                               class="form-control styler" readonly="readonly"/>
                        <input id="user_position" name="user_position" type="hidden" maxlength="50"
                               value="<?php echo $rows->user_position; ?>"
                               class="form-control styler" readonly="readonly"/>
                    </div>
                <?php } ?>
                <?php if ($_SESSION['H_USER_SESSION_POSITION'] == 1) { ?>
                    <div class="form-group col-xs-6 col-md-6 col-sm-6 col-lg-6">
                        <label class="control-label" for="user_status">
                            User Status
                        </label>
                        <select name="user_status" id="user_status" class=" form-control styler choz">
                            <option value="<?php echo $rows->user_status; ?>">
                                <?php echo check_status($rows->
                                user_status); ?>
                            </option>
                            <option value="1">
                                Active
                            </option>
                            <option value="0">
                                Inactive
                            </option>
                        </select>
                    </div>
                    <div class="form-group col-xs-6 col-md-6 col-sm-6 col-lg-6">
                        <label class="control-label" for="user_position">
                            User Position
                        </label>
                        <select name="user_position" id="user_position" class=" form-control styler choz">
                            <option value="<?php echo $rows->user_position; ?>">
                                <?php echo check_position($rows->
                                user_position); ?>
                            </option>
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
                        <label class="control-label" for="user_branch">Organization Branch</label>
                        <select name="user_branch" id="user_branch"
                                class="required form-control styler choz">
                            <option>SELECT ORGANIZATION BRANCH</option>
                            <?php foreach ($organisation_list as $organisation) { ?>
                                <option value="<?php echo $organisation->id; ?>"
                                        <?php if ($organisation->id == $rows->user_branch){ ?>selected="selected"<?php } ?>
                                >
                                    <?php echo $organisation->branch_name; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-xs-6 col-md-6 col-sm-6 col-lg-6">
                        <label class="control-label" for="user_zone">User Work Coverage</label>
                        <select multiple="multiple" id="user_zone" name="user_zone[]"
                                class="required form-control styler choz">
                            <option value=""></option>
                            <?php if (!empty($zone_list)): ?>
                                <?php foreach ($zone_list as $zones): ?>
                                    <option value="<?php echo $zones->id; ?>" <?php echo (in_array($zones->id, $zone_coverage_list, true)) ? "selected" : "" ?>>
                                        <?php echo $zones->zone_name; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                <?php } ?>
                <div class="form-group col-xs-12 col-md-12 col-sm-12 col-lg-12">
                    <label class="control-label" for="user_avarta">
                        User Avarta
                    </label>
                    <input id="user_avarta" name="user_avarta" type="file" class="styler"/>
                    <br>
                    <?php if (is_file(UPLOAD_FOLDER . $rows->
                        user_avarta)) { ?>
                        <a href="#"><img src="<?php echo THUMB_FOLDER . $rows->user_avarta; ?>"
                                         style="width:200px; height:200px;"></a>
                        <br>
                    <?php } ?>
                    <?php if (is_file(UPLOAD_FOLDER . $rows->
                        user_avarta)) { ?>
                        <a href="<?php echo H_ADMIN; ?>&view=hsys_users&userid=<?php echo $rows->userid; ?>&dfile=<?php echo $rows->user_avarta; ?>&do=delete&fdel=file"
                           data-confirm="<?php echo LANG_DELETE_AUTH; ?>"><span class="btn btn-xs btn-danger"><i
                                        class="fa fa-remove"></i> <?php echo LANG_DELETE; ?></span></a>
                        <br>
                    <?php } ?>
                </div>
                <div class="controls">
                    <div class="col-md-2" style="padding:0;">
                        <input type="submit" name="button" id="hButton" class="btn btn-primary btn-lg"
                               value="<?php echo LANG_UPDATE_RECORD; ?>"/>
                    </div>
                    <div class="col-md-3" style="padding:0;">
                        <div id="output">
                        </div>
                    </div>
                </div>
            </form>
            </p>
        </div>
    </div>
    <!--/col-12-->