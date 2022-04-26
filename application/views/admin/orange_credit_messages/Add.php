<?php
/*
* =======================================================================
* FILE NAME:        Add.php
* DATE CREATED:  	05-03-2020
* FOR TABLE:  		orange_credit_messages
* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
* AUTHOR:			SIMILLUSTRA  (http://simillustra.com) info@simillustra.com
* =======================================================================
*/
if (!defined('VALID_DIR')) die('You are not allowed to execute this file directly');
?>


<form action="<?php echo H_ADMIN_MAIN . '&view=orange_credit_messages&do=addpro'; ?>" method="post" name="hezecomform"
      id="hezecomform" enctype="multipart/form-data">
    <div class="col-12">
        <ul class="nav pull-right" style="margin-top:5px;">
            <label for="hButton" class="btn btn-info btn-sm" style="color:#FFF;"><i
                        class="fa fa-floppy-o"></i> <?php echo LANG_CREATE_RECORD; ?></label>
            <input type="submit" name="button" id="hButton" class="hidden" value="<?php echo LANG_CREATE_RECORD; ?>"/>

            <a href="<?php echo H_ADMIN; ?>&view=orange_credit_messages&do=viewall" class="btn btn-default btn-sm tip"
               title="<?php echo LANG_TIP_VIEWALL; ?>"><i class="fa fa-reply"></i> <?php echo LANG_GO_BACK; ?></a>
        </ul>
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading"><h3 class="panel-title"><i
                            class="fa fa-reorder"></i> <?php echo LANG_CREATE_NEW; ?> Orange Credit Messages</h3></div>
            <div class="panel-body">

                <div class="output"></div>

                <div class="form-group">
                    <label class="control-label" for="user_to">User To</label>
                    <input id="user_to" name="user_to" type="text" maxlength="11" value="" class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="user_from">User From</label>
                    <input id="user_from" name="user_from" type="text" maxlength="11" value=""
                           class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="subject">Subject</label>
                    <input id="subject" name="subject" type="text" maxlength="100" value=""
                           class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="message">Message</label>
                    <textarea rows="5" id="message" name="message" class="form-control editor2 styler"/></textarea>
                </div>

                <div class="form-group">
                    <label class="control-label" for="attachment">Attachment</label>
                    <div class="hezefield">
                        <input type="file" id="file" value="" name="gfile[]" class="heze_item styler"
                               style="padding:0px; width:220px; margin-bottom:20px;"/>
                    </div>
                    <p><span id="addVar" class="btn btn-xs btn-success"><?php echo LANG_ADD_FIELD; ?></span></p>

                </div>

                <div class="form-group">
                    <label class="control-label" for="respond">Respond</label>
                    <input id="respond" name="respond" type="text" maxlength="11" value="" class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="sender_open">Sender Open</label>
                    <select name="sender_open" id="sender_open" class=" form-control styler choz">
                        <option value=""></option>
                        <option value="y">y</option>
                        <option value="n">n</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="control-label" for="receiver_open">Receiver Open</label>
                    <select name="receiver_open" id="receiver_open" class=" form-control styler choz">
                        <option value=""></option>
                        <option value="y">y</option>
                        <option value="n">n</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="control-label" for="sender_delete">Sender Delete</label>
                    <select name="sender_delete" id="sender_delete" class=" form-control styler choz">
                        <option value=""></option>
                        <option value="y">y</option>
                        <option value="n">n</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="control-label" for="receiver_delete">Receiver Delete</label>
                    <select name="receiver_delete" id="receiver_delete" class=" form-control styler choz">
                        <option value=""></option>
                        <option value="y">y</option>
                        <option value="n">n</option>
                    </select>
                </div>

                <div class="output"></div>
            </div>
            <div class="panel-footer" style="border-bottom:solid 2px #CCC;">
                <label for="hButton" class="btn btn-info" style="color:#FFF;"><i
                            class="fa fa-floppy-o"></i> <?php echo LANG_CREATE_RECORD; ?></label>
                <input type="submit" name="button" id="hButton" class="hidden"
                       value="<?php echo LANG_CREATE_RECORD; ?>"/>
            </div>


        </div><!--/col-12-->

</form>
	 