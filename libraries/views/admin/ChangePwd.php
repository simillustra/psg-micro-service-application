<?php
/*
Hezecom Responsive Gallery, Portfolio and Slider Manager
Author: Hezecom Technologies (http://hezecom.com) info@hezecom.net
COPYRIGHT 2014 ALL RIGHTS RESERVED

You must have purchased a valid license from CodeCanyon.com in order to have
access this file.

You may only use this file according to the respective licensing terms
you agreed to when purchasing this item.
*/
if (!defined('VALID_DIR')) die('You are not allowed to execute this file directly');
?>

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
        <div class="panel-heading"><h3 class="panel-title"><i class="fa fa-reorder"></i> <strong>Change
                    Password</strong></h3></div>
        <div class="panel-body pformmargin">


            <p>
                <?php if (isset($errors)) form_errors($errors); ?>
            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" name="hezecomform"
                  id="hezecomform2" enctype="multipart/form-data">
                <input type="hidden" name="userid" value="<?php echo $rows->userid; ?>">

                <div class="form-group">
                    <label class="control-label" for="password">Password</label>
                    <input id="password" name="password" type="password" maxlength="50" class="form-control styler"
                           placeholder="Enter new password" required="required"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="password2">Confirm Password</label>
                    <input id="password2" name="password2" type="password" maxlength="50" class="form-control styler"
                           placeholder="Confirm new password" required="required"/>
                </div>


                <div class="controls">
                    <div class="col-md-2" style="padding:0;">
                        <input type="submit" name="button" id="hButton" class="btn btn-primary btn-lg"
                               value="Change Password"/>

                    </div>
                    <div class="col-md-3" style="padding:0;">
                        <div id="output"></div>
                    </div>
                </div>

            </form>
            </p>
        </div>
    </div><!--/col-12-->
	