<?php
/*
* =======================================================================
* FILE NAME:        Add.php
* DATE CREATED:  	05-03-2020
* FOR TABLE:  		orange_credit_notifications
* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
* AUTHOR:			SIMILLUSTRA  (http://simillustra.com) info@simillustra.com
* =======================================================================
*/
if (!defined('VALID_DIR')) die('You are not allowed to execute this file directly');
?>


<form action="<?php echo H_ADMIN_MAIN . '&view=orange_credit_notifications&do=addpro'; ?>" method="post"
      name="hezecomform" id="hezecomform" enctype="multipart/form-data">
    <div class="col-12">
        <ul class="nav pull-right" style="margin-top:5px;">
            <label for="hButton" class="btn btn-info btn-sm" style="color:#FFF;"><i
                        class="fa fa-floppy-o"></i> <?php echo "SEND SMS BROADCAST"; ?></label>
            <input type="submit" name="button" id="hButton" class="hidden" value="<?php echo LANG_CREATE_RECORD; ?>"/>

            <a href="<?php echo H_ADMIN; ?>&view=orange_credit_notifications&do=viewall"
               class="btn btn-default btn-sm tip" title="<?php echo LANG_TIP_VIEWALL; ?>"><i
                        class="fa fa-reply"></i> <?php echo LANG_GO_BACK; ?></a>
        </ul>
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-reorder"></i>
                    <?php echo LANG_CREATE_NEW; ?> Orange Credit Notifications
                </h3>
            </div>
            <div class="panel-body">

                <div class="output"></div>
                <input id="subject" name="subject" type="hidden" maxlength="100" value="BroadCast from Admin"
                       class="form-control styler"/>
                <input id="status" name="status" type="hidden" maxlength="50" value="unsent" class="form-control styler"/>
                <input name="date" class="datepicker form-control styler" type="hidden" maxlength="50"
                       value="<?php echo date('Y-m-d H:i:s'); ?>"/>
                <input id="type" name="type" type="hidden" maxlength="50" value="sms" class="form-control styler"/>

                <div class="form-group">
                    <label class="control-label" for="reciever">Reciever</label>
                   <select name="reciever" id="reciever" class=" form-control choz">
                       <option value="">SELECT BROADCAST RECIPIENTS</option>
                        <option value="1">SUPER ADMINISTRATOR</option>
                        <option value="2">CREDIT MANAGER</option>
                        <option value="3">KYC OFFICER</option>
                        <option value="4">VERIFICATION OFFICER</option>
                        <option value="5">USER</option>
                        <option value="all">ALL SYSTEM USERS</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label" for="sms_message">Sms Message</label>
                    <textarea rows="5" id="sms_message" name="sms_message"
                              class="form-control styler"/></textarea>
                </div>


                <div class="output"></div>
            </div>
            <div class="panel-footer" style="border-bottom:solid 2px #CCC;">
                <label for="hButton" class="btn btn-info" style="color:#FFF;"><i
                            class="fa fa-floppy-o"></i> <?php echo "SEND SMS BROADCAST"; ?></label>
                <input type="submit" name="button" id="hButton" class="hidden"
                       value="<?php echo LANG_CREATE_RECORD; ?>"/>
            </div>


        </div><!--/col-12-->

</form>
	 