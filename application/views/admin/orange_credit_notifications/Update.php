<?php
/*
* =======================================================================
* FILE NAME:        Update.php
* DATE CREATED:  	05-03-2020
* FOR TABLE:  		orange_credit_notifications
* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
* AUTHOR:			SIMILLUSTRA  (http://simillustra.com) info@simillustra.com
* =======================================================================
*/
if (!defined('VALID_DIR')) die('You are not allowed to execute this file directly');
?>


<form action="<?php echo H_ADMIN_MAIN . '&view=orange_credit_notifications&do=updatepro'; ?>" method="post"
      name="hezecomform" id="hezecomform" enctype="multipart/form-data">
    <div class="col-12">
        <ul class="nav pull-right" style="margin-top:5px;">
            <label for="hButton" class="btn btn-info btn-sm" style="color:#FFF;"><i
                        class="fa fa-floppy-o"></i> <?php echo LANG_UPDATE_RECORD; ?></label>
            <input type="submit" name="button" id="hButton" class="hidden" value="<?php echo LANG_UPDATE_RECORD; ?>"/>

            <a href="<?php echo H_ADMIN; ?>&view=orange_credit_notifications&id=<?php echo $rows->id; ?>&do=details"
               title="View Details" class="btn btn-default btn-sm tip"><i
                        class="fa fa-th-list"></i> <?php echo LANG_DETAILS; ?></a>

            <a href="<?php echo H_ADMIN; ?>&view=orange_credit_notifications&do=viewall"
               class="btn btn-default btn-sm tip" title="<?php echo LANG_TIP_VIEWALL; ?>"><i
                        class="fa fa-reply"></i> <?php echo LANG_GO_BACK; ?></a>
        </ul>
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading"><h3 class="panel-title"><i class="fa fa-reorder"></i> <?php echo LANG_UPDATE; ?>
                    Orange Credit Notifications</h3></div>
            <div class="panel-body">

                <div class="output"></div>

                <input type="hidden" name="id" value="<?php echo $rows->id; ?>">
                <div class="form-group">
                    <label class="control-label" for="reciever">Reciever</label>
                    <input id="reciever" name="reciever" type="text" maxlength="12"
                           value="<?php echo $rows->reciever; ?>" class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="subject">Subject</label>
                    <input id="subject" name="subject" type="text" maxlength="100" value="<?php echo $rows->subject; ?>"
                           class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="type">Type</label>
                    <input id="type" name="type" type="text" maxlength="50" value="<?php echo $rows->type; ?>"
                           class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="sms_message">Sms Message</label>
                    <input id="sms_message" name="sms_message" type="text" maxlength="200"
                           value="<?php echo $rows->sms_message; ?>" class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="email_message">Email Message</label>
                    <textarea rows="5" id="email_message" name="email_message"
                              class="form-control editor2 styler"/><?php echo $rows->email_message; ?></textarea>
                </div>

                <div class="form-group">
                    <label class="control-label" for="status">Status</label>
                    <input id="status" name="status" type="text" maxlength="50" value="<?php echo $rows->status; ?>"
                           class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="date">Date</label>
                    <input name="date" class="datepicker form-control styler" type="text" maxlength="50"
                           value="<?php echo $rows->date; ?>"/>
                </div>

                <div class="output"></div>
            </div>
            <div class="panel-footer" style="border-bottom:solid 2px #CCC;">
                <label for="hButton" class="btn btn-info" style="color:#FFF;"><i
                            class="fa fa-floppy-o"></i> <?php echo LANG_UPDATE_RECORD; ?></label>
                <input type="submit" name="button" id="hButton" class="hidden"
                       value="<?php echo LANG_UPDATE_RECORD; ?>"/>
            </div>


        </div><!--/col-12-->

</form>
	 